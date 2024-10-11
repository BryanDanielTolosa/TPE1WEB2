<?php

//Archivos requeridos
require_once './app/model/criadero.model.php';
require_once './app/view/criadero.view.php';

//Clase
class CriaderoController {

    //Atributos de la clase
    private $view;
    private $model;

    //Constructor de la clase
    function __construct() {
        //Inicializamos los atributos de la clase
        $this->model = new CriaderoModel();
        $this->view = new CriaderoView();
    }

    /*
    function GetCriaderos(){
        $Criaderos = $this->model->GetCriaderos();
        $this->view->MuestraCriaderos($Criaderos);
    }*/

    function showHome(){
        $this->view->showHome();
    }

    //Metodos en modo Publico
    function showPublico(){
        $this->view->showPublico();
    }

    function listarCategorias(){
        $criaderos= $this->model->listarCategorias();
        $this->view->listarCategorias($criaderos);
    }

    function listarItemsPorCategoria($id){
        $items= $this->model->listarItemsPorCategoria($id);
        $this->view->listarItemsPorCategoria($items, $id);

        //Importante: En cada ítem siempre se debe mostrar el nombre de la categoría a la que pertenece.
    }

    //Metodos en modo Privado
    function showPrivado(){
        $this->view->showPrivado();
    }

    function agregarCategoria(){
        //subir foto por url
    }

    function editarCategoria(){

    }

    function eliminarCategoria(){

    }

    function showFooter(){
        $this->view->showFooter();
    }
    
}
?>