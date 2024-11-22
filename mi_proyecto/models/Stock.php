<?php
class Stock {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Obtener stock de libros
    public function getStockByBook($bookId) {
        $query = 'SELECT * FROM stock WHERE ID_BOOK = ?';
        $stmt = $this->db->prepare($query);
        $stmt->execute([$bookId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar stock
    public function updateStock($bookId, $totalStock, $notes, $lastInventory) {
        $query = 'UPDATE stock SET TOTAL_STOCK = ?, NOTES = ?, LAST_INVENTORY = ? WHERE ID_BOOK = ?';
        $stmt = $this->db->prepare($query);
        $stmt->execute([$totalStock, $notes, $lastInventory, $bookId]);
    }
}
?>
