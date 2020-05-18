<?php
namespace Controllers;

class Home extends \Framework\Controller {
  private $getAuthenticatedUserUseCase;
  private $getPostsUseCase;
  private $getNumberOfCommentsOfPostUseCase;
  private $getLatestCommentUseCase;
  private $getLatestCommentOfPostUseCase;

  public function __construct(\Model\GetAuthenticatedUserUseCase $getAuthenticatedUserUseCase,
                              \Model\GetPostsUseCase $getPostsUseCase,
                              \Model\GetNumberOfCommentsOfPostUseCase $getNumberOfCommentsOfPostUseCase,
                              \Model\GetLatestCommentUseCase $getLatestCommentUseCase,
                              \Model\GetLatestCommentOfPostUseCase $getLatestCommentOfPostUseCase) {
    $this->getAuthenticatedUserUseCase = $getAuthenticatedUserUseCase;
    $this->getPostsUseCase = $getPostsUseCase;
    $this->getNumberOfCommentsOfPostUseCase = $getNumberOfCommentsOfPostUseCase;
    $this->getLatestCommentUseCase = $getLatestCommentUseCase;
    $this->getLatestCommentOfPostUseCase = $getLatestCommentOfPostUseCase;
  }

  public function GET_Index() {
    return $this->renderView('home', array(
      'user' => $this->getAuthenticatedUserUseCase->execute(),
      'posts' => $this->getPostsUseCase->execute(),
      'keywords' => null,
      'nrOfComments' => $this->getNumberOfCommentsOfPostUseCase->execute(),
      'latestComment' => $this->getLatestCommentUseCase->execute(),
      'latestCommentOfPost' => $this->getLatestCommentOfPostUseCase->execute()
    ));
  }
}