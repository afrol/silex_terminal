<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

define('PATH_SRC', __DIR__.'/../src');
define('PATH_VENDOR', __DIR__.'/../vendor');
define('PATH_VIEWS', PATH_SRC.'/views');
define('PATH_CONFIG', __DIR__.'/../config');

// Autoloader
require PATH_VENDOR .'/autoload.php';

$config = require PATH_CONFIG .'/dev.php';

$app = new Silex\Application($config);

require PATH_SRC .'/providers.php';

require PATH_SRC .'/routes.php';

$app->run();
