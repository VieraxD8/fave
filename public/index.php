<?php
    
require __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PropiedadControllers;


$router = new Router();

$router->get('/', [PropiedadControllers::class,'Index']);



$router->comprobarRutas();