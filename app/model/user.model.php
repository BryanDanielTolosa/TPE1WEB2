<?php
require_once './app/database/config.php';
class UserModel {
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

    function user($usuario){
        $query = $this->db->prepare('SELECT * FROM user WHERE Usuario = ?');
        $query->execute(array($usuario));
        
        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
}
}