<?php

class CriaderoView{

    //Muestra header
    function showHeader(){
        require_once './templates/header.phtml';
    }

    //Muestra footer
    function showFooter(){
        require_once './templates/footer.phtml';
    }

    function showHome(){
        $this->showHeader();
        $this->showFooter();
    }

    function showPublico(){
        $this->showHeader();
        $this->showMainPublico();
        $this->showFooter();
    }

    function showMainPublico(){
        require './templates/mainPublico.phtml';
    }

    function showPrivado(){
        $this->showHeader();
        $this->showMainPrivado();
        $this->showFooter();
    }

    function showMainPrivado(){
        require_once './templates/mainPrivado.phtml';
    }

    function listarCategorias($criaderos){
        
        $this->showHeader();
        $this->showMainPublico();

        echo "<h1>Listado de categorias</h1>";

        echo "<ul>";
        foreach($criaderos as $criadero) { 
            
            echo "<li>Nombre criadero: $criadero->Nombre - Direccion: $criadero->Direccion - ID_Criadero: $criadero->id_criadero - Localidad: $criadero->Localidad - Raza: $criadero->Raza </li>";
        }
        echo "</ul>";

        $this->showFooter();
        //header("Location: /publico");
    }

    function listarItemsPorCategoria($items, $id){

        $this->showHeader();
        echo "<h1>Listado de items por la categoria $id</h1>";

        echo "<ul>";
        foreach($items as $item) {
            echo "<li>Nombre perro: $item->nombre - Nacimiento: $item->nacimiento - Padre: $item->padre - Sexo: $item->sexo - ID_Perro: $item->id_perro - Madre: $item->madre</li>";
        }
        echo "</ul>";

        //$this->showFooter();
        //header("Location: /publico"); 
    }
}

?>