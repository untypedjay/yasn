<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="keywords" content="yasn, forum, social network, yet another social network"/>
    <meta name="description" content="Yet another social network"/>
    <meta name="author" content="Johannes Hüsers"/>
    <title>Login | YASN</title>
    <link rel="stylesheet" href="css/main.min.css?<?php echo date('l jS \of F Y h:i:s A'); ?>"/>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
  </head>
  <body class="wrapper">
    <main class="login-container">
      <?php self::actionLink('YASN', 'Index', 'Home', null, 'title'); ?>
      <p>Yet Another Social Network</p>
      <h2>Welcome back!</h2>
      <?php self::beginActionForm('LogIn', 'User', null, 'post'); ?>
        <div class="login-form">
          <input id="userName" name="un" placeholder="Username" value="<?php self::htmlOut($data['userName']); ?>" required>
          <input type="password" id="password" name="pwd" placeholder="Password" required>
          <button class="primary-button">Log In</button>
        </div>
      <?php self::endActionForm(); ?>
      <p>New to YASN? Signup <?php self::actionLink('here', 'SignUp', 'User'); ?>.</p>
    </main>
  </body>
</html>