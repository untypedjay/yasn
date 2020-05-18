<?php
namespace Model;

class UserExistsUseCase {
  private $repo;

  public function __construct(Interfaces\Repository $repo) {
    $this->repo = $repo;
  }

  public function execute(string $userName): bool {
    if ($this->repo->userExists($userName)) {
      return true;
    } else {
      return false;
    }
  }
}