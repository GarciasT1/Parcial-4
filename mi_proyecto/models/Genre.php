<?php
class Genre {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Obtener todos los géneros
    public function getAllGenres() {
        $query = 'SELECT * FROM genre';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Crear un género
    public function createGenre($name) {
        $query = 'INSERT INTO genre (NAME) VALUES (?)';
        $stmt = $this->db->prepare($query);
        $stmt->execute([$name]);
    }
}
?>
