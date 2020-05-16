<?php
namespace Model;

class GetPostsUseCase {
  private $repo;

  public function __construct(Interfaces\Repository $repo) {
    $this->repo = $repo;
  }

  public function execute(): array {
    $posts = array();
    foreach ($this->repo->getPosts() as $post) {
      $posts[] = $post;
    }
    return $posts;
  }
}