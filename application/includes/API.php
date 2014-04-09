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
  public static function getHomepageData() {

    // External API calls can be mdade here like so:
    // self::getJson(API_URL . '/api/homepage');

    return array(
    );
  }

}
