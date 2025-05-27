<style>
 .background-video {
    position: fixed;
    top: 0;
    left: 0;
    min-width: 100%;
    min-height: 100%;
    object-fit: cover;
    z-index: -1;
  }
  form {
  width: 300px;
  margin: 40px auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
  background-color: #f9f9f9;
  font-family: Arial, sans-serif;
}

form h2 {
  text-align: center;
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 8px;
  font-weight: bold;
  color: #333;
}

input[type="text"],
input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 8px;
  margin-bottom: 20px;
  border: 1px solid #aaa;
  border-radius: 5px;
  box-sizing: border-box;
}

input[type="submit"],
button {
  width: 100%;
  padding: 10px;
  background-color:rgb(36, 106, 199);
  border: none;
  color: white;
  border-radius: 5px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s;
}

input[type="submit"]:hover,
button:hover {
  background-color:rgb(5, 22, 116);
}

h2{
    text-align: center;
    color: #fff;
}

</style>

<video autoplay muted loop class="background-video">
  <source src="pixverse2F_1745717507.mp4" type="video/mp4">
</video>

<?php
include("conexao.php");

$id = $_GET['id'];
$sql = "SELECT * FROM Usuarios WHERE id_usuario = $id";
$result = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($result);
?>


<?php
session_start();
include("conexao.php");

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] !== 'admin') {
    header("Location: acesso-negado.html");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM Usuarios WHERE id_usuario = $id";
$result = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($result);
?>


<h2>Editar Usuário</h2>
<form action="atualizar.php" method="POST">
<!-- O hidden vai esconder o ID do usuário para que não 
 seja atualizado pelo usuário na troca de atualização -->
  <input type="hidden" name="id" value="<?php echo $dados['id_usuario']; ?>">
  E-mail: <input type="text" name="email" value="<?php echo $dados['email']; ?>"><br>
  Senha: <input type="text" name="senha" value="<?php echo $dados['senha']; ?>"><br>
  <button type="submit">Atualizar</button>
</form>
