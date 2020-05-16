<?php
namespace Controllers;

class User extends \Framework\Controller {
  const PARAM_USER_NAME = 'un';
  const PARAM_PASSWORD = 'pwd';

  private $getAuthenticatedUserUseCase;
  private $signInUseCase;
  private $signOutUseCase;

  public function __construct(
    \Model\GetAuthenticatedUserUseCase $getAuthenticatedUserUseCase,
    \Model\SignInUseCase $signInUseCase,
    \Model\SignOutUseCase $signOutUseCase
  ) {
    $this->getAuthenticatedUserUseCase = $getAuthenticatedUserUseCase;
    $this->signInUseCase = $signInUseCase;
    $this->signOutUseCase = $signOutUseCase;
  }

  public function GET_LogIn() {
    $user = $this->getAuthenticatedUserUseCase->execute();
    if ($user != null) {
      return $this->redirect('Index', 'Home');
    }
    return $this->renderView('login', array(
      'user' => $user,
      'userName' => $this->getParam(self::PARAM_USER_NAME)
    ));
  }

  public function POST_LogIn() {
    if (!$this->signInUseCase->execute($this->getParam(self::PARAM_USER_NAME), $this->getParam(self::PARAM_PASSWORD))) {
      return $this->renderView('login', array(
        'user' => $this->getAuthenticatedUserUseCase->execute(),
        'userName' => $this->getParam(self::PARAM_USER_NAME),
        'errors' => array('Invalid user name or password.') // gegen hacker
      ));
    }
    return $this->redirect('Index', 'Home'); //TODO better location, maybe again from context?! ;)
  }

  public function POST_LogOut() {
    $this->signOutUseCase->execute();
    return $this->redirect('Index', 'Home'); //TODO better location...
  }
}