<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}

$nome = $_SESSION['usuario']['nome'];
$tipo = $_SESSION['usuario']['tipo'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Painel Inicial</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo $nome; ?>!</h1>

    <ul>
        <li><a href="pagina-principal.php">Página Principal</a></li>
        <?php if ($tipo === 'admin') { ?>
            <li><a href="dashboard.php">Dashboard (Admin)</a></li>
        <?php } ?>
        <li><a href="logout.php">Sair</a></li>
    </ul>
</body>
</html>
