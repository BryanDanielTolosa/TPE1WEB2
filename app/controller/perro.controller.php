<?php
require_once './app/model/perro.model.php';
require_once './app/view/criadero.view.php';

class PerroController {
    private $view;
    private $model;

    public function __construct() {
        $this->model = new PerroModel();
        $this->view = new CriaderoView();
    }

    public function GetPerros(){
        $Perros = $this->model->GetPerros();
        $this->view->MuestraPerros($Perros);
    }
}
?>.