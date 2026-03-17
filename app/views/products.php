<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("Location: /saas-vendas/app/views/login.php");
    exit();
}

require_once __DIR__ . '/../../app/models/Product.php';
require_once __DIR__ . '/../../config/database.php';

$productModel = new Product($conn);
$company_id = $_SESSION['company_id'];
$products = $productModel->getAll($company_id);
?>

<h1>Produtos</h1>
<a href="/saas-vendas/public/dashboard.php">Voltar ao Dashboard</a>

<h2>Adicionar Produto</h2>
<form method="POST" action="/saas-vendas/app/controllers/ProductController.php">
    <input type="text" name="name" placeholder="Nome" required>
    <input type="number" step="0.01" name="price" placeholder="Preço" required>
    <input type="number" name="stock" placeholder="Estoque" required>
    <button type="submit" name="create">Adicionar</button>
</form>

<h2>Lista de Produtos</h2>
<table border="1">
    <tr>
        <th>Nome</th>
        <th>Preço</th>
        <th>Estoque</th>
        <th>Ações</th>
    </tr>
    <?php while($row = $products->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['stock']; ?></td>
        <td>
            <a href="/saas-vendas/app/views/edit_product.php?id=<?php echo $row['id']; ?>">Editar</a>
            <a href="/saas-vendas/app/controllers/ProductController.php?delete=<?php echo $row['id']; ?>">Deletar</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>