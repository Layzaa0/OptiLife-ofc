<?php
session_start();
include("conexao.php");

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] !== 'admin') {
    header("Location: acesso-negado.html");
    exit();
}

$id = $_POST['id'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "UPDATE usuarios SET email='$email', senha='$senha' WHERE id_usuario=$id";

if (mysqli_query($conexao, $sql)) {
    header("Location: dashboard.php");
} else {
    echo "Erro ao atualizar: " . mysqli_error($conexao);
}
?>
