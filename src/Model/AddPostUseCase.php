<?php
namespace Model;

class AddPostUseCase {
  private $repo;

  public function __construct(Interfaces\Repository $repo) {
    $this->repo = $repo;
  }

  public function execute(string $title, string $author, string $content): void {
    $this->repo->addPost($title, $author, date('g:ia F d Y', time()), $content);
  }
}