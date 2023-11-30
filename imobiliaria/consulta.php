<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imobiliaria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: white;
        }

        th, td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>imobiliaria</h1>

<?php
$servername = "localhost";
$username = "root";
$password = "golimar10*";
$dbname = "imobiliaria";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data from the table
$sql = "SELECT * FROM imoveis";
$result = $conn->query($sql);

// Display the data
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>endereço</th><th>comodos</th><th>Valor</th><th>Tipo</th><th>Mais info</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["endereco"] . "</td>";
        echo "<td>" . $row["quartos"] . "</td>";
        echo "<td>" . $row["valor"] . "</td>";
        echo "<td>" . $row["tipo"] . "</td>";
        echo "<td>" . $row["moreinfo"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No properties found.";
}

$conn->close();
?>
</body>
</html>
