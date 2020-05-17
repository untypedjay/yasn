<?php
namespace Model;

class SearchUseCase {
  private $repo;

  public function __construct(Interfaces\Repository $repo) {
    $this->repo = $repo;
  }

  public function execute(string $keywords): array {
    $result = array();
    foreach ($this->repo->getPostsForKeywords($keywords) as $post) {
      $result[] = new Entities\Post($post->getId(), $post->getTitle(), $post->getAuthor(), $post->getTime(), $post->getContent());
    }
    return $result;
  }
}
