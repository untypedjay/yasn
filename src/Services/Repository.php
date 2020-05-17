<?php
namespace Services;

class Repository implements \Model\Interfaces\Repository {
    private $server;
    private $userName;
    private $password;
    private $database;
  
    public function __construct(string $server, string $userName, string $password, string $database) {
      $this->server = $server;
      $this->userName = $userName;
      $this->password = $password;
      $this->database = $database;
    }
    
    // === private helper methods ===
      
    private function getConnection() {
        $con = new \mysqli($this->server, $this->userName, $this->password, $this->database);
        if (!$con) {
            die('Unable to connect to database. Error: ' . mysqli_connect_error());
        }
        return $con;
    }

    private function executeQuery($connection, $query) {
        $result = $connection->query($query);
        if (!$result) {
            die("Error in query '$query': " . $connection->error);
        }
        return $result;
    }

    private function executeStatement($connection, $query, $bindFunc) {
        $statement = $connection->prepare($query);
        if (!$statement) {
        die("Error in prepared statement '$query': " . $connection->error);
        }
        $bindFunc($statement);
        if (!$statement->execute()) {
            die("Error executing prepared statement '$query': " . $statement->error);
        }
        return $statement;
    }

    // === public methods ===

    public function getUserForUserNameAndPassword(string $userName, string $password): ?\Model\Entities\User {
        $user = null;
        $con = $this->getConnection();
        $stat = $this->executeStatement($con,
                'SELECT id, passwordHash FROM user WHERE userName = ?',
                function($s) use($userName) { $s->bind_param('s', $userName); });
        $stat->bind_result($id, $passwordHash);
        if ($stat->fetch() && password_verify($password, $passwordHash)) {
            $user = new \Model\Entities\User($id, $userName);
        }
        $stat->close();
        $con->close();
        return $user;
    }
    
    public function getUser(string $id): ?\Model\Entities\User {
        $user = null;
        $con = $this->getConnection();
        $stat = $this->executeStatement($con,
            'SELECT id, userName FROM user WHERE id = ?',
            function($s) use ($id) { $s->bind_param('i', $id); });
        $stat->bind_result($id, $userName);
        if ($stat->fetch()) {
            $user = new \Model\Entities\User($id, $userName);
        }
        $stat->close();
        $con->close();
        return $user;
    }
    
    public function getPosts(): array {
        $posts = array();
        $con = $this->getConnection();
        $res = $this->executeQuery($con, 'SELECT id, title, author, date, content FROM post');
        while ($post = $res->fetch_object()) {
            $posts[] = new \Model\Entities\Post($post->id, $post->title, $post->author, $post->date, $post->content);
        }
        $res->close();
        $con->close();
        return $posts;
    }

    public function getPostFromId(string $postId): ?\Model\Entities\Post {
        $con = $this->getConnection();
        $res = $this->executeQuery($con, 'SELECT id, title, author, date, content FROM post');
        while ($post = $res->fetch_object()) {
            if ($post->id == $postId) {
                return new \Model\Entities\Post($post->id, $post->title, $post->author, $post->date, $post->content);
            }
        }
        $res->close();
        $con->close();
        return null;
    }

    public function getCommentsFromPost(string $postId): array {
        $comments = array();
        $con = $this->getConnection();
        $res = $this->executeQuery($con, 'SELECT id, postId, content, author, date FROM comment');
        while ($comment = $res->fetch_object()) {
            if ($comment->postId == $postId) {
                $comments[] = new \Model\Entities\Comment($comment->id, $comment->postId, $comment->content, $comment->author, $comment->date);
            }
        }
        $res->close();
        $con->close();
        return $comments;
    }

    public function addComment(string $postId, string $content, string $author, string $date): void {
        $con = $this->getConnection();
        $con->autocommit(false);
        $stat = $this->executeStatement($con,
            'INSERT INTO comment (postId, content, author, date) VALUES (?, ?, ?, ?)',
            function($s) use($postId, $content, $author, $date) { $s->bind_param('isss', $postId, $content, $author, $date); })->close();
        $con->commit();
        $con->close();
    }

    public function addPost(string $title, string $author, string $date, string $content): void {
        $con = $this->getConnection();
        $con->autocommit(false);
        $stat = $this->executeStatement($con,
            'INSERT INTO post (title, author, date, content) VALUES (?, ?, ?, ?)',
            function($s) use($title, $author, $date, $content) { $s->bind_param('ssss', $title, $author, $date, $content); })->close();
        $con->commit();
        $con->close();
    }

    public function getPostsForKeywords(string $keywords): array {
        $searchTerm = "%$keywords%";
        $posts = array();
        $con = $this->getConnection();
        $stat = $this->executeStatement($con,
                'SELECT id, title, author, date, content FROM post WHERE title LIKE ? OR author LIKE ? OR content LIKE ?',
                function($s) use($searchTerm) { $s->bind_param('sss', $searchTerm, $searchTerm, $searchTerm); });
        $stat->bind_result($id, $title, $author, $date, $content);
        while ($stat->fetch()) {
            $posts[] = new \Model\Entities\Post($id, $title, $author, $date, $content);
        }
        $stat->close();
        $stat = $this->executeStatement($con,
        'SELECT postId  FROM comment WHERE content LIKE ? OR author LIKE ?',
        function($s) use($searchTerm) { $s->bind_param('ss', $searchTerm, $searchTerm); });
        $stat->bind_result($postId);
        while ($stat->fetch()) {
            $posts[] = $this->getPostFromId($postId);
        }
        $stat->close();
        $con->close();
        return $posts;
    }
}