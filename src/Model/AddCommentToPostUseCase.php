<?php
namespace Model;

class AddCommentToPostUseCase {
  private $repo;

  public function __construct(Interfaces\Repository $repo) {
    $this->repo = $repo;
  }

  public function execute(string $postId, string $content, Entities\User $user): void {
    $this->repo->addComment(new Entities\Comment($this->repo->createCommentId(), $postId, $content, $user->getUserName(), date('g:ia F d Y', time())));
  }
}