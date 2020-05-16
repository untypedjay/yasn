<?php
namespace Services;

class MockRepository implements \Model\Interfaces\Repository {
  private $mockUsers;

  public function __construct() {
    // create mock data
    $this->mockUsers = array(
      array('1', 'jeff', 'jeff123'),
      array('2', 'lisa', 'lisa123')
    );

    $this->mockPosts = array(
      array('1', 'Tips and tricks for new people', 'Lasfuegos1', 'May 13 at 16:14 PM'),
      array('2', 'My account got hacked. Why? and Who?', 'Josefa972837', 'January 13 at 19:54 PM'),
      array('3', 'How should I organize my learning?', 'SpicyNutMeg', 'December 30 at 15:12 PM'),
      array('4', 'Do You Know...', 'averaver', 'April 04 at 11:11 AM'),
      array('5', 'Advice on overcoming speaking anxiety?', 'NymphedoraTonk', 'April 13 at 01:12 AM'),
      array('6', 'Where are chatbots?', 'Zhadial', 'May 01 at 10:23 AM'),
      array('7', 'DaphneTheSnail', 'HeyMarlana', 'March 16 at 12:40 PM'),
      array('8', 'How to make a good post', 'GraceBoyd9', 'June 05 at 23:32 PM'),
      array('9', 'My two year old loves YASN!', 'RACHELSIGL8', 'May 12 at 11:20 AM')
    );
  }

  public function getUserForUserNameAndPassword(string $userName, string $password): ?\Model\Entities\User {
    foreach ($this->mockUsers as $u) {
      if ($u[1] == $userName && $u[2] == $password) {
        return new \Model\Entities\User($u[0], $u[1]);
      }
    }
    return null;
  }

  public function getUser(string $id): ?\Model\Entities\User {
    foreach ($this->mockUsers as $u) {
      if ($u[0] == $id) {
        return new \Model\Entities\User($u[0], $u[1]);
      }
    }
    return null;
  }

  public function getPosts(): array {
    $posts = array();
    foreach ($this->mockPosts as $p) {
      $posts[] = new \Model\Entities\Post($p[0], $p[1], $p[2], $p[3]);
    }
    return $posts;
  }
}
