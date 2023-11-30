<!DOCTYPE html>
<html lang='pt'>
<head>
<meta charset='utf-8'>
<meta http-equiv="refresh" content="2; url=registration.html">


</head>
<body>
<?php

$servername = "localhost";
$username = "root";
$password = "golimar10*";
$dbname = "usuariosporao";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$key = 'chaveParaAbrirAsSenhas123';
$cipher = 'AES-256-CBC';


$fullName = $_POST['fullName'];
$username = $_POST['username'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];


$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
$encryptedPassword = openssl_encrypt($password, $cipher, $key, 0, $iv);

$sql = "INSERT INTO clientes (fullName,username,email,phoneNumber,password,confirmPassword) 
VALUES ('$fullName', '$username', '$email', '$phoneNumber', '$encryptedPassword', '$encryptedPassword');"; 



if ($conn->query($sql) === TRUE) {
  echo "Message sent successfully!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?> 
</body>
</html> 
