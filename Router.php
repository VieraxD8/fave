<?php

namespace MVC;

class Router {
  
    public $rutasGET  = [];

    public function get($url, $fn){

        $this->rutasGET[$url] = $fn;
    }

    public function comprobarRutas() {

        $urlActual = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET'){

            $fn = $this->rutasGET[$urlActual] ?? null;
        }

        if($fn){

            call_user_func($fn, $this);

        }else {
            echo "PAGINA NO ENCONTRADA";
        }
    }


    //Muestra las vistas 

    public function render($vista) {

        ob_start();

        include __DIR__ . "/views/$vista.php";

        $contenido = ob_get_clean();

        include __DIR__ . "/views/layout.php";

    }

    
}