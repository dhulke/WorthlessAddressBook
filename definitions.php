<?php
define('APP_URL', 'http://' . $_SERVER['HTTP_HOST']);
define('RESOURCES_URL', APP_URL . '/public');
define('CSS_URL', RESOURCES_URL . '/css');
define('JS_URL', RESOURCES_URL . '/js');

define('ROOT_PATH', realpath(dirname(__FILE__)));
define('APP_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'App');
define('VIEW_PATH', APP_PATH . DIRECTORY_SEPARATOR . 'View');
define('DB_CONNECTION_URL', 'sqlite:' . ROOT_PATH . DIRECTORY_SEPARATOR . 'Database' . DIRECTORY_SEPARATOR . 'db.sqlite');
