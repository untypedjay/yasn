<?php
namespace Model;

class DeletePostUseCase {
  private $repo;

  public function __construct(Interfaces\Repository $repo) {
    $this->repo = $repo;
  }

  public function execute(string $id): void {
    $this->repo->deletePost($id);
  }
}