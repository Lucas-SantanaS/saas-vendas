<?php
require_once __DIR__ . '/../../config/database.php';

class User {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($name, $email, $password, $company_id, $role = 'admin') {
        $stmt = $this->conn->prepare("INSERT INTO users (name, email, password, company_id, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $name, $email, $password, $company_id, $role);
        return $stmt->execute();
    }

    public function getByEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}