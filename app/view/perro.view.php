<?php

class MuestraPerros
{

    


    function DetalleItem($perros)
    {
        require_once './templates/header.phtml';
        require_once './templates/detallePerro.phtml';
        require_once './templates/footer.phtml';
    }
    function perroNoExiste($error = "")
    {
        require './templates/error.phtml';
        
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

