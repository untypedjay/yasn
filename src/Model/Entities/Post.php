<?php
namespace Model\Entities;

class Post {
  private $id;
  private $title;
  private $author;
  private $date;

  public function __construct($id, $title, $author, $date) {
    $this->id = $id;
    $this->title = $title;
    $this->author = $author;
    $this->date = $date;
  }

  public function getId() {
    return $this->id;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getAuthor() {
    return $this->author;
  }

  public function getDate() {
    return $this->date;
  }
}