<?php
session_start();

// Destrói todas as variáveis de sessão
$_SESSION = [];

// Destroi a sessão
session_destroy();

// Redireciona para a tela de login
header("Location: /saas-vendas/app/views/login.php");
exit();