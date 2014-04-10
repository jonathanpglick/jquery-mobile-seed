<?php

?>
<?php print render('headerbar.php', array()); ?>

<div data-role="content">
  <h2><?php print $item['title']; ?></h2>
  <img src="<?php print $item['img']; ?>" />

  <?php print $item['body']; ?>
</div>
