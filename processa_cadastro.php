<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $telefone = $_POST['telefone'];

 
    if (!empty($nome) && !empty($email) && !empty($senha) && !empty($telefone)) {
        $db = new database();

        $sql = "INSERT INTO usuarios (nome, email, senha, telefone) VALUES (?, ?, ?, ?)";
        $stmt = $db->conn->prepare($sql);
        $stmt->bind_param("Informe", $nome, $email, $senha, $telefone);

        if ($stmt->execute()) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . $stmt->error;
        }

        $stmt->close();
        $db->close();
    } else {
        echo "Todos os campos são obrigatórios.";
    }
}
?>
