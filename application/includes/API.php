<?php
/**
 * @file
 * App controllers.
 */

require_once ROOT_PATH . '/application/lib/app/BaseAPI.php';

/**
 * API class to retrieve data for the app.
 */
class API extends BaseAPI {

  /**
   * Returns data for the sample homepage.
   */
  public static function getHomepageData($params) {

    // External API calls would be made here like this:
    // self::getJson(API_URL . '/api/homepage');

    // Generate mock data for the sample app.
    $start = isset($params['start']) ? (int) $params['start'] : 0;
    $count = isset($params['count']) ? (int) $params['count'] : 20;
    $type = isset($params['type']) ? $params['type'] : '';

    $items = array();
    foreach (range($start, $start + $count) as $i) {
      if ($type === 'even' && ($i % 2 !== 0)) {
        continue;
      }
      elseif ($type === 'odd' && ($i % 2 === 0)) {
        continue;
      }
      $items[] = array(
        'id' => $i,
        'img' => 'http://placekitten.com/g/100/100',
        'title' => 'Item ' . $i,
      );
    }

    return array(
      'items' => $items,
    );
  }

  /**
   * Returns data for an item by id.
   */
  public static function getItem($id) {

    // Return mock item for the sample app.
    return array(
      'id' => $id,
      'img' => 'http://placekitten.com/g/500/200',
      'title' => 'Item ' . $id,
      'body' => "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>",
      'disqus' => array(
        'title' => 'Item ' . $id,
        'domain' => 'jquerymobileseed',
        'identifier' => 'jquerymobileseed-item-' . $id,
        'url' => 'item-' . $id,
      ),
    );
  }

}
