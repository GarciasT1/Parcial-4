<?php
class Book {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Obtener todos los libros
    public function getAllBooks() {
        $query = 'SELECT * FROM book';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Crear un libro
    public function createBook($title, $description, $year, $authorId, $genreId) {
        $query = 'INSERT INTO book (TITLE, DESCRIPTION, YEAR_PUBLICATION, ID_AUTHOR, ID_GENRE) VALUES (?, ?, ?, ?, ?)';
        $stmt = $this->db->prepare($query);
        $stmt->execute([$title, $description, $year, $authorId, $genreId]);
    }
}
?>
    