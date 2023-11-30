<!DOCTYPE html>
<html lang='pt'>
	<head>
		<meta charset="utf-8">
		<title>consulta de gmud</title>
		<style>
body {
background-image: url('imagens/logo.jpeg');
background-repeat: no-repeat;
background-position: center center;
background-attachment: fixed;
background-size: cover;
}

		</style> 
	</head>
	<body>
		<h1>Pagina de Consulta</h1>
<?php
$servername = "localhost";
$username = "root";
$password = "golimar10*";
$dbname = "matarazzo";


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$consulta = $_POST['consulta'];
echo "Numero da GMUD consultada:  $consulta <br><br>";
if (isset($_POST['consulta'])) {
    $consulta = $_POST['consulta'];
    $sql = "SELECT * FROM change_management WHERE change_number = '$consulta';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "Titulo da Change: " . $row["change_title"]. "<br>";
            echo "Numero da Change: " . $row["change_number"]. "<br>";
            echo "Razão da Change: " . $row["change_reason"]. "<br>";
            echo "Descrição da Change: " . $row["change_description"]. "<br>";
            echo "Tipo de Change: " . $row["change_type"]. "<br>";
            echo "Area Afetada: " . $row["affected_areas"]. "<br>";
            echo "Celula: " . $row["celula"]. "<br>";
            echo "Ambiente: " . $row["ambiente"]. "<br>";
            echo "Finalidade: " . $row["finalidade"]. "<br>";
            echo "Change anterior: " . $row["change_previous_number"]. "<br>";
            echo "Prioridade: " . $row["prioridade"]. "<br>";
            echo "Requisitante: " . $row["requisitante"]. "<br>";
            echo "Area do Requisitante: " . $row["arearequisitante"]. "<br>";
            echo "Responsavel pela Mudança: " . $row["responsavelmudanca"]. "<br>";
            echo "Area do Responsável da Mudança: " . $row["arearesponsavelmudanca"]. "<br>";
            echo "Usuário Chave: " . $row["usuariochave"]. "<br>";
            echo "Area do Usuario Chave: " . $row["areausuariochave"]. "<br>";
            echo "Data de Inicio: " . $row["datainicio"]. "<br>";
            echo "Data Limite: " . $row["datalimite"]. "<br>";
            echo "Data da Implantação: " . $row["dataimplantacao"]. "<br>";

            // Display uploaded file if it exists
            if ($row["evidencia"]) {
                echo "Evidência: <br>";
                echo "<img src='uploads/" . $row["evidencia"] . "' alt='evidencia'>";
            }
        }
    } else {
        echo "nenhum resultado encontrado";
    }
} else {
    echo "Parametros de busca foram passados errados!";
}
mysqli_close($conn);

?>
	</body>
</html>

