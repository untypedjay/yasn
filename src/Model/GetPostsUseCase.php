<?php
namespace Model;

class GetPostsUseCase {
  private $repo;

  public function __construct(Interfaces\Repository $repo) {
    $this->repo = $repo;
  }

  public function execute(): array {
    $c = $this->cart->getCart();
    $res = array();
    foreach ($this->repo->getBooksForCategory($categoryId) as $b) {
      $res[] = new BookData($b, isset($c[$b->getId()]) ? $c[$b->getId()] : 0);
    }
    return $res;
  }
}