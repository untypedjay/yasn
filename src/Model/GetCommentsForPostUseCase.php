<?php
namespace Model;

class GetCommentsForPostUseCase {
  private $repo;

  public function __construct(Interfaces\Repository $repo) {
    $this->repo = $repo;
  }

  public function execute(string $id): array {
    return $this->repo->getCommentsFromPost($id);
  }
}