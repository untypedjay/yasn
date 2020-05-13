<?php
namespace Model;

class SignOutUseCase {
  private $auth;

  public function __construct(Interfaces\Authentication $auth) {
    $this->auth = $auth;
  }

  public function execute(): void {
    $this->auth->signOut();
  }
}