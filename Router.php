<?php 

namespace MVC;

class Router {

    public $RutasGet = [];
    public $RutasPost = [];

    public function get($url, $fn){
        $this-> RutasGet[$url] = $fn;
    }


    public function comprobarRutas() {

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';

        $metodo = $_SERVER['REQUEST_METHOD'];

        if( $metodo === 'GET'){
            $fn = $this->RutasGet[$urlActual] ?? null;
        }

        if($fn) {
            call_user_func($fn, $this);
        } else {
            echo " pagina no encontrada ";
        }

    }

    public function render($vistas, $datos = []){

        ob_start();

        include __DIR__ . "/views/$vistas.php";

        $contenido = ob_get_clean();

        include __DIR__ . "/views/layout.php";

        foreach( $datos as $key => $value) {

            $$key = $value;
        }


    }



}