<?php
/**
 * @file
 * Builds the Javascript and CSS files for non-development environments.
 */

// Setup class autoloading.
$ROOT = realpath(dirname(__FILE__) . '/../../');
$yui_jar_path = $ROOT . '/application/lib/yuicompressor/yuicompressor-2.4.8pre.jar';
$public_path = $ROOT . '/public';

$scripts = array(
  $public_path . '/js/jquery-1.9.1.js',
  $public_path . '/js/jquery.mobile-1.3.1.js',
  $public_path . '/js/jquery.cookie.js',
  $public_path . '/js/application.js',
);
$js_output_path = $public_path . '/js/built.min.js';
exec("rm $js_output_path");
foreach ($scripts as $script) {
  $cmd = "java -jar $yui_jar_path --type js $script >> $js_output_path";
  exec($cmd);
}
print "+ JS written to: $js_output_path" . PHP_EOL;


$styles = array(
  $public_path . '/css/jquery-mobile-flat-ui-theme/generated/jquery.mobile.flatui.css',
  $public_path . '/css/custom.css',
);
$css_output_path = $public_path . '/css/built.min.css';
exec("rm $css_output_path");
foreach ($styles as $style) {
  $cmd = "java -jar $yui_jar_path --type css $style >> $css_output_path";
  exec($cmd);
}
print "+ CSS written to: $css_output_path" . PHP_EOL;

// Write cache-busting version into templates/html.php
$version = time();
$file = $ROOT . '/application/templates/html.php';
$file_contents = file_get_contents($file);
$file_contents = preg_replace('/(\$build_version \= \")(\d*)(\";)/', '${1}' . $version . '${3}', $file_contents);
file_put_contents($file, $file_contents);
print "+ Cache-busting added to built css & js" . PHP_EOL;
