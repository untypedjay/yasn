<?php
namespace Model;

class GetPostFromIdUseCase {
  private $repo;

  public function __construct(Interfaces\Repository $repo) {
    $this->repo = $repo;
  }

  public function execute(string $id): ?\Model\Entities\Post {
    return $this->repo->getPostFromId($id);
  }
}