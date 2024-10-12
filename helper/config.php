<?php

class config{
    private $db;

    static function config(){
        return new PDO('mysql:host=localhost;'.'dbname=criadero_de_perros;charset=utf8', 'root', '',array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
}