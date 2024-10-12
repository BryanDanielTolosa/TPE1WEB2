<?php
// hacer crud
class ModeloPerro{
    private $db;

    function __construct(){
        $this->db = $this->db = config::config();
    
    }
    // Obtengo perro()
    function getPerros(){
        $query = $this->db->prepare('SELECT * FROM perro');
        $query->execute();
        $perros= $query->fetchAll(PDO::FETCH_OBJ);

          return $perros;
    }
    function getPerro($id){
        $query=$this->db->prepare("SELECT * FROM perro  WHERE id_perro = ? ");
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_OBJ);
    }
    function eliminarPerro($id){
        $query=$this->db->prepare("DELETE FROM perro WHERE id_perro = ?  ");
            try{
                $query->execute([$id]);
            }
            catch(PDOException $ex){
                die('no se puede borrar este perro');
            }
    }
    function insentarPerro($nombre, $nacimiento, $padre, $sexo, $madre, $id_criadero){
        $query=$this->db->prepare("INSERT INTO perro(nombre, nacimiento, padre, sexo, madre, id_criadero) VALUES (?,?,?,?,?,?)");
        $query->execute([$nombre, $nacimiento, $padre, $sexo, $madre, $id_criadero]);
        return $this->db->lastInsertId();
    }
    function editarPerro($nombre, $nacimiento, $padre, $sexo, $id_perro, $madre, $id_criadero){
        $query=$this->db->prepare ("UPDATE perro SET nombre = ?, nacimiento = ?, padre = ?, sexo= ?, madre= ?, id_criadero = WHERE id_perro = ?");
        $query->execute([$nombre, $nacimiento, $padre, $sexo, $id_perro, $madre, $id_criadero]);
    }
    }
?>