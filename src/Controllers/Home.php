<?php
namespace Controllers;

class Home extends \Framework\Controller {
  private $getAuthenticatedUserUseCase;
  private $getPostsUseCase;

  public function __construct(\Model\GetAuthenticatedUserUseCase $getAuthenticatedUserUseCase,
                              \Model\GetPostsUseCase $getPostsUseCase) {
    $this->getAuthenticatedUserUseCase = $getAuthenticatedUserUseCase;
    $this->getPostsUseCase = $getPostsUseCase;
  }

  public function GET_Index() {
    return $this->renderView('home', array(
      'user' => $this->getAuthenticatedUserUseCase->execute(),
      'posts' => $this->getPostsUseCase->execute(),
      'keywords' => null
    ));
  }
}