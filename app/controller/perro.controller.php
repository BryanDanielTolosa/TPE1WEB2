<?php
require_once './app/model/perro.model.php';
require_once './app/view/perro.view.php';
require_once './app/helper/auth_helper.php';
require_once './app/model/criadero.model.php';

// crear contruct, agrego atributos vista y modelo 
// quiero que me traiga la lista por ejemplo de modelo y que lo muestre en la vista
class PerroController {
    private $view;
    private $model;
    private $authHelper;
    private $criadero;

    public function __construct() {
        $this->model = new ModeloPerro();
        $this->view = new MuestraPerros();
        $this->authHelper = new AuthHelper();
        $this->criadero= new CriaderoModel();
    }

    public function getPerros(){

       $perros = $this->model->getPerros();
        $this->view->ListPerro($perros);
    }

    public function GetPerro($id){
        $Perro = $this->model->getPerro($id);
        if(!empty($Perro))
            $this->view->DetalleItem($Perro);
    }
    
    public function EliminarPerro($id){
        $idComoString = $id;
        $idEntero = (int) $idComoString;
         $this->model->eliminarPerro($idEntero);
        $_SESSION['mensaje_exito'] = "Perro eliminado exitosamente.";
        header("Location: ". BASE_URL);
        die();
    }

    public function agregarPerro(){
        
        if(!empty($_POST['nombre']) && !empty($_POST['nacimiento']) && !empty($_POST['padre']) &&
         !empty($_POST['sexo']) && !empty($_POST['madre']) && !empty($_POST['id_criadero']) && !empty($_POST['imagen'])){
    
        $nombre = $_POST['nombre'];
        $nacimiento = $_POST['nacimiento'];
        $padre = $_POST['padre'];
        $sexo = $_POST['sexo'];
        $madre = $_POST['madre'];
        $id_criadero = $_POST['id_criadero'];
        $imagen = $_POST['imagen'];
        $this->model->insentarPerro($nombre, $nacimiento, $padre, $sexo, $madre, $id_criadero, $imagen);
        $_SESSION['mensaje_exito'] = "Perro agregado exitosamente.";
        header("Location: ". BASE_URL);
        die();
}
}
function agregarForm(){
    $criaderos = $this->criadero->listarCategorias();
    $this->view->agregarForm($criaderos);
}

function editarForm($id){
    $perro = $this->model->getPerro($id);
    $criaderos = $this->criadero->listarCategorias();
    $this->view->editarForm($criaderos, $perro);
}
public function editarPerro($id){
    $id = (int) $id; // Asegurarse de que $id es un entero
    if (!empty($_POST['nombre']) && !empty($_POST['nacimiento']) && !empty($_POST['padre']) &&
     !empty($_POST['sexo']) && !empty($_POST['madre']) && !empty($_POST['imagen'])) {
        $nombre = $_POST['nombre'];
        $nacimiento = $_POST['nacimiento'];
        $padre = $_POST['padre'];
        $sexo = $_POST['sexo'];
        $madre = $_POST['madre'];
        $imagen = $_POST['imagen'];
        $this->model->editarPerro($nombre, $nacimiento, $padre, $sexo, $madre, $imagen, $id);
        
        // Establecer mensaje de éxito en la sesión
        $_SESSION['mensaje_exito'] = "Perro editado exitosamente.";
        
        // Redirigir a la lista de perros después de editar
        header("Location: " . BASE_URL);
        die();
    } 
}
}
?>