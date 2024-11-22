<?php
$host = 'localhost';
$dbname = 'parcial4';  // Base de datos proporcionada
$username = 'root';  // Usuario por defecto de MySQL
$password = '';  // Contraseña (vacía en XAMPP por defecto)

try {
    // Conexión a la base de datos usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}
?>
    