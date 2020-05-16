<article class="post">
  <div class="post-header">
    <span><?php self::htmlOut($data['author']); ?></span>
    <span><?php self::htmlOut($data['date']); ?></span>
  </div>
  <h2><?php self::htmlOut($data['title']); ?></h2>
  <div class="post-footer">
    Last activity <span>2 mins</span> ago by <span>flyredpanda</span>
  </div>
</article>