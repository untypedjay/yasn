<?php
namespace Services;

class MockRepository implements \Model\Interfaces\Repository {
  private $mockUsers;

  public function __construct() {
    // create mock data
    $this->mockUsers = array(
      array('1', 'jeff', 'jeff123'),
      array('2', 'lisa', 'lisa123')
    );
  }

  public function getUserForUserNameAndPassword(string $userName, string $password): ?\Model\Entities\User {
    foreach ($this->mockUsers as $u) {
      if ($u[1] == $userName && $u[2] == $password) {
        return new \Model\Entities\User($u[0], $u[1]);
      }
    }
    return null;
  }

  public function getUser(string $id): ?\Model\Entities\User {
    foreach ($this->mockUsers as $u) {
      if ($u[0] == $id) {
        return new \Model\Entities\User($u[0], $u[1]);
      }
    }
    return null;
  }
}
