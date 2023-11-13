<?php

require_once "DBconfig.php";

class autoresModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=' . HOST . ';dbname=' . NAME . ';charset=' . CHARSET . '', '' . USER . '', '' . PASS . '');
    }

    public function getAutores($parametros = null) {
        $sql = 'SELECT * FROM autores';
        if (isset($parametros['order'])) {
            $sql .= ' ORDER BY '. $parametros['order'];
            if (isset($parametros['sort'])) {
                $sql .= ' '. $parametros['sort'];
            }
        }

        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getAutor($id) {
        $query = $this->db->prepare("SELECT * FROM autores WHERE ID_Autor = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function getNombre($id) {
        $query = $this->db->prepare("SELECT Nombre_Autor from autores WHERE ID_Autor = ?");
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getEstado($id) {
        // Obtén el estado actual del autor
        $query = $this->db->prepare("SELECT Estado FROM autores WHERE ID_Autor = ?");
        $query->execute([$id]);
        return $query->fetchColumn();
    }
    public function updateState($originState, $id) {
        $newState = !$originState;

        $query = $this->db->prepare("UPDATE autores SET Estado = ? WHERE ID_Autor = ?");
        $result = $query->execute([$newState, $id]);
        return $result;
    }
    public function deleteAutor($id) {
        $query = $this->db->prepare('DELETE FROM autores WHERE ID_Autor = ?');
        $query->execute([$id]);
        return $query->rowCount();
    }
    public function getLastId() {
        $autores = $this->getAutores();
        $id = 0;
        foreach ($autores as $autor) {
            $id = $autor->ID_Autor;
        }
        return $id;
    }
    public function addAutor($autorName, $autorNacionalidad, $estado, $autorBio) {
        $indice = $this->getLastId();
        $indice++;
        
        $query = $this->db->prepare('INSERT INTO autores (ID_Autor, Nombre_Autor, Nacionalidad, Biografia, Estado) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$indice, $autorName, $autorNacionalidad, $autorBio, $estado]);
        return $indice;
    }
    
}