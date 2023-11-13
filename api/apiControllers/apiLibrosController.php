<?php
require_once "app/model/librosModel.php";
require_once "api/apiView.php";

class apiLibrosController {
    private $model, $view, $data;

    function __construct() {
        $this->model = new librosModel();
        $this->view = new apiView();
        $this->data = file_get_contents("php://input");
    }

    function getData() {
        return json_decode($this->data);
    }

    public function getAll($params = null) {
        $parametros = [];

        if (isset($_GET['sort'])) {
            $parametros['sort'] = $_GET['sort'];
        }

        if (isset($_GET['order'])) {
            $parametros['order'] = $_GET['order'];
        }

        $libros = $this->model->getLibros($parametros);
        $this->view->response($libros, 200);
    }
    public function getAllbyID($params = null) {
        $idAutor = $params[':ID'];
        $libros = $this->model->getLibrosId($idAutor);

        if ($libros) {
            $this->view->response($libros, 200);
        } else {
            $this->view->response("Los libros con el ID Autor:$idAutor no existe", 404);
        }
    }
    public function get($params = null) {
        // $params es un array asociativo con todos los parametros de la ruta
        $idLibro = $params[":ID"];
        $libro = $this->model->getLibro($idLibro);
        if ($libro) {
            $this->view->response($libro, 200);
        } else {
            $this->view->response("El Libro con el ID:$idLibro no existe", 404);
        }
    }
    public function delete($params = null) {
        $idLibro = $params[":ID"];
        $success = $this->model->deleteLibro($idLibro);
        if ($success) {
        $this->view->response("El Autor con el ID:$idLibro se borro exitosamente", 200);
        } else {
            $this->view->response("El Autor con el ID:$idLibro no existe, no se puede eliminar.", 404);
        }
    }
    public function update($params = null) {
        $idLibro = $params[":ID"];
        $originStock = $this->model->getStock($idLibro);
        
        $success = $this->model->updateStock($originStock, $idLibro);

        if ($success) {
            $this->view->response("Se cambio el estado del Autor:$idLibro", 200);
        } else {
            $this->view->response("No se pudo cambiar el estado", 500);
        }
    }
    public function add($params = null) {
        $body = $this->getData();
        $Titulo = $body->Titulo;
        $Genero = $body->Genero;
        $ID_Autor = $body->ID_Autor;
        $Stock = $body->Stock;

        $id = $this->model->addLibro($Titulo, $Genero, $ID_Autor, $Stock);

        if ($id > 0) {
            $this->view->response("Se agrego el Libro con el id:$id", 200);
        } else {
            $this->view->response("No se pudo cambiar el estado", 500);
        }
    }
}