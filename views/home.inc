<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="keywords" content="yasn, forum, social network, yet another social network"/>
    <meta name="description" content="Yet another social network"/>
    <meta name="author" content="Johannes Hüsers"/>
    <title>YASN</title>
    <link rel="stylesheet" href="css/main.min.css"/>
  </head>
  <body class="wrapper">
    <?php self::renderView('partial/header', $data); ?>
    <main class="post-container">
      <?php self::renderView('partial/post', $data); ?>
      <?php self::renderView('partial/post', $data); ?>
    </main>
    <?php self::renderView('partial/footer', $data); ?>
  </body>
</html>