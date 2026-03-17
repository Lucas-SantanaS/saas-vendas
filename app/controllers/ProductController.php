<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("Location: /saas-vendas/app/views/login.php");
    exit();
}

require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../../config/database.php';

$productModel = new Product($conn);
$company_id = $_SESSION['company_id'] ?? 1;

// Criar produto
if(isset($_POST['create'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    if($productModel->create($company_id, $name, $price, $stock)) {
        header("Location: /saas-vendas/public/dashboard.php?success=create");
        exit();
    } else {
        echo "Erro ao criar produto";
    }
}
    
// Editar produto
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    if($productModel->update($id, $name, $price, $stock)) {
        header("Location: /saas-vendas/public/dashboard.php?success=update");
        exit();
    } else {
        echo "Erro ao atualizar produto";
    }
}

// Deletar produto
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    if($productModel->delete($id)) {
        header("Location: /saas-vendas/public/dashboard.php?success=delete");
        exit();
    } else {
        echo "Erro ao deletar produto";
    }
}