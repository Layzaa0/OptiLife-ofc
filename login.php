<?php
session_start();
include("conexao.php");

$email = $_POST['email'];
$senha = $_POST['password'];

// Consulta para verificar se o e-mail e senha existem
$sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ss", $email, $senha);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $usuario = $result->fetch_assoc();

    // Armazena o usuário logado na sessão, incluindo o tipo
    $_SESSION['usuario'] = [
        'id' => $usuario['id_usuario'],
        'nome' => $usuario['nome'],
        'email' => $usuario['email'],
        'tipo' => $usuario['tipo'] // Pega o tipo do banco
    ];

    // Verifica o tipo e redireciona
    if ($usuario['tipo'] === 'admin') {
        header("Location: dashboard.php");
    } else {
        header("Location: tutorial.html");
    }
    exit();
} else {
    echo "<script>alert('E-mail ou senha incorretos!'); window.location.href='index.html';</script>";
}

$stmt->close();
$conexao->close();
?>
