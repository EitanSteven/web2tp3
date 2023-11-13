<?php
require_once "libs/Router.php";
require_once "api/apiControllers/apiAutorController.php";
require_once "api/apiControllers/apiLibrosController.php";

# http://localhost/web2/Clase2/Web2Tp/api/autores

$router = new Router();

// Tablas de ruteo

$router->addRoute("autores", "GET", "apiAutorController", "getAll");
$router->addRoute("autor/:ID", "GET", "apiAutorController", "get");
$router->addRoute("autores", "POST", "apiAutorController", "add");
$router->addRoute("autor/:ID", "PUT", "apiAutorController", "update");
$router->addRoute("autor/:ID", "DELETE", "apiAutorController", "delete");

$router->addRoute("libros", "GET", "apiLibrosController", "getAll");
$router->addRoute("libro/:ID", "GET", "apiLibrosController", "get");
$router->addRoute("libros/:ID", "GET", "apiLibrosController", "getAllbyID");
$router->addRoute("libros", "POST", "apiLibrosController", "add");
$router->addRoute("libro/:ID", "PUT", "apiLibrosController", "update");
$router->addRoute("libro/:ID", "DELETE", "apiLibrosController", "delete");

// ruteo

$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);