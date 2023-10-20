<?php
    
require __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PropiedadControllers;


$router = new Router();

$router->get('/faveinsurance', [PropiedadControllers::class,'Index']);



$router->comprobarRutas();