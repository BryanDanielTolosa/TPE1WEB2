<?php

require_once './app/view/login.view.php';
require_once './app/model/user.model.php';
require_once './app/helper/auth_helper.php';

class AuthController {
    private $view;
    private $model;
    private $authHelper;

    function __construct() {
        $this->view = new LoginView();
        $this->model = new UserModel();
        $this->authHelper = new AuthHelper();
    }

    function showLogin() {
        return $this->view->login();
    }

    function login() {
        if (!empty($_POST['Usuario']) || !empty($_POST['contraseña'])) {
            $Usuario = $_POST['Usuario'];
            $contraseña = $_POST['contraseña'];
            $user = $this->model->user($Usuario);

            if ($user && password_verify($contraseña, $user->contraseña)) {
                $this->authHelper->login($user);
                header("Location: " . BASE_URL);
            } else {
                $this->view->login('Usuario inválido');
            }
        }else{
            $this->view->login('Usuario inválido');
        } 
    }

    function logout(){
        $this->authHelper->logout(); 
    }
}