<?php

?>
<?php print render('headerbar.php', array()); ?>

<div data-role="content">

  <h1>Sample App</h1>

  <div class="filter-header">
    <form action="#" class="filters">
      <label for="type" class="ui-hidden-accessible">Type</label>
      <select name="type" data-mini="true">
        <?php foreach ($options as $value => $label): ?>
          <option <?php ($option_selected === $value) ? print "selected" : print ''; ?> value="<?php print $value; ?>"><?php print $label; ?></option>
        <?php endforeach; ?>
      </select>
    </form>
  </div>

  <br />
  <br />

  <ul data-role="listview">
    <?php print render('partial-items-list.php', array('items' => $items)); ?>
  </ul>

  <br />
  <br />

  <a class="load-more" data-theme="a" href="/" data-role="button">Load More</a>
  <div class="no-more" style="display: none;">No more items to load</div>

</div>
