<?php
namespace Controllers;

class Home extends \Framework\Controller {
  private $getAuthenticatedUserUseCase;

  public function __construct(\Model\GetAuthenticatedUserUseCase $getAuthenticatedUserUseCase) {
    $this->getAuthenticatedUserUseCase = $getAuthenticatedUserUseCase;
  }

  public function GET_Index() {
    return $this->renderView('home', array(
      'user' => $this->getAuthenticatedUserUseCase->execute()
    ));
  }
}