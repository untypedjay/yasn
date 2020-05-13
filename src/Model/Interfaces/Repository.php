<?php
namespace Model\Interfaces;

interface Repository {
  public function getUser(string $id): ?\Model\Entities\User;
  public function getUserForUserNameAndPassword(string $userName, string $password): ?\Model\Entities\User;
}