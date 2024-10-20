<?php

require_once './app/controller/criadero.controller.php';
require_once './app/model/criadero.model.php';

class CriaderoView{

    function mostrarHome($perros, $criaderos){
        require './templates/header.phtml';
        require './templates/mainPublico.phtml';
        require './templates/footer.phtml';
    }
    
    public function listarCategorias($criaderos){
        
        require_once './templates/header.phtml';
        require_once './templates/mainPublico.phtml';
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
        require './templates/agregarCriadero.php';
        require_once './templates/footer.phtml';
    }

    function criaderoAgregado($criaderos, $perros){
        require "./templates/header.phtml";
        echo "<h4 class='mensaje'>El criadero fue agregado</h4>";
        require "./templates/mainPublico.phtml";
        require "./templates/footer.phtml";
        
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

    function criaderoEditado($criaderos, $perros){
        require_once './templates/header.phtml';
        echo "<h4 class='mensaje'>El criadero fue editado</h4>";
        require_once './templates/mainPublico.phtml';
        require_once './templates/footer.phtml';
    }

    function eliminarCategoria($criaderos){
        require_once './templates/header.phtml';
        require_once './templates/eliminarCriadero.phtml';
        require_once './templates/footer.phtml';
    }

    function eliminarCriadero($idEntero, $criaderos){
        require_once './templates/header.phtml';
        echo"<h4 class='mensaje'>El criadero con el numero de ID $idEntero fue eliminado</h4>";
        require_once './templates/mainPublico.phtml';
        require_once './templates/footer.phtml';
    }

    
}

?>