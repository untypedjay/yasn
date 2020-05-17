<?php
namespace Model\Entities;

class Post {
  private $id;
  private $title;
  private $author;
  private $time;
  private $content;

  public function __construct($id, $title, $author, $time, $content) {
    $this->id = $id;
    $this->title = $title;
    $this->author = $author;
    $this->time = $time;
    $this->content = $content;
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

  public function getTime() {
    $time = strtotime($this->time);
    return date('M d', $time) . ' at ' . date('H:i A', $time);
  }

  public function getContent() {
    return $this->content;
  }

  public function getComments() {
    return $this->comments;
  }
}