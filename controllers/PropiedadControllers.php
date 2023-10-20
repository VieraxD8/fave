<?php 

namespace Controllers;
use MVC\Router;

class PropiedadControllers {

    public static function Index(Router $router) {

        $router->render('propiedades/faveinsurance');

    }
}