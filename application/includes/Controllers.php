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
    $data = API::getHomepageData($params);

    if (isset($params['itemsOnly']) && $params['itemsOnly']) {
      print render('partial-items-list.php', array('items' => $data['items']));
      return;
    }

    $data['options'] = array(
      '' => '- All - ',
      'even' => 'Even',
      'odd' => 'Odd',
    );
    $data['option_selected'] = $type;
    self::send('home', 'page-home.php', $data);
  }

}

/**
 * Sample controller for page 2 ('/page-2').
 */
class SamplePageController extends BaseController {

  /**
   * GET.
   */
  public function GET($params) {
    self::send('home', 'page-page-2.php');
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
