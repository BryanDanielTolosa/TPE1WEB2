<?php

class AuthHelper {

     /**
     * Verifica que el user este logueado y si no lo está
     * lo redirige al login.
     */
    public function __construct() {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function checkLoggedIn() {
        if (!isset($_SESSION['IS_LOGGED'])) {
            header("Location: " . BASE_URL . 'Login');
            die();
        }
    } 

    public function login($user){
        $_SESSION['USER_ID'] = $user->id;
        $_SESSION['USER_usuario'] = $user->usuario;
    }
}
?>