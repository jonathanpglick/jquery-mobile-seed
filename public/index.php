<?php
/**
 * @file
 * Index file for a mobile site.
 */

define('ROOT_PATH', realpath('../'));

if (!@include_once ROOT_PATH . '/application/config/settings.php') {
  throw new Exception('config/settings.php not found!  Copy or symlink the correct environment version to config/settings.php');
}

if (isset($memcached_server) && isset($memcached_server['host']) && isset($memcached_server['port'])) {
  if (class_exists('Memcached')) {
    $memcached = new Memcached();
  }
  elseif (class_exists('Memcache')) {
    $memcached = new Memcache();
  }
  if (isset($memcached) && $memcached) {
    $memcached_connected = $memcached->connect($memcached_server['host'], $memcached_server['port']);
    if ($memcached_connected) {
      API::setMemcachedObject($memcached, 'ctm_' . ENVIRONMENT . '_ ');
    }
    else {
      throw new Exception("\$memcached_server variable set in 'settings.php' but memcache server is unavailable. Comment out \$memcached_server in 'application/config/settings.php' to not use memcached.");
    }
  }
}

// System Includes.
require_once ROOT_PATH . '/application/lib/gluephp/glue.php';

// App Includes.
require_once ROOT_PATH . '/application/includes/API.php';
require_once ROOT_PATH . '/application/includes/Controllers.php';
require_once ROOT_PATH . '/application/includes/Routes.php';
