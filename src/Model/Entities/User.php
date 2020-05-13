<?php
namespace Model\Entities;

class User {
  private $id;
  private $userName;

  public function getId() {
    return $this->id;
  }

  public function getUserName() {
    return $this->userName;
  }

  public function __construct($id, $userName) {
    $this->id = $id;
    $this->userName = $userName;
  }
}