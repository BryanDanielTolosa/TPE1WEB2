<?php

class MuestraPerros
{

    function ListPerro($perros){
        require_once './templates/header.phtml';
        require_once './templates/main.phtml';
        require_once './templates/footer.phtml';
    }


    function DetalleItem($perros)
    {
        require_once './templates/header.phtml';
        require_once './templates/detallePerro.phtml';
        require_once './templates/footer.phtml';
    }
    

    

    function agregarForm($criaderos){
        require_once './templates/header.phtml';
        require './templates/agregarPerro.phtml';
        require_once './templates/footer.phtml';
    }
    
  

    function editarForm($criaderos, $perro){
        require_once './templates/header.phtml';
        require './templates/editarPerro.phtml';
        require_once './templates/footer.phtml';
    }

    
}

