<?php
namespace Model;

class GetLatestCommentUseCase {
  private $repo;
  private $getLatestCommentOfPostUseCase;

  public function __construct(Interfaces\Repository $repo,
                              GetLatestCommentOfPostUseCase $getLatestCommentOfPostUseCase) {
    $this->repo = $repo;
    $this->getLatestCommentOfPostUseCase = $getLatestCommentOfPostUseCase;
  }

  public function execute(): Entities\Comment {
    $posts = $this->repo->getPosts();
    $latestComment = null;
    foreach ($posts as $post) {
      $latestCommentOfPost = null;
      $comments = $this->repo->getCommentsFromPost($post->getId());
      foreach ($comments as $comment) {
        if ($latestCommentOfPost == null || (($comment->getTimeRaw() > $latestCommentOfPost->getTimeRaw()))) {
          $latestCommentOfPost = $comment;
        }
      }
      if (($latestCommentOfPost != null) && ($latestComment == null || (($latestCommentOfPost->getTimeRaw() > $latestComment->getTimeRaw())))) {
        $latestComment = $latestCommentOfPost;
      }
    }
    return $latestComment;
  }
}