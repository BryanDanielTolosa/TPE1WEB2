<?php
require_once './app/database/config.php';
// hacer crud
class ModeloPerro{
    protected $db;

    public function __construct()
    {
        $this->db = new PDO(
            "mysql:host=" . MYSQL_HOST .
                ";dbname=" . MYSQL_DB . ";charset=utf8",
            MYSQL_USER,
            MYSQL_PASS
        );
        $this->_deploy();
    }

    private function _deploy()
    {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if (count($tables) == 0) {
            $sql = <<<END

		END;
            $this->db->query($sql);
    }
}
    // Obtengo perro()
    function getPerros(){
        $query = $this->db->prepare('SELECT a.*, b.* FROM perro a INNER JOIN criadero b ON a. id_criadero_fk = b. id_criadero');
        $query->execute();
        $perros= $query->fetchAll(PDO::FETCH_OBJ);

return $perros;
    }
    function getPerro($id){
        $query=$this->db->prepare("SELECT a.*, b.* FROM perro a INNER JOIN criadero b ON a. id_criadero_fk = b. id_criadero WHERE id_perro = ? ");
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
        $query=$this->db->prepare('INSERT INTO perro(nombre, nacimiento, padre, sexo, madre, id_criadero_fk) VALUES (?,?,?,?,?,?)');
        $query->execute([$nombre, $nacimiento, $padre, $sexo, $madre, $id_criadero]);
        
    }
    public function editarPerro($nombre, $nacimiento, $padre, $sexo, $madre, $id_perro) {
        $query = $this->db->prepare("UPDATE perro SET nombre = ?, nacimiento = ?, padre = ?, sexo = ?, madre = ? WHERE id_perro = ?");
        $query->execute([$nombre, $nacimiento, $padre, $sexo, $madre, $id_perro]);
    }
    }
?>