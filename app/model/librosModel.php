<?php 

require_once "DBconfig.php";

class librosModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=' . HOST . ';dbname=' . NAME . ';charset=' . CHARSET . '', '' . USER . '', '' . PASS . '');
    }

    public function getLibros($parametros = null) {
        $sql = 'SELECT * FROM libros';
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
    public function getLibro($Libro) {
        $query = $this->db->prepare("SELECT * FROM libros WHERE ISBN = ?");
        $query->execute([$Libro]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getLibrosId($Autor) {
        $query = $this->db->prepare("SELECT * FROM libros WHERE ID_Autor = ?");
        $query->execute([$Autor]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getStock($id) {
        // Obtén el estado actual del autor
        $query = $this->db->prepare("SELECT Stock FROM libros WHERE ISBN = ?");
        $query->execute([$id]);
        return $query->fetchColumn();
    }
    public function updateStock($originSstock, $id) {
        $newStock = !$originSstock;

        $query = $this->db->prepare("UPDATE libros SET Stock = ? WHERE ISBN = ?");
        $query->execute([$newStock, $id]);
        return $query;
    }
    public function deleteLibro($id) {
        $query = $this->db->prepare('DELETE FROM libros WHERE ISBN = ?');
        $query->execute([$id]);
        return $id;
    }
    public function deleteLibroByAutor($autor) {
        $query = $this->db->prepare('DELETE FROM libros WHERE ID_Autor = ?');
        $query->execute([$autor]);
        return $autor;
    }
    public function getLastId() {
        $libros = $this->getLibros();
        $id = 0;
        foreach ($libros as $libro) {
            $id = $libro->ISBN;
        }
        return $id;
    }
    public function addLibro($Titulo, $Genero, $ID_Autor, $Stock) {
        $indice = $this->getLastId();
        $indice++;
    
        $query = $this->db->prepare('INSERT INTO libros (ISBN, Titulo, Genero, ID_Autor, Stock) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$indice, $Titulo, $Genero, $ID_Autor, $Stock]);
        return $indice;
    }
    
    
}