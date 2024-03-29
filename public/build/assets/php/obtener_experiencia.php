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

$sql = "SELECT experiencia.nombre AS 'nombre_experiencia', experiencia.centro_laboral AS 'empresa_experiencia', experiencia.descripcion AS 'descripcion_experiencia', experiencia.fecha_inicio AS 'fecha_inicio_experiencia', experiencia.fecha_fin AS 'fecha_fin_experiencia' FROM experiencia WHERE id_cv=" . $_GET['id_demandante'];

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo '{"nombre_experiencia":"' . $row['nombre_experiencia'] . '","empresa_experiencia":"' . $row['empresa_experiencia'] . '","descripcion_experiencia":"' . $row['descripcion_experiencia'] . '","fecha_inicio_experiencia":"' . $row['fecha_inicio_experiencia'] . '","fecha_fin_experiencia":"' . $row['fecha_fin_experiencia'] . '"},';
  }

} else {
  echo "0 results";
}

$conn->close();

?>
