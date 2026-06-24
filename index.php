<?php
session_start();

define('ROOT',     __DIR__);
define('APP',      ROOT . '/app');
define('BASE_URL', '/mitopie/');   // Change to '/' if mitopie is your server root

// Composer autoloader (PHPMailer, etc.)
require_once ROOT . '/vendor/autoload.php';

// Autoload: maps namespace\ClassName → app/namespace/ClassName.php
spl_autoload_register(function (string $class): void {
    $file = APP . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

require_once APP . '/core/helpers.php';

$router = new core\Router();
$router->dispatch();
