<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// header('Access-Control-Allow-Origin: *');

$servername = "localhost";
$username = "laravel";
$password = "password";
$dbname = "next_job";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// UPDATE table_name SET column1 = value1, column2 = value2, ... WHERE condition;

$sql = "UPDATE inscripcion SET anotacion='" . $_POST['texto'] . "' WHERE id_demandante=" . $_POST['id_demandante'] . " AND id_oferta=" . $_POST['id_oferta'];

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo '{"nota":"' . $row["nota"] . '"}';
  }
} else {
  echo "0 results";
}

$conn->close();

?>
