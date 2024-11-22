<?php
require_once 'includes/db.php';
require_once 'controllers/BookController.php';

$controller = new BookController($pdo);

// Verificar la acción
$action = isset($_GET['action']) ? $_GET['action'] : 'showBooks';

switch ($action) {
    case 'showBooks':
        $controller->showBooks();
        break;
    case 'addBook':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->addBook($_POST['title'], $_POST['description'], $_POST['year'], $_POST['authorId'], $_POST['genreId']);
        }
        break;
    default:
        echo "Acción no válida.";
}
?>
