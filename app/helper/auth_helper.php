<?php

class AuthHelper {

    /**
     * Verifica que el user este logueado y si no lo está
     * lo redirige al login.
     */
    public function __construct() {
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
    }

    public function login($user){
        $_SESSION['USER_ID'] = $user->id;
        $_SESSION['USER_USUARIO'] = $user->Usuario;
    }

    public function checkLoggedIn() {
        if(!empty($_SESSION['USER_ID'])){
            return true;
        }else{
            header("Location: " . BASE_URL);
            return false;
        }
    }
    function logout(){
        session_destroy();
        header("Location: " . BASE_URL);
    }

}
?>