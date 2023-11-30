<!DOCTYPE html>
<html lang='pt'>
<head>
<meta charset='utf-8'>
<meta http-equiv="refresh" content="2; url=contato.html">


</head>
<body>
<?php

$servername = "localhost";
$username = "root";
$password = "golimar10*";
$dbname = "cadastros";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$nome = $_POST['nome'];
$email = $_POST['email'];
$idade = $_POST['idade'];
$telefone = $_POST['telefone'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$prestacaopj = $_POST['prestacaopj'];
$clt = $_POST['clt'];
$avaliador = $_POST['avaliador'];
$montagemportifolio = $_POST['montagemportifolio'];
$treinamento = $_POST['treinamento'];
$atendimentoremoto = $_POST['atendimentoremoto'];
$avaliadorprojetos = $_POST['avaliadorprojetos'];
$outros = $_POST['outros'];

$sql = "INSERT INTO curriculos (nome,email,idade,telefone,cep,endereco,numero,complemento,bairro,cidade,estado,prestacaopj,clt,avaliador,montagemportifolio,treinamento,atendimentoremoto,avaliadorprojetos,outros) 
VALUES ('$nome', '$email', '$idade', '$telefone', '$cep', '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$estado', '$prestacaopj', '$clt', '$avaliador', '$montagemportifolio', '$treinamento', '$atendimentoremoto', '$avaliadorprojetos', '$outros');"; 



if ($conn->query($sql) === TRUE) {
  echo "Message sent successfully!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?> 
</body>
</html> 
