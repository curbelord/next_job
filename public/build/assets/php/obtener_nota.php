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

$sql = "SELECT anotacion AS 'nota' FROM inscripcion WHERE id_demandante=" . $_GET['id_demandante'] . " AND id_oferta=" . $_GET['id_oferta'];

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
