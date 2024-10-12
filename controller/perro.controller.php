<?php
// crear contruct, agrego atributos vista y modelo 
// quiero que me traiga la lista por ejemplo de modelo y que lo muestre en la vista
class PerroController {
    private $view;
    private $model;

    public function __construct() {
        $this->modelo = new ModeloPerro();
        $this->view = new ViewPerros();
    }

    public function GetPerros(){
        $Perros = $this->modelo->GetPerros();
        $this->view->MuestraPerros($Perros);
    }

    public function GetPerro($id){
        $Perro = $this->modelo->GetPerro($id);
        $this->view->MuestraPerro($Perro); 
    }

    public function EliminarPerro(){
        $id_perro = $_POST['id_perro'];
        $this->model->eliminarPerro($id_perro);
        header("Location: ". BASE_URL);
    }

    public function AgregarPerro(){
        if(!empty($_POST['nombre']) && !empty($_POST['nacimiento']) && !empty($_POST['padre']) 
        && !empty($_POST['sexo']) && !empty($_POST['madre']) && !empty($_POST['id_criadero'])){
    
        $nombre = $_POST['nombre'];
        $nacimiento = $_POST['nacimiento'];
        $padre = $_POST['padre'];
        $sexo = $_POST['sexo'];
        $madre = $_POST['madre'];
        $id_criadero = $_POST['	id_criadero'];
        $this->model->insentarPerro($nombre, $nacimiento, $padre, $sexo, $madre, $id_criadero);
        header("Location: ". BASE_URL);
    }else{
        echo "Rellena todos los campos";
    }
}

    public function EditarPerro(){
        if(!empty($_POST)){
        $id_perro = $_POST['id_perro'];
        $nombre = $_POST['nombre'];
        $nacimiento = $_POST['nacimiento'];
        $padre = $_POST['padre'];
        $sexo = $_POST['sexo'];
        $madre = $_POST['madre'];
        $id_criadero = $_POST['	id_criadero'];
        $this->model->editarPerro($nombre, $nacimiento, $padre, $sexo, $id_perro, $madre, $id_criadero);
        header("Location: ". BASE_URL);
        }
    }
}
?>