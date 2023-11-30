<?php

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "saudeosasco";

// Cria uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}

// Obtém o e-mail do formulário
$email = $_POST["email"];

// Realiza uma consulta SQL para verificar se o e-mail existe no banco de dados
$sql = "SELECT * FROM email WHERE email = '$email'";
$result = $conn->query($sql);

// Verifica se o e-mail foi encontrado
if ($result->num_rows > 0) {

  // O e-mail existe no banco de dados

  // Obtém o nome do usuário
  $row = $result->fetch_assoc();
  $nome = $row["nome"];

  // Envia um e-mail com o link da página de recuperação de senha
  $assunto = "Recuperação de senha";
  $mensagem = "Olá, $nome.

  Para recuperar sua senha, clique no link abaixo:

  https://connectosasco.com.br/recadastrasenha.html

  Atenciosamente,
  Equipe Saúde Osasco";

  mail($email, $assunto, $mensagem);

  // Exibe a mensagem de sucesso
  echo "<div class='resultado-da-validacao'>E-mail validado com sucesso!</div>";

} else {

  // O e-mail não existe no banco de dados

  // Exibe a mensagem de erro
  echo "<div class='resultado-da-validacao'>Verifique o acesso com seu gestor</div>";

}

// Fecha a conexão com o banco de dados
$conn->close();

?>
