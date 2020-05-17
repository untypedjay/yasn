<?php
namespace Model;

class AddCommentToPostUseCase {
  private $repo;

  public function __construct(Interfaces\Repository $repo) {
    $this->repo = $repo;
  }

  public function execute(string $postId, string $content, string $userName): void {
    $this->repo->addComment($postId, $content, $userName, date('g:ia F d Y', time()));
  }
}