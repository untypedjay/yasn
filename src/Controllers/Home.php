<?php
namespace Controllers;

class Home extends \Framework\Controller {
  private $getAuthenticatedUserUseCase;
  private $getPostsUseCase;
  private $getNumberOfCommentsOfPostUseCase;

  public function __construct(\Model\GetAuthenticatedUserUseCase $getAuthenticatedUserUseCase,
                              \Model\GetPostsUseCase $getPostsUseCase,
                              \Model\GetNumberOfCommentsOfPostUseCase $getNumberOfCommentsOfPostUseCase) {
    $this->getAuthenticatedUserUseCase = $getAuthenticatedUserUseCase;
    $this->getPostsUseCase = $getPostsUseCase;
    $this->getNumberOfCommentsOfPostUseCase = $getNumberOfCommentsOfPostUseCase;
  }

  public function GET_Index() {
    return $this->renderView('home', array(
      'user' => $this->getAuthenticatedUserUseCase->execute(),
      'posts' => $this->getPostsUseCase->execute(),
      'keywords' => null,
      'nrOfComments' => $this->getNumberOfCommentsOfPostUseCase->execute()
    ));
  }
}