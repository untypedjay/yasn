<?php
namespace Model;

class GetAuthenticatedUserUseCase {
  private $auth;
  private $repo;

  public function __construct(Interfaces\Authentication $auth, Interfaces\Repository $repo) {
    $this->auth = $auth;
    $this->repo = $repo;
  }

  public function execute(): ?Entities\User {
    $id = $this->auth->getUserId();
    if ($id === null) {
      return null;
    }
    return $this->repo->getUser($id);
  }
}
