<?php

?>
<?php foreach ($items as $item): ?>
  <li>
    <a href="/item/<?php print $item['id']; ?>">
      <img src="<?php print $item['img']; ?>" />
      <h2><?php print $item['title']; ?></h2>
    </a>
  </li>
<?php endforeach; ?>
