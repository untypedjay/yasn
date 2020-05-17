<div class="comment">
  <div class="comment-content">
    <span class="comment-author"><?php self::htmlOut($data['author']); ?></span>
    <span><?php self::htmlOut($data['content']); ?></span>
    <div class="comment-footer">
      <?php self::htmlOut($data['time']); ?>
      <?php if ($data['user']->getUserName() == $data['author']):
        self::beginActionForm('DeleteComment', 'Post', array('cid' => $data['id'], 'pid' => $data['postId']), 'post'); ?>
        <button>(delete)</button>
        <?php self::endActionForm(); ?>
      <?php endif; ?>
    </div>
  </div>
</div>


