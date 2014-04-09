<?php
/**
 * @file
 * Holds various classes used by the mobile site.
 */

require_once ROOT_PATH . '/application/lib/app/BaseController.php';

/**
 * Sample controller for Home ('/').
 */
class SampleHomeController extends BaseController {

  /**
   * GET.
   */
  public function GET($params) {
    $homepage_data = API::getHomepageData();
    self::send('home', 'page-home.php', $homepage_data);
  }

}

/**
 * Sample controller for Items ('/item/123').
 */
class ItemController extends BaseController {

  /**
   * GET.
   */
  public function GET($params) {
    $item_data = API::getItem($params['id']);
    self::send('item-' . $params['id'], 'page-item.php', $item_data);
  }

}
