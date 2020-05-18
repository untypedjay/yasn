<?php
namespace Model;

class GetLatestCommentOfPostUseCase {
  private $repo;

  public function __construct(Interfaces\Repository $repo) {
    $this->repo = $repo;
  }

  public function execute(): array {
    $posts = $this->repo->getPosts();
    $result = array();
    foreach ($posts as $post) {
      $latestComment = null;
      $comments = $this->repo->getCommentsFromPost($post->getId());
      foreach ($comments as $comment) {
        if ($latestComment == null || (($comment->getTimeRaw() > $latestComment->getTimeRaw()))) {
          $latestComment = $comment;
        }
      }
      $result[$post->getId()] = $latestComment;
    }
    return $result;
  }
}