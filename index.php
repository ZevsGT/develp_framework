<?php
session_start();

include 'engine/lib/Twig/Autoloader.php';
use engine\classes\Router;

Twig_Autoloader::register();
spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class . '.class.php');
    if(file_exists($path)){
        include $path;
    }
});

header('Access-Control-Allow-Headers: X-Requested-With, content-type');//убрать на продакшен
header('Access-Control-Allow-Origin: *');//убрать на продакшен
header('Access-Control-Allow-Headers: *');


$priv = new Router();
$priv->run();
unset($priv);

