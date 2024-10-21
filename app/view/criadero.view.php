<?php

require_once './app/controller/criadero.controller.php';
require_once './app/model/criadero.model.php';

class CriaderoView{

    function mostrarHome($perros, $criaderos){
        require './templates/header.phtml';
        require './templates/main.phtml';
        require './templates/footer.phtml';
    }
    
    public function listarCategorias($criaderos){
        
        require_once './templates/header.phtml';
        require_once './templates/main.phtml';
        require_once './templates/footer.phtml';
        
    }

    public function listarCategoriasById($criaderos){
        

        require_once './templates/header.phtml';
        require_once './templates/listadoCategorias.phtml';
        require_once './templates/footer.phtml';
        
    }

    function listarItemsPorCategoria($items, $id){

        $CriaderoController = new CriaderoController();
        $criadero = $CriaderoController->getModel()->listarCategoriasById($id);
        
        require './templates/header.phtml';
        require './templates/listadoItemsPorCategoria.phtml';
        require_once './templates/footer.phtml';
    }

    function formularioAgregarCategoria(){
        require './templates/header.phtml';
        require './templates/agregarCriadero.phtml';
        require_once './templates/footer.phtml';
    }

    function editarCategoria($criaderos){
        require_once './templates/header.phtml';
        require_once './templates/editarCriadero.phtml';
        require_once './templates/footer.phtml';
    }

    function formEditarCriadero($criaderos){
    
        require_once './templates/formEditarCriadero.phtml';
        require_once './templates/footer.phtml';
    }

    

    

    
}

?>