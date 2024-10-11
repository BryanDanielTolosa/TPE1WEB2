<?php
// hacer crud
class PerroModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=criadero_de_perros;charset=utf8', 'root', '');
    
    }
    // Obtengo perro()
    function getPerros(){
        $query = $this->db->prepare('SELECT * FROM perro');
        $query->execute();
        $perros= $query->fetchAll(PDO::FETCH_OBJ);

          return $perros;
    }
    function getPerro($id){
        $query=$this->db->prepare("SELECT * FROM perro  WHERE id = ? ");
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_OBJ);
    }
    function eliminarPerro($id){

    }
    function insentarPerro($perro,){

    }
    function editarPerro($perro, $id){

    }
    }
?>