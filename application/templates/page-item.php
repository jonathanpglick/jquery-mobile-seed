<?php

?>
<?php print render('headerbar.php', array()); ?>

<div data-role="content">
  <h2><?php print $item['title']; ?></h2>
  <img src="<?php print $item['img']; ?>" />

  <?php print $item['body']; ?>

    <a data-role="button" data-mini="true" href="#disqus_thread" class="comments-button load-comments-button">Load Comments</a>

    <div
      class="disqus_data"
      data-disqus_shortname="<?php print $item['disqus']['domain']; ?>"
      data-disqus_identifier="<?php print $item['disqus']['identifier']; ?>"
      data-disqus_title="<?php print $item['disqus']['title']; ?>"
      <?php if (isset($item['disqus']['url'])): ?>
        data-disqus_url="<?php print $item['disqus']['url']; ?>"
      <?php endif; ?>
    ></div>

</div>
