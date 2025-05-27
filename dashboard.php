<?php
session_start();

// Segurança reforçada: Garante que ninguém acesse sem login
if (!isset($_SESSION['usuario'])) {
    // Se a sessão não está definida, volta para o login
    header("Location: index.html"); // Ou sua página de login
    exit();
}

// Garante que apenas administradores possam acessar
if ($_SESSION['usuario']['tipo'] !== 'admin') {
    header("Location: acesso-negado.html");
    exit();
}

// Conexão com o banco
include("conexao.php");


// Busca todos os usuários
$sql = "SELECT * FROM usuarios";
$result = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Administração</title>
    <link rel="stylesheet" href="dashboard.css">
<style>
  a{
    padding:20px
  }

  .btn {
    padding: 6px 12px;
    margin: 2px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    font-family: Arial, sans-serif;
    display: inline-block;
    transition: 0.3s;
  }
  
  .btn.editar {
    background-color: #4CAF50; /* Verde */
    color: white;
  }
  
  .btn.editar:hover {
    background-color: #3e8e41;
  }
  
  .btn.deletar {
    background-color: #f44336; /* Vermelho */
    color: white;
  }
  
  .btn.deletar:hover {
    background-color: #c62828;
  }


  .btn.sair {
    background-color: #2196F3; /* Azul */
    color: white;
  }

  .btn.sair:hover {
    background-color: #0b7dda;
  }

  .btn.logout {
    background-color: #f44336; /* Vermelho */
    color: white;
  }

  .btn.logout:hover {
    background-color: #c62828;
  }

  .botoes-container {
    margin-top: 400px;
    text-align: end;
  }


</style>
</head>
<body>

<div class="container">
    <h2>Lista de Usuários</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome do Usuário</th>
            <th>E-mail</th>
            <th>Senha</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        <?php
        $contador = 1;
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $contador++; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['senha']; ?></td>
                <td><?php echo $row['telefone']; ?></td>
                <td>
                    <a class="btn editar" href="editar_cadastro.php?id=<?php echo $row['id_usuario']; ?>">Editar</a>
                    <a class="btn deletar" href="deletar.php?id=<?php echo $row['id_usuario']; ?>" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</a>
                  
                </td>
            </tr>
        <?php } ?>
    </table>
  <div class="botoes-container">
    <a href="principal.html" class="btn sair">Ir para a Página Principal</a>
    <a href="index.html" class="btn logout">Sair</a>
  </div>
</div>

</body>
</html>
