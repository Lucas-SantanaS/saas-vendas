<?php
require_once __DIR__ . '/../../config/database.php';

class Product {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($company_id, $name, $price, $stock) {
        $stmt = $this->conn->prepare("INSERT INTO products (company_id, name, price, stock) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isdi", $company_id, $name, $price, $stock);
        return $stmt->execute();
    }

    public function getAll($company_id) {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE company_id = ?");
        $stmt->bind_param("i", $company_id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function update($id, $name, $price, $stock) {
        $stmt = $this->conn->prepare("UPDATE products SET name = ?, price = ?, stock = ? WHERE id = ?");
        $stmt->bind_param("sdii", $name, $price, $stock, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}