<?php
namespace Controllers;

class Post extends \Framework\Controller {
  const PARAM_USER_NAME = 'un';
  const PARAM_POST_ID = 'pid';
  const PARAM_COMMENT_CONTENT = 'cc';
  const PARAM_POST_TITLE = 'pt';
  const PARAM_POST_CONTENT = 'pc';
  
  private $getAuthenticatedUserUseCase;
  private $getPostFromIdUseCase;
  private $getCommentsForPostUseCase;
  private $addCommentToPostUseCase;
  private $addPostUseCase;

  public function __construct(\Model\GetAuthenticatedUserUseCase $getAuthenticatedUserUseCase,
                              \Model\GetPostFromIdUseCase $getPostFromIdUseCase,
                              \Model\GetCommentsForPostUseCase $getCommentsForPostUseCase,
                              \Model\AddCommentToPostUseCase $addCommentToPostUseCase,
                              \Model\AddPostUseCase $addPostUseCase) {
    $this->getAuthenticatedUserUseCase = $getAuthenticatedUserUseCase;
    $this->getPostFromIdUseCase = $getPostFromIdUseCase;
    $this->getCommentsForPostUseCase = $getCommentsForPostUseCase;
    $this->addCommentToPostUseCase = $addCommentToPostUseCase;
    $this->addPostUseCase = $addPostUseCase;
  }

  public function GET_NewPost() {
    $user = $this->getAuthenticatedUserUseCase->execute();
    if ($user != null) {
      return $this->renderView('newPost', array(
        'user' => $user
      ));
    } else {
      return $this->renderView('login', array(
        'user' => $user,
        'userName' => $this->getParam(self::PARAM_USER_NAME)
      ));
    }
  }

  public function GET_Details() {
    $id = $this->getParam(self::PARAM_POST_ID);
    return $this->renderView('postDetails', array(
      'user' => $this->getAuthenticatedUserUseCase->execute(),
      'post' => $this->getPostFromIdUseCase->execute($id),
      'comments' => $this->getCommentsForPostUseCase->execute($id)
    ));
  }

  public function POST_AddComment() {
    $id = $this->getParam(self::PARAM_POST_ID);
    $post = $this->getPostFromIdUseCase->execute($id);
    $this->addCommentToPostUseCase->execute($id, $this->getParam(self::PARAM_COMMENT_CONTENT), $this->getAuthenticatedUserUseCase->execute()->getUserName());
    return $this->redirect('Details', 'Post', array(
      'user' => $this->getAuthenticatedUserUseCase->execute(),
      'post' => $this->getPostFromIdUseCase->execute($id),
      'comments' => $this->getCommentsForPostUseCase->execute($id),
      'pid' => $id
    ));
  }

  public function POST_AddPost() {
    $this->addPostUseCase->execute($this->getParam(self::PARAM_POST_TITLE), $this->getAuthenticatedUserUseCase->execute()->getUserName(), $this->getParam(self::PARAM_POST_CONTENT));
    return $this->redirect('Index', 'Home');
  }
}