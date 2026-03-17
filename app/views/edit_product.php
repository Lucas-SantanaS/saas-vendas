<?php
session_start();

// Verifica se o usuário está logado
if(!isset($_SESSION['user_id'])) {
    header("Location: /saas-vendas/app/views/login.php");
    exit();
}

// Inclui model e conexão
require_once __DIR__ . '/../../app/models/Product.php';
require_once __DIR__ . '/../../config/database.php';

$productModel = new Product($conn);

// Verifica se o ID do produto foi passado
if(!isset($_GET['id'])) {
    header("Location: /saas-vendas/app/views/products.php");
    exit();
}

$id = $_GET['id'];
$product = $productModel->getById($id);

// Se produto não existe
if(!$product) {
    echo "Produto não encontrado!";
    exit();
}
?>

<h1>Editar Produto</h1>

<!-- Formulário de edição -->
<form method="POST" action="/saas-vendas/app/controllers/ProductController.php">
    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
    <label>Nome:</label>
    <input type="text" name="name" value="<?php echo $product['name']; ?>" required><br><br>

    <label>Preço:</label>
    <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required><br><br>

    <label>Estoque:</label>
    <input type="number" name="stock" value="<?php echo $product['stock']; ?>" required><br><br>

    <button type="submit" name="update">Salvar Alterações</button>
</form>

<br>
<a href="/saas-vendas/app/views/products.php"><button>Cancelar</button></a>