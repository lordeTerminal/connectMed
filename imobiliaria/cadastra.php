<?php
echo 'FUNCIONOU';
$serverName = "localhost";
$userName = "root";
$password = "golimar10*";
$dbName = "imobiliaria";



$conn = new mysqli($serverName, $userName, $password, $dbName);
	if ($conn->connect_error) {
		die("conexion failed: " . $conn->connect_error);
	}

$endereco = $_POST['endereco'];
$quartos = $_POST['quartos'];
$valor = $_POST['valor'];
$tipo = $_POST['tipo'];
$moreinfo = $POST['moreinfo'];



$sql = "INSERT INTO imoveis (endereco, quartos, valor, tipo, moreinfo) VALUES ('$endereco', '$quartos', '$valor', '$tipo', '$moreinfo');";
	if($conn->query($sql) === TRUE){
		echo "Deu certo";
	}
	else{
		echo "Erro" . $sql . "<br>" . $conn->error;
	}

$conn->close();

?>
