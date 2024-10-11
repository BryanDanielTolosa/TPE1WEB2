<?php

class CriaderoModel{

    private function connect(){
        $db = new PDO('mysql:host=localhost;dbname=criadero_de_perros;charset=utf8', 'root', '');
        return $db;
    }

    function listarCategorias(){
        //Abrimos una conexcion con la base de datos
        $db = $this->connect();

        //Enviamos la consulta y obtenemos el resultado
        $query = $db->prepare( 'SELECT * FROM criadero'); 
        $query->execute();

        //Obtengo todos los datos de la consulta
        $criaderos = $query->fetchAll(PDO::FETCH_OBJ);

        return $criaderos;

    }

    function listarItemsPorCategoria($id){
        //Abrimos una conexcion con la base de datos
        $db = $this->connect();

        //Enviamos la consulta y obtenemos el resultado
        $query = $db->prepare( 'SELECT * FROM perro WHERE id_criadero=?'); 
        $query->execute([$id]);

        //Obtengo todos los datos de la consulta

        $items = $query->fetchAll(PDO::FETCH_OBJ);

        return $items;
    }
}
/*
//crear db
$db = new PDO('mysql:host=localhost;'
.'dbname=criadero_de_perros;charset=utf8'
, 'root', '');

//ejecutar consulta
$query = $db->prepare( "SELECT * FROM criadero");
$query->execute();

//obtener datos
$criaderos = $query->fetchAll(PDO::FETCH_OBJ);
		foreach($criaderos as $criadero) {
			echo $criadero->nombre;
		}
// insertar

$db->execute("INSERT INTO tarea(titulo)"."VALUES('".$tarea."')");
$sentencia = $db->prepare(
    "INSERT INTO tarea(titulo) VALUES(?)");
    $sentencia->execute(array('Hacer la página de Web'));

    
    header("Location: /home"); 

//borrar
    $sentencia = $db->prepare( 
        "delete from tarea where id=?");
        
        
        $sentencia->execute([$id_tarea]);
        

        //actualizacion

        $sentencia = $db->prepare(
            "UPDATE tarea SET Finalizada=1
             WHERE idTarea=?");
            
            $sentencia->execute([$id_tarea]);
            
*/
?>
