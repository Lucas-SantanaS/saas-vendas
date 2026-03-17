<?php
$host = "localhost"; // servidor MySQL do XAMPP
$db   = "saas_vendas"; // nome do banco de dados
$user = "root"; // padrão do XAMPP
$pass = ""; // padrão do XAMPP é vazio

$conn = new mysqli($host, $user, $pass, $db);

// Checa conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
} 