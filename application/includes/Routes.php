<?php
/**
 * @file
 * Provides route mapping.
 */

glue::stick(array(
  '/' => 'SampleHomeController',
  '/page-2' => 'SamplePageController',
  '/item/(?P<id>\d+)' => 'SampleItemController',
));
