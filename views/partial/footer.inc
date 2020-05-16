<footer>
  <div>
    Last post from <span>cool_guy123</span> <span>15 mins</span> ago.
  </div>
  <div>
    <?php if (!isset($data['user'])):
      self::actionLink('Login', 'LogIn', 'User', null, null);
    else:
      self::beginActionForm('LogOut', 'User', null, 'post', null); ?>
        You are currently logged in as <?php self::htmlOut($data['user']->getUserName()); ?> (<button>Log out</button>)
      <?php self::endActionForm();
    endif; ?>
  </div>
</footer>