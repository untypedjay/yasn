<?php
namespace Model;

class SignUpUserUseCase {
  private $repo;

  public function __construct(Interfaces\Repository $repo) {
    $this->repo = $repo;
  }

  public function execute(string $userName, string $password): void {
    $this->repo->addUser($userName, $password);
  }
}