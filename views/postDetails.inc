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
    <main>
      <article class="post-details">
        <div class="post-title"><?php self::htmlOut($data['post']->getTitle()); ?></div>
        <div class="post-metadata">by <?php self::htmlOut($data['post']->getAuthor()); ?>, <?php self::htmlOut($data['post']->getTime()); ?></div>
        <div class="post-content"><?php self::htmlOut($data['post']->getContent()); ?></div>
      </article>

      <?php if (isset($data['user'])):
        self::beginActionForm('AddComment', 'Post', array('pid' => $data['post']->getId()), 'post', 'new-comment'); ?>
          <textarea placeholder="Leave a new comment..." name="cc" value="<?php self::htmlOut($data['commentContent']); ?>" required></textarea>
          <button class="primary-button">Post</button>
        <?php self::endActionForm();
      endif; ?>

      <?php if (sizeof($data['comments']) > 0) { ?>
        <div class="comment-container">
          <?php foreach ($data['comments'] as $comment) {
            self::renderView('partial/comment', array (
              'author' => $comment->getAuthor(),
              'content' => $comment->getContent(),
              'time' => $comment->getTime()
            ));
          } ?>
        </div>
      <?php } ?>

    </main>
    <?php self::renderView('partial/footer', array (
      'user' => $data['user']
    )); ?>
  </body>
</html>