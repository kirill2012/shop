<?php

use \core\App;

ini_set('display_errors',1);
error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);
define('PUBLIC', dirname(__FILE__). DS);
define('ROOT', dirname(dirname(__FILE__)). DS);
define('APP', ROOT . 'app' . DS);
define('VENDOR', ROOT . 'vendor' . DS);

define('URL', 'http://shop');

require VENDOR . 'autoload.php';

spl_autoload_register(function ($class) {
    $file = APP . $class . '.php';
    if(file_exists($file)){
        require_once $file;
    }
});

App::start();