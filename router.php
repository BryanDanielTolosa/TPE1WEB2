<?php
require_once './app/controller/criadero.controller.php';
require_once './app/controller/perro.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto, cruceros??

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else{
    $action = 'home';
}

// Parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// Instancio los controller que existen por ahora

$PerroController = new PerroController();
$CriaderoController = new CriaderoController();

// Tabla de ruteo, determina que camino seguir segun la accion

switch ($params[0]){
    
    case 'home':
        if($params[1]==''){
            $CriaderoController->showPublico();
        }
            
        else if($params[1]=="listadoItems"){
            $PerroController->listarItem();
        } else if($params[1]=="detalleItems"){
            $PerroController->detalleItem();
        } else if($params[1]=="listadoCategorias"){
            $CriaderoController->listarCategorias();
        } else if($params[1]=="listadoItemsPorCategoria"){
            $CriaderoController->listarItemsPorCategoria($params[2]);
        };
        
        break;
    case 'usuario':
        $CriaderoController->showPrivado();
        
        
        break;

    default:
        header('HTTP/1.0 404 Not Found');
        echo('404 Page not found');
        break;
}
?>