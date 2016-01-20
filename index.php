<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

session_start();
define('root',dirname(__FILE__));
define('view', root . '/application/views/');
require_once root . '/application/components/autoload.php';

$router = new Router();
$router->run();
