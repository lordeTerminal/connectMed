<!DOCTYPE html>
<html lang='pt'>
<head>
<meta charset='utf-8'>
<meta http-equiv="refresh" content="2; url=consulta.html">

<style>
body {
  background-image: url('imagens/logo.jpeg');
  background-repeat: no-repeat;
}
</style> 

</head>
<body>
<?php

$servername = "localhost";
$username = "root";
$password = "golimar10*";
$dbname = "matarazzo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$change_title = $_POST['change_title'];
$change_number = $_POST['change_number'];
$change_reason = $_POST['change_reason'];
$change_description = $_POST['change_description'];
$change_type = $_POST['change_type'];
$affected_areas = $_POST['affected_areas'];
$celula = $_POST['celula'];
$ambiente = $_POST['ambiente'];
$finalidade = $_POST['finalidade'];
$change_previous_number = $_POST['change_previous_number'];
$prioridade = $_POST['prioridade'];
$requisitante = $_POST['requisitante'];
$arearequisitante = $_POST['arearequisitante'];
$responsavelmudanca = $_POST['responsavelmudanca'];
$arearesponsavelmudanca = $_POST['arearesponsavelmudanca'];
$usuariochave = $_POST['usuariochave'];
$areausuariochave = $_POST['areausuariochave'];
$datainicio = $_POST['datainicio'];
$datalimite = $_POST['datalimite'];
$dataimplantacao = $_POST['dataimplantacao'];
$indisponibilidade = $_POST['indisponibilidade'];
$quantotempo = $_POST['quantotempo'];
$janelaacordada = $_POST['janelaacordada'];
$comquem = $_POST['comquem'];
$agendarparada = $_POST['agendarparada'];
$dependenciamudanca = $_POST['dependenciamudanca'];
$qualmudanca = $_POST['qualmudanca'];
$datainicioimplantacao = $_POST['datainicioimplantacao'];
$datalimiteimplantacao = $_POST['datalimiteimplantacao'];
$beneficiadomudanca = $_POST['beneficiadomudanca'];
$impactadomudanca = $_POST['impactadomudanca'];
$servicoassociado = $_POST['servicoassociado'];
$icassociado = $_POST['icassociado'];
$recomendacaoexecucao = $_POST['recomendacaoexecucao'];
$risco = $_POST['risco'];
$impacto = $_POST['impacto'];
$descricaorisco = $_POST['descricaorisco'];
$descricaoimpacto = $_POST['descricaoimpacto'];
$commpublico = $_POST['commpublico'];
$commcanal = $_POST['commcanal'];
$commresponsavel = $_POST['commresponsavel'];
$commquando = $_POST['commquando'];
$nomedispositivo = $_POST['nomedispositivo'];
$serial = $_POST['serial'];
$modelo = $_POST['modelo'];
$responsavel = $_POST['responsavel'];
$nomedispositivo1 = $_POST['nomedispositivo1'];
$serial1 = $_POST['serial1'];
$modelo1 = $_POST['modelo1'];
$responsavel1 = $_POST['responsavel1'];
$nomedispositivo2 = $_POST['nomedispositivo2'];
$serial2 = $_POST['serial2'];
$modelo2 = $_POST['modelo2'];
$responsavel2 = $_POST['responsavel2'];
$sequencia1 = $_POST['sequencia1'];
$atividades1 = $_POST['atividades1'];
$tecnicoresponsavel1 = $_POST['tecnicoresponsavel1'];
$datahorainicio1 = $_POST['datahorainicio1'];
$tempoprevisto1 = $_POST['tempoprevisto1'];
$atividadereversao1 = $_POST['atividadereversao1'];
$sequencia2 = $_POST['sequencia2'];
$atividades2 = $_POST['atividades2'];
$tecnicoresponsavel2 = $_POST['tecnicoresponsavel2'];
$datahorainicio2 = $_POST['datahorainicio2'];
$tempoprevisto2 = $_POST['tempoprevisto2'];
$atividadereversao2 = $_POST['atividadereversao2'];
$sequencia3 = $_POST['sequencia3'];
$atividades3 = $_POST['atividades3'];
$tecnicoresponsavel3 = $_POST['tecnicoresponsavel3'];
$datahorainicio3 = $_POST['datahorainicio3'];
$tempoprevisto3 = $_POST['tempoprevisto3'];
$atividadereversao3 = $_POST['atividadereversao3'];
$sequencia4 = $_POST['sequencia4'];
$atividades4 = $_POST['atividades4'];
$tecnicoresponsavel4 = $_POST['tecnicoresponsavel4'];
$datahorainicio4 = $_POST['datahorainicio4'];
$tempoprevisto4 = $_POST['tempoprevisto4'];
$atividadereversao4 = $_POST['atividadereversao4'];
$sequenciapos1 = $_POST['sequenciapos1'];
$atividadepos1 = $_POST['atividadepos1'];
$tecnicoresponsavelpos1 = $_POST['tecnicoresponsavelpos1'];
$tempoprevistopos1 = $_POST['tempoprevistopos1'];
$sequenciapos2 = $_POST['sequenciapos2'];
$atividadepos2 = $_POST['atividadepos2'];
$tecnicoresponsavelpos2 = $_POST['tecnicoresponsavelpos2'];
$tempoprevistopos2 = $_POST['tempoprevistopos2'];
$sequenciapos3 = $_POST['sequenciapos3'];
$atividadepos3 = $_POST['atividadepos3'];
$tecnicoresponsavelpos3 = $_POST['tecnicoresponsavelpos3'];
$tempoprevistopos3 = $_POST['tempoprevistopos3'];
$sequenciapos4 = $_POST['sequenciapos4'];
$atividadepos4 = $_POST['atividadepos4'];
$tecnicoresponsavelpos4 = $_POST['tecnicoresponsavelpos4'];
$tempoprevistopos4 = $_POST['tempoprevistopos4'];
$evidencia = $_FILES['evidencia'];




