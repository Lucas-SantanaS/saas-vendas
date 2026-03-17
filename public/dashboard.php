<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("Location: /saas-vendas/app/views/login.php");
    exit();
}

// Verifica feedback do CRUD
$message = '';
if(isset($_GET['success'])) {
    switch($_GET['success']) {
        case 'create':
            $message = "Produto adicionado com sucesso!";
            break;
        case 'update':
            $message = "Produto atualizado com sucesso!";
            break;
        case 'delete':
            $message = "Produto excluído com sucesso!";
            break;
    }
}
?>

<h1>Bem-vindo, <?php echo $_SESSION['user_name']; ?>!</h1>
<a href="/saas-vendas/app/views/logout.php"><button>Sair</button></a>

<?php if($message): ?>
        <p><?php echo $message; ?>
        <a href="/saas-vendas/app/views/products.php"><button>Ir para produtos</button></a>
<?php endif; ?> 