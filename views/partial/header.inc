<header class="header-container">
  <div class="title-container">
    <?php self::actionLink('YASN', 'Index', 'Home', null, 'title'); ?>
    <?php self::actionLink(null, 'NewPost', 'Post', null, 'plus'); ?>
  </div>
  <?php self::beginActionForm('Search', 'Post', null, 'get', 'search-form'); ?>
    <input type="text" placeholder="Search" name="k" value="<?php self::htmlOut($data['keywords']); ?>">
  <?php self::endActionForm(); ?>
</header>