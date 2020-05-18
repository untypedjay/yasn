<footer>
  <div>Latest comment from <?php self::htmlOut($data['latestComment']->getAuthor()); ?> on</div>
  <div><?php self::htmlOut($data['latestComment']->getTime()); ?>.</div>
  <div>
    <?php if (!isset($data['user'])):
      self::actionLink('Login', 'LogIn', 'User', null, null);
    else:
      self::beginActionForm('LogOut', 'User', null, 'post', null); ?>
        Logged in as <?php self::htmlOut($data['user']->getUserName()); ?> (<button>Log out</button>)
      <?php self::endActionForm();
    endif; ?>
  </div>
</footer>