<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/mi_proyecto/includes/db.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/mi_proyecto/models/Book.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/mi_proyecto/models/Author.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/mi_proyecto/models/Genre.php';



class BookController {
    private $bookModel;
    private $authorModel;
    private $genreModel;

    public function __construct($db) {
        $this->bookModel = new Book($db);
        $this->authorModel = new Author($db);
        $this->genreModel = new Genre($db);
    }

    // Mostrar todos los libros
    public function showBooks() {
        $books = $this->bookModel->getAllBooks();
        $authors = $this->authorModel->getAllAuthors();
        $genres = $this->genreModel->getAllGenres();
        require $_SERVER['DOCUMENT_ROOT'] . '/mi_proyecto/views/book_list.php';

    }

    // Agregar un libro
    public function addBook($title, $description, $year, $authorId, $genreId) {
        $this->bookModel->createBook($title, $description, $year, $authorId, $genreId);
        header("Location: index.php?action=showBooks");
    }
}
?>
