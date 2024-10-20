<?php

//Archivos requeridos
require_once './app/model/criadero.model.php';
require_once './app/view/criadero.view.php';
require_once './app/model/perro.model.php';
require_once './app/helper/auth_helper.php';

//Clase
class CriaderoController {

    //Atributos de la clase
    private $view;
    private $model;
    private $perroModel;
    private $authHelper;

    //Constructor de la clase
    function __construct() {
    //Inicializamos los atributos de la clase
    $this->model = new CriaderoModel();
    $this->view = new CriaderoView();
    $this->authHelper = new AuthHelper();
    $this->perroModel = new ModeloPerro();
    }

    public function getModel() {
        return $this->model;
    }

    function showHome(){
        $perros = $this->perroModel->getPerros();
        $criaderos = $this->model->listarCategorias();
        $this->view->mostrarHome($perros, $criaderos);
    }
    //Metodos en modo Publico
 
    function listarCategorias(){
        $criaderos= $this->model->listarCategorias();
        $this->view->listarCategorias($criaderos);
    }

    function listarCategoriasEditar(){
        $criaderos= $this->model->listarCategorias();
        $this->view->editarCategoria($criaderos);
    }

    function listarCategoriasById($id){
        $idComoString = $id;
        $idEntero = (int) $idComoString;
        $criaderos= $this->model->listarCategoriasById($idEntero);
        $this->view->listarCategoriasById($criaderos);
    }

    function listarItemsPorCategoria($id){
        $items= $this->model->listarItemsPorCategoria($id);
        $this->view->listarItemsPorCategoria($items, $id);

    }

    //Metodos en modo Privado


    function mostrarFormularioAgregar(){
        $this->view->formularioAgregarCategoria();
    } 

    function agregarCriadero(){
        
        //validacion de datos
        if(!empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['localidad']) && !empty($_POST['raza']) && !empty($_POST['imagen'])){
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $localidad = $_POST['localidad'];
            $raza = $_POST['raza'];
            $imagen = $_POST['imagen'];
        
            $perros = $this->perroModel->getPerros();
            $criaderos = $this->model->listarCategorias();
            $this->model->agregarCriadero($nombre , $direccion, $localidad, $raza, $imagen);
            $this->view->criaderoAgregado($criaderos,$perros);
        
        }
    }

    function editarCategoria(){
        $this->view->editarCategoria();
    }
    function formEditarCriadero($id){
        $idComoString = $id;
        $idEntero = (int) $idComoString;
        $criaderos= $this->model->listarCategoriasById($idEntero);
        $this->view->formEditarCriadero($criaderos);
    }

    function editarCriadero($id){
var_dump($id);
$idComoString = $id;
$idEntero = (int) $idComoString;

        //validacion de datos
        if(!empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['localidad']) && !empty($_POST['raza']) && !empty($_POST['imagen'])){
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $localidad = $_POST['localidad'];
            $raza = $_POST['raza'];
            $imagen = $_POST['imagen'];

            $perros = $this->perroModel->getPerros();
        $criaderos = $this->model->listarCategorias();
            $this->view->criaderoEditado($criaderos, $perros);
        $this->model->editarCriadero($nombre, $direccion, $localidad, $raza, $imagen, $idEntero);
        
        } else {
            echo "entro en el else";
        }
    }

    function listarCategoriasEliminar(){
        $criaderos= $this->model->listarCategorias();
        $this->view->eliminarCategoria($criaderos);
    }

    function eliminarCriadero($id){
        $idComoString = $id;
        $idEntero = (int) $idComoString;
        $this->model->eliminarCriadero($idEntero);
        $criaderos= $this->model->listarCategorias();
        $this->view->eliminarCriadero($idEntero, $criaderos);

    }
}
?>