<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Libros</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #212529;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #6c63ff;
            color: white;
            padding: 20px;
            text-align: center;
        }

        nav {
            background-color: #4a47a3;
            padding: 10px 0;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 20px auto;
        }

        h1, h2 {
            margin: 0 0 20px 0;
            text-align: center;
            color: #4a47a3;
        }

        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #4a47a3;
            color: white;
        }

        tr:hover {
            background-color: #f1f3f5;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
            color: #4a47a3;
        }

        input[type="text"], input[type="number"], select, textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 1em;
        }

        input[type="submit"] {
            background-color: #6c63ff;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 1.1em;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
            display: block;
            margin: 0 auto;
        }

        input[type="submit"]:hover {
            background-color: #4a47a3;
        }

        .no-books {
            text-align: center;
            color: #888;
            font-style: italic;
        }

        @media (max-width: 768px) {
            table, th, td {
                font-size: 0.9em;
            }

            input[type="submit"] {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Biblioteca Virtual</h1>
    </header>

    <nav>
        <a href="#list">Lista de Libros</a>
        <a href="#add">Agregar Libro</a>
    </nav>

    <div class="container">
        <section id="list">
            <h2>Lista de Libros</h2>
            <table>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Año de publicación</th>
                    <th>Autor</th>
                    <th>Género</th>
                </tr>
                <?php if (!empty($books)): ?>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($book['TITLE']); ?></td>
                        <td><?php echo htmlspecialchars($book['DESCRIPTION']); ?></td>
                        <td><?php echo htmlspecialchars($book['YEAR_PUBLICATION']); ?></td>
                        <td>
                            <?php 
                            // Validar si el autor existe
                            echo isset($authors[$book['ID_AUTHOR']]) 
                                ? htmlspecialchars($authors[$book['ID_AUTHOR']]['FULL_NAME']) 
                                : 'Autor desconocido'; 
                            ?>
                        </td>
                        <td>
                            <?php 
                            // Validar si el género existe
                            echo isset($genres[$book['ID_GENRE']]) 
                                ? htmlspecialchars($genres[$book['ID_GENRE']]['NAME']) 
                                : 'Género desconocido'; 
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="no-books">No hay libros disponibles.</td>
                </tr>
            <?php endif; ?>
                <tr>
                    <td colspan="5" class="no-books">No hay libros disponibles.</td>
                </tr>
            </table>
        </section>

        <section id="add">
            <h2>Agregar Libro</h2>
            <form action="index.php?action=addBook" method="POST">
                <label for="title">Título:</label>
                <input type="text" id="title" name="title" required>

                <label for="description">Descripción:</label>
                <input type="text" id="description" name="description" required>

                <label for="year">Año de publicación:</label>
                <input type="number" id="year" name="year" min="0" max="<?php echo date('Y'); ?>" required>

                <label for="authorId">Autor:</label>
                <select id="authorId" name="authorId" required>
                    <option value="">Seleccione un autor</option>
                    <?php foreach ($authors as $author): ?>
                    <option value="<?php echo $author['ID_AUTHOR']; ?>">
                        <?php echo htmlspecialchars($author['FULL_NAME']); ?>
                    </option>
                <?php endforeach; ?>
                </select>

                <label for="genreId">Género:</label>
                <select id="genreId" name="genreId" required>
                    <option value="">Seleccione un género</option>
                   <?php foreach ($genres as $genre): ?>
                    <option value="<?php echo $genre['ID_GENRE']; ?>">
                        <?php echo htmlspecialchars($genre['NAME']); ?>
                    </option>
                <?php endforeach; ?>
                </select>

                <input type="submit" value="Agregar Libro">
            </form>
        </section>
    </div>
</body>
</html>
