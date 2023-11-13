<?php
require_once "app/model/autoresModel.php";
require_once "app/model/librosModel.php";
require_once "api/apiView.php";

class apiAutorController {
    private $model, $librosModel ,$view, $data;

    function __construct() {
        $this->model = new autoresModel();
        $this->librosModel = new librosModel();
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

        $autores = $this->model->getAutores($parametros);
        $this->view->response($autores, 200);
    }
    public function get($params = null) {
        // $params es un array asociativo con todos los parametros de la ruta
        $idAutor = $params[":ID"];
        $autor = $this->model->getAutor($idAutor);
        if ($autor) {
            $this->view->response($autor, 200);
        } else {
            $this->view->response("El Autor con el ID:$idAutor no existe", 404);
        }
    }
    public function delete($params = null) {
        $idAutor = $params[":ID"];
        $successBook = $this->librosModel->deleteLibroByAutor($idAutor);
        $success = $this->model->deleteAutor($idAutor);
        if ($success & $successBook) {
        $this->view->response("El Autor con el ID:$idAutor se borro exitosamente", 200);
        } else {
            $this->view->response("El Autor con el ID:$idAutor no existe, no se puede eliminar.", 404);
        }
    }
    public function update($params = null) {
        $idAutor = $params[":ID"];
        $originState = $this->model->getEstado($idAutor);
        
        $success = $this->model->updateState($originState, $idAutor);

        if ($success) {
            $this->view->response("Se cambio el estado del Autor:$idAutor", 200);
        } else {
            $this->view->response("No se pudo cambiar el estado", 500);
        }
    }
    public function add($params = null) {
        $body = $this->getData();
        $Nombre_Autor = $body->Nombre_Autor;
        $Nacionalidad = $body->Nacionalidad;
        $Biografia = $body->Biografia;
        $Estado = $body->Estado;

        $id = $this->model->addAutor($Nombre_Autor, $Nacionalidad, $Estado, $Biografia);

        if ($id > 0) {
            $this->view->response("Se agrego el Autor con el id:$id", 200);
        } else {
            $this->view->response("No se pudo cambiar el estado", 500);
        }
    }
}