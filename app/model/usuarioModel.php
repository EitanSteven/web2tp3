<?php 

require_once "DBconfig.php";

class usuarioModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=' . HOST . ';dbname=' . NAME . ';charset=' . CHARSET . '', '' . USER . '', '' . PASS . '');
    }

    public function getUsuario($user) {
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE Nombre_Usuario = ? Limit 1");
        $query->execute([$user]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
}