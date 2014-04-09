<?php
/**
 * @file
 * Provides route mapping.
 */

glue::stick(array(
  '/' => 'SampleHomeController',
  '/item/(?P<id>\d+)' => 'ItemController',
));
