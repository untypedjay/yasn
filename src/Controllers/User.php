<?php
namespace Controllers;

class User extends \Framework\Controller {
  const PARAM_USER_NAME = 'un';
  const PARAM_PASSWORD = 'pwd';

  private $getAuthenticatedUserUseCase;
  private $signInUseCase;
  private $signOutUseCase;
  private $signUpUserUseCase;
  private $userExistsUseCase;

  public function __construct(\Model\GetAuthenticatedUserUseCase $getAuthenticatedUserUseCase,
                              \Model\SignInUseCase $signInUseCase,
                              \Model\SignOutUseCase $signOutUseCase,
                              \Model\SignUpUserUseCase $signUpUserUseCase,
                              \Model\UserExistsUseCase $userExistsUseCase) {
    $this->getAuthenticatedUserUseCase = $getAuthenticatedUserUseCase;
    $this->signInUseCase = $signInUseCase;
    $this->signOutUseCase = $signOutUseCase;
    $this->signUpUserUseCase = $signUpUserUseCase;
    $this->userExistsUseCase = $userExistsUseCase;
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
        'errors' => array('Invalid user name or password.')
      ));
    }
    return $this->redirect('Index', 'Home');
  }

  public function POST_LogOut() {
    $this->signOutUseCase->execute();
    return $this->redirect('Index', 'Home');
  }

  public function GET_SignUp() {
    return $this->renderView('signup', array(
      'userName' => $this->getParam(self::PARAM_USER_NAME)
    ));
  }

  public function POST_SignUp() {
    if ($this->userExistsUseCase->execute($this->getParam(self::PARAM_USER_NAME))) {
      return $this->renderView('signup', array(
        'user' => $this->getAuthenticatedUserUseCase->execute(),
        'userName' => $this->getParam(self::PARAM_USER_NAME),
        'errors' => array('Please provide a user name and a password.')
      ));
    }
    $this->signUpUserUseCase->execute($this->getParam(self::PARAM_USER_NAME), $this->getParam(self::PARAM_PASSWORD));
    return $this->redirect('Index', 'Home');
  }
}