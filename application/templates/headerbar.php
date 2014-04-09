<?php

?>
<div data-role="header" data-position="fixed" id="headerbar">
  <?php if (isset($include_back) && $include_back): ?>
    <?php if (isset($back_href)): ?>
    <a href="<?php print $back_href; ?>" data-transition="slide" data-direction="reverse" class="ui-btn-left"><i class="icon-chevron-left no-text"></i></a>
    <?php else: ?>
      <a href="#" data-rel="back" data-transition="slide" data-direction="reverse" class="ui-btn-left"><i class="icon-chevron-left no-text"></i></a>
    <?php endif; ?>
  <?php else: ?>
    <a href="#panel" class="panel-open"><i class="icon-reorder no-text"></i></a>
  <?php endif; ?>

  <h1><a href="/">Sample jQuery Mobile App</a></h1>
</div>
