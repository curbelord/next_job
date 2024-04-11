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

$sql = "SELECT users.id AS 'id', users.nombre AS 'nombre', users.fecha_nacimiento AS 'fecha_nacimiento', users.direccion AS 'direccion_postal', users.telefono AS 'telefono', users.email AS 'email', estado.nombre AS 'nombre_estado', estado.created_at AS 'fecha_estado' FROM users, estado WHERE users.id = estado.id_demandante AND users.id=" . $_GET['id_demandante'] . " ORDER BY estado.created_at DESC LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo '{"id":"' . $row['id'] . '","nombre":"' . $row['nombre'] . '","fecha_nacimiento":"' . $row['fecha_nacimiento'] . '","direccion_postal":"' . $row['direccion_postal'] . '","telefono":"' . $row['telefono'] . '","email":"' . $row['email'] . '","nombre_estado":"' . $row['nombre_estado'] . '","fecha_estado":"' . $row['fecha_estado'] . '"},';
  }

} else {
  echo "'0 resultados'";
}

$conn->close();

?>
