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

    $this->mockPosts = array(
      array('1', 'Lasfuegos1', 'May 13 at 16:14 PM', 'Tips and tricks for new people', '2 mins', 'flyredpanda'),
      array('2', 'Coolguy98', 'May 12 at 11:20 AM', 'I want to go one step further', '45 mins', 'RishabhJet')
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