$sql = "INSERT INTO change_management (change_title, change_number, change_reason, change_description, change_type, affected_areas, celula, ambiente, finalidade, change_previous_number, prioridade, requisitante, arearequisitante, responsavelmudanca, arearesponsavelmudanca, usuariochave, areausuariochave, datainicio, datalimite, dataimplantacao, indisponibilidade, quantotempo, janelaacordada, comquem, agendarparada, dependenciamudanca, qualmudanca, datainicioimplantacao, datalimiteimplantacao, beneficiadomudanca, impactadomudanca, servicoassociado, icassociado, recomendacaoexecucao, risco, impacto, descricaorisco, descricaoimpacto, commpublico, commcanal, commresponsavel, commquando, nomedispositivo, serial, modelo, responsavel, nomedispositivo1, serial1, modelo1, responsavel1, nomedispositivo2, serial2, modelo2, responsavel2, sequencia1, atividades1, tecnicoresponsavel1, datahorainicio1, tempoprevisto1, atividadereversao1, sequencia2, atividades2, tecnicoresponsavel2, datahorainicio2, tempoprevisto2, atividadereversao2, sequencia3, atividades3, tecnicoresponsavel3, datahorainicio3, tempoprevisto3, atividadereversao3, sequencia4, atividades4, tecnicoresponsavel4, datahorainicio4, tempoprevisto4, atividadereversao4, sequenciapos1, atividadepos1, tecnicoresponsavelpos1, tempoprevistopos1, sequenciapos2, atividadepos2, tecnicoresponsavelpos2, tempoprevistopos2, sequenciapos3, atividadepos3, tecnicoresponsavelpos3, tempoprevistopos3, sequenciapos4, atividadepos4, tecnicoresponsavelpos4, tempoprevistopos4) 
VALUES ('$change_title', '$change_number', '$change_reason', '$change_description', '$change_type', '$affected_areas', '$celula', '$ambiente', '$finalidade', '$change_previous_number', '$prioridade', '$requisitante', '$arearequisitante', '$responsavelmudanca', '$arearesponsavelmudanca', '$usuariochave', '$areausuariochave', '$datainicio', '$datalimite', '$dataimplantacao', '$indisponibilidade', '$quantotempo', '$janelaacordada', '$comquem', '$agendarparada', '$dependenciamudanca', '$qualmudanca', '$datainicioimplantacao', '$datalimiteimplantacao', '$beneficiadomudanca', '$impactadomudanca', '$servicoassociado', '$icassociado', '$recomendacaoexecucao', '$risco', '$impacto', '$descricaorisco', '$descricaoimpacto', '$commpublico', '$commcanal', '$commresponsavel', '$commquando', '$nomedispositivo', '$serial', '$modelo', '$responsavel', '$nomedispositivo1', '$serial1', '$modelo1', '$responsavel1', '$nomedispositivo2', '$serial2', '$modelo2', '$responsavel2', '$sequencia1', '$atividades1', '$tecnicoresponsavel1', '$datahorainicio1', '$tempoprevisto1', '$atividadereversao1', '$sequencia2', '$atividades2', '$tecnicoresponsavel2', '$datahorainicio2', '$tempoprevisto2', '$atividadereversao2', '$sequencia3', '$atividades3', '$tecnicoresponsavel3', '$datahorainicio3', '$tempoprevisto3', '$atividadereversao3', '$sequencia4', '$atividades4', '$tecnicoresponsavel4', '$datahorainicio4', '$tempoprevisto4', '$atividadereversao4', '$sequenciapos1', '$atividadepos1', '$tecnicoresponsavelpos1', '$tempoprevistopos1', '$sequenciapos2', '$atividadepos2', '$tecnicoresponsavelpos2', '$tempoprevistopos2', '$sequenciapos3', '$atividadepos3', '$tecnicoresponsavelpos3', '$tempoprevistopos3', '$sequenciapos4', '$atividadepos4', '$tecnicoresponsavelpos4', '$tempoprevistopos4');"; 



if ($conn->query($sql) === TRUE) {
  echo "Message sent successfully!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?> 
</body>
</html> 
