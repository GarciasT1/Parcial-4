<?php
class Author {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Obtener todos los autores
    public function getAllAuthors() {
        $query = 'SELECT * FROM author';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Crear un autor
    public function createAuthor($name, $dob, $dod) {
        $query = 'INSERT INTO author (FULL_NAME, DATE_OF_BIRTH, DATE_OF_DEATH) VALUES (?, ?, ?)';
        $stmt = $this->db->prepare($query);
        $stmt->execute([$name, $dob, $dod]);
    }
}
?>
