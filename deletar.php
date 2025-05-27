<?php
session_start();
include("conexao.php");

// Protege: só admins podem deletar
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] !== 'admin') {
    header("Location: acesso-negado.html");
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conexao->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();

    if ($result) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Erro ao excluir: " . $conexao->error;
    }
} else {
    echo "ID inválido.";
}
?>
