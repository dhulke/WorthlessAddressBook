<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'definitions.php';
require_once 'Framework/autoload.php';
//require 'vendor/autoload.php'; //would have been a much better option, but we're going with a "pure PHP" approach

\Framework\Session::start();
\Framework\DB::mainConnection(DB_CONNECTION_URL);

$router = new \Framework\Router($_SERVER['REQUEST_URI']);
list($controller, $action, $parameters) = $router->getRoute();

$executor = new \Framework\Executor($controller, $action, $parameters);
$executor->run();