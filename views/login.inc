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
      <h1 class="title">YASN</h1>
      <h2>Welcome back!</h2>
      <?php self::beginActionForm('LogIn', 'User', null, 'post'); ?>
        <div class="login-form">
          <input id="userName" name="un" placeholder="Username" value="<?php self::htmlOut($data['userName']); ?>">
          <input type="password" id="password" name="pwd" placeholder="Password">
          <button class="login-button">Log in</button>
        </div>
      <?php self::endActionForm(); ?>
    </main>
  </body>
</html>