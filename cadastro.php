<?php
include("conexao.php");

// Pegando os dados do formulário
$nome = trim($_POST['username']);
$email = trim($_POST['email']);
$senha = trim($_POST['password']);
$telefone = trim($_POST['phone']);
$tipo = 'usuario'; // Por padrão, novos usuários são do tipo 'usuario'

// Verificando campos obrigatórios
if (empty($nome) || empty($email) || empty($senha) || empty($telefone)) {
    echo "<script>alert('Preencha todos os campos.'); window.location.href='cadastro.html';</script>";
    exit();
}

// Verificando se o e-mail já está cadastrado
$sql_verifica = "SELECT * FROM usuarios WHERE email = ?";
$stmt_verifica = $conexao->prepare($sql_verifica);
$stmt_verifica->bind_param("s", $email);
$stmt_verifica->execute();
$resultado = $stmt_verifica->get_result();

if ($resultado->num_rows > 0) {
    echo "<script>alert('Este e-mail já está cadastrado. Faça login.'); window.location.href='index.html';</script>";
    exit();
}

// Inserindo o novo usuário no banco
$sql = "INSERT INTO usuarios (nome, email, senha, telefone, tipo) VALUES (?, ?, ?, ?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("sssss", $nome, $email, $senha, $telefone, $tipo);

if ($stmt->execute()) {
    echo "<script>alert('Cadastro realizado com sucesso! Agora faça o login.'); window.location.href='index.html';</script>";
} else {
    echo "<script>alert('Erro ao cadastrar: " . $stmt->error . "'); window.location.href='cadastro.html';</script>";
}

$stmt->close();
$stmt_verifica->close();
$conexao->close();
?>
