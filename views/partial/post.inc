<article class="post">
  <div class="post-header">
    <span><?php self::htmlOut($data['author']); ?></span>
    <span><?php self::htmlOut($data['time']); ?></span>
  </div>
  <?php self::actionLink($data['title'], 'Details', 'Post', array('pid' => $data['id']), 'post-title'); ?>
  <div class="post-footer">
    <div>Last activity <span>2 mins</span> ago by <span>flyredpanda</span></div>
    <div>12 comments</div>
  </div>
</article>