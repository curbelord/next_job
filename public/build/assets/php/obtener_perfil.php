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

$sql = "SELECT users.nombre AS 'nombre', users.fecha_nacimiento AS 'fecha_nacimiento', users.direccion AS 'direccion_postal', users.telefono AS 'telefono', users.email AS 'email' FROM users WHERE users.id=" . $_GET['id_demandante'];

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo '{"nombre":"' . $row['nombre'] . '","fecha_nacimiento":"' . $row['fecha_nacimiento'] . '","direccion_postal":"' . $row['direccion_postal'] . '","telefono":"' . $row['telefono'] . '","email":"' . $row['email'] . '"},';
  }

} else {
  echo "0 results";
}

$conn->close();

?>
