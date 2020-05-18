<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="keywords" content="yasn, forum, social network, yet another social network"/>
    <meta name="description" content="Yet another social network"/>
    <meta name="author" content="Johannes Hüsers"/>
    <title>YASN</title>
    <link rel="stylesheet" href="css/main.min.css?<?php echo date('l jS \of F Y h:i:s A'); ?>"/>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
  </head>
  <body class="wrapper">
    <?php self::renderView('partial/header', $data); ?>
    <main class="main-container">
      <?php if (sizeof($data['posts']) > 0) {
        foreach ($data['posts'] as $post) {
          self::renderView('partial/post', array (
            'id' => $post->getId(),
            'title' => $post->getTitle(),
            'author' => $post->getAuthor(),
            'time' => $post->getTime(),
            'numberOfComments' => $data['nrOfComments'][$post->getId()],
            'latestComment' => $data['latestCommentOfPost'][$post->getId()],
            'user' => $data['user']
          ));
        }
      } else { ?>
        <p class="no-posts">No posts to display.</p>
      <?php } ?>
    </main>
    <?php self::renderView('partial/footer', array (
      'user' => $data['user'],
      'latestComment' => $data['latestComment']
    )); ?>
  </body>
</html>