<?php
namespace Model;

class SignInUseCase {
  private $auth;
  private $repo;

  public function __construct(Interfaces\Authentication $auth, Interfaces\Repository $repo) {
    $this->auth = $auth;
    $this->repo = $repo;
  }

  public function execute(string $userName, string $password): bool {
    $this->auth->signOut();
    $user = $this->repo->getUserForUserNameAndPassword($userName, $password);
    if ($user != null) {
      $this->auth->signIn($user->getId());
      return true;
    }
    return false;
  }
}
