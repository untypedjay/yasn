<article class="post">
  <div class="post-header">
    <span><?php self::htmlOut($data['author']); ?></span>
    <span><?php self::htmlOut($data['time']); ?></span>
  </div>
  <?php self::actionLink($data['title'], 'Details', 'Post', array('pid' => $data['id']), 'post-title'); ?>
  <div class="post-footer">
    <div><?php self::htmlOut($data['numberOfComments']); ?> comment(s)</div>
    <?php if (isset($data['latestComment'])): ?>
      <div>Latest from <?php self::htmlOut($data['latestComment']->getAuthor()); ?> on <?php self::htmlOut($data['latestComment']->getTime()); ?></div>
    <?php endif; ?>
  </div>
</article>