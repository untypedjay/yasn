<?php
namespace Services;

class Authentication implements \Model\Interfaces\Authentication {
  const SESSION_USER_ID = 'userId';

  private $session;

  public function __construct(Session $session) {
    $this->session = $session;
  }

  public function getUserId(): ?string {
    return $this->session->getValue(self::SESSION_USER_ID, null);
  }

  public function signIn(string $userId): void {
    $this->session->storeValue(self::SESSION_USER_ID, $userId);
  }

  public function signOut(): void {
    $this->session->deleteValue(self::SESSION_USER_ID);
  }
}