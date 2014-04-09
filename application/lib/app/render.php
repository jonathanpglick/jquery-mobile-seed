<?php
/**
 * @file
 * Holds methods used in rendering content.
 */

/**
 * Renders a template with the unpacked variables.
 */
function render($template, $variables = array()) {
  extract($variables);
  ob_start();
  include ROOT_PATH . '/application/templates/' . $template;
  $content = ob_get_clean();
  return $content;
}
