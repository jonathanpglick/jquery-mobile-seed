<?php
/**
 * @file
 * Class to manage requesting data from the API.
 */

require_once ROOT_PATH . '/application/lib/app/render.php';

class BaseAPI {

  // 12 hours.
  const MEMCACHED_EXPIRATION = 43200;
  protected static $memcachedPrefix = 'cartalkmobile_';
  protected static $memcached = FALSE;

  /**
   * Set the memcache object.
   */
  public static function setMemcachedObject($memcached, $prefix = NULL) {
    self::$memcached = $memcached;
    if (isset($prefix) && !empty($prefix)) {
      self::$memcachedPrefix = $prefix;
    }
  }

  /**
   * Put an item in the cache.
   */
  public static function cacheSet($key, $value, $expiration = NULL) {
    if ($expiration === NULL) {
      $expiration = self::MEMCACHED_EXPIRATION;
    }
    $cache_key = self::$memcachedPrefix . $key;
    if (self::$memcached !== FALSE) {
      self::$memcached->set($cache_key, $value, NULL, $expiration);
    }
  }

  /**
   * Get an item from the cache.
   */
  public static function cacheGet($key) {
    $cache_key = self::$memcachedPrefix . $key;
    if (self::$memcached === FALSE) {
      return FALSE;
    }
    return self::$memcached->get($cache_key);
  }

  /**
   * Get and decode json from a url.
   */
  public static function getJson($url, $cache = TRUE) {
    if ($cache) {
      $data = self::cacheGet($url);
      if ($data) {
        return $data;
      }
    }

    $data = file_get_contents($url);
    $data = json_decode($data, TRUE);

    if ($cache) {
      self::cacheSet($url, $data);
    }

    return $data;
  }

}
