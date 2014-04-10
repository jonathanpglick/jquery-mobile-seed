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

    // External API calls can be mdade here like so:
    // self::getJson(API_URL . '/api/homepage');

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

}
