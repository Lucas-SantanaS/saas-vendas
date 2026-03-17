<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../../config/database.php';
session_start();

$userModel = new User($conn);

// Registro
if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Para simplificar, vamos criar empresa fake (mais tarde você faz empresa real)
    $company_id = 1;

    if($userModel->create($name, $email, $password, $company_id)) {
        echo "Usuário registrado com sucesso!";
        header("Location: /saas-vendas/app/views/login.php?registered=success");
        exit();
    } else {
        echo "Erro ao registrar usuário.";
    }
}

// Login
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $userModel->getByEmail($email);
    if($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['company_id'] = $user['company_id'];
        $_SESSION['user_name'] = $user['name'];
        header("Location: ../../public/dashboard.php");
        exit();
    } else {
        echo "Email ou senha incorretos!";
    }
}