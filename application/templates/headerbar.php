<?php

?>
<div data-role="header" data-position="fixed" id="headerbar">
  <?php if (isset($include_back) && $include_back): ?>
    <?php if (isset($back_href)): ?>
      <a href="<?php print $back_href; ?>" data-transition="slide" data-direction="reverse" class="ui-btn-left">Back</a>
    <?php else: ?>
      <a href="#" data-rel="back" data-transition="slide" data-direction="reverse" data-role="button" data-icon="flat-menu">Back</a>
    <?php endif; ?>
  <?php else: ?>
    <a data-iconpos="notext" href="#panel" data-role="button" data-icon="flat-menu"></a>
  <?php endif; ?>

  <h1>Sample jQuery Mobile App</h1>

  <a href="/" data-iconpos="notext" data-role="button" data-icon="home" title="Home">Home</a>
</div>
