<?php
require_once './controller/criadero.controller.php';
require_once './controller/perro.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'Criadero'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// instancio el unico controller que existe por ahora
$PerrosController = new PerrosController();
$PerroController = new PerroController();

// tabla de ruteo
switch ($params[0]){
    
}
?>