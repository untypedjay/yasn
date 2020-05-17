<?php
namespace Model;

class DeleteCommentUseCase {
  private $repo;

  public function __construct(Interfaces\Repository $repo) {
    $this->repo = $repo;
  }

  public function execute(string $id): void {
    $this->repo->deleteComment($id);
  }
}