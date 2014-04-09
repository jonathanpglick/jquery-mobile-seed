<?php
/**
 * @file
 * The base controller class.
 */

require_once ROOT_PATH . '/application/lib/app/render.php';

/**
 * Base controller class that other controllers inherit from.
 */
class BaseController {

  /**
   * Renders the template with the given variables and sends it to the browser.
   */
  public static function send($page_id, $template, $variables = array()) {
    $html = render('html.php', array(
      'title' => SITE_TITLE,
      'content' => render($template, $variables),
      'full_site_url' => API_URL,
      'page_id' => $page_id,
      'is_ajax' => self::requestIsAjax(),
    ));
    print $html;
  }

  /**
   * Decide if this is an ajax request.
   *
   * return bool
   */
  public static function requestIsAjax() {
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])
      && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
      return TRUE;
    }
    return FALSE;
  }

}
