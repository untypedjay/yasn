<?php
namespace Model\Interfaces;

interface Authentication {
  public function getUserId(): ?string;
  public function signIn(string $userId): void;
  public function signOut();
}