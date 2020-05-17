<?php
namespace Model;

class GetNumberOfCommentsOfPostUseCase {
  private $repo;
  private $getCommentsForPostUseCase;
  private $getPostsUseCase;

  public function __construct(Interfaces\Repository $repo,
                              GetCommentsForPostUseCase $getCommentsForPostUseCase,
                              GetPostsUseCase $getPostsUseCase) {
    $this->repo = $repo;
    $this->getCommentsForPostUseCase = $getCommentsForPostUseCase;
    $this->getPostsUseCase = $getPostsUseCase;
  }

  public function execute(): array {
    $result = array();
    foreach ($this->getPostsUseCase->execute() as $post) {
      $result[$post->getId()] = sizeof($this->getCommentsForPostUseCase->execute($post->getId()));
    }
    return $result;
  }
}