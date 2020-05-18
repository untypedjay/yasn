<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="keywords" content="yasn, forum, social network, yet another social network"/>
    <meta name="description" content="Yet another social network"/>
    <meta name="author" content="Johannes Hüsers"/>
    <title>New Post | YASN</title>
    <link rel="stylesheet" href="css/main.min.css?<?php echo date('l jS \of F Y h:i:s A'); ?>"/>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
  </head>
  <body class="wrapper">
    <?php self::renderView('partial/header', $data); ?>
    <main class="main-container">
      <?php self::beginActionForm('AddPost', 'Post', null, 'post', 'new-post-form'); ?>
        <textarea placeholder="Type your post title" name="pt" value="<?php self::htmlOut($data['title']); ?>" required></textarea>
        <textarea class="new-post-content" placeholder="Type your post"  name="pc" value="<?php self::htmlOut($data['content']); ?>" required></textarea>
        <button class="primary-button">Post</button>
      <?php self::endActionForm(); ?>
    </main>
    <?php self::renderView('partial/footer', array (
      'user' => $data['user'],
      'latestComment' => $data['latestComment']
    )); ?>
  </body>
</html>