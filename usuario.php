<?php
include ("conexao.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$idade = $_POST['idade'];
$sexo = $_POST['sexo'];
$cep= $_POST['cep'];
$email = $_POST['email'];
$senha = $_POST['senha'];


$sql = " INSERT INTO cadastro (nome,cpf,idade,sexo,cep,email,senha)
values ('$nome','$cpf', '$idade', '$sexo', '$cep', '$email','$senha')";
if (mysqli_query ($conexao,$sql)) {
    header('Location: cadastro.html');
 } else {
     echo "erro" . mysqli_connect_erro($conexao);
 }

mysqli_close($conexao);
?>