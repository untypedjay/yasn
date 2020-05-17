<?php
namespace Model\Entities;

class Comment {
  private $commentId;
  private $postId;
  private $content;
  private $author;
  private $time;

  public function __construct($commentId, $postId, $content, $author, $time) {
    $this->commentId = $commentId;
    $this->postId = $postId;
    $this->content = $content;
    $this->author = $author;
    $this->time = $time;
  }

  public function getCommentId() {
    return $this->commentId;
  }

  public function getPostId() {
    return $this->postId;
  }

  public function getContent() {
    return $this->content;
  }

  public function getAuthor() {
    return $this->author;
  }

  public function getTime() {
    $time = strtotime($this->time);
    return date('M d', $time) . ' at ' . date('H:i A', $time);
  }
}