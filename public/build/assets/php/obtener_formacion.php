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

$sql = "SELECT estudios.nombre AS 'nombre_formacion', estudios.centro_estudios AS 'centro_formacion', estudios.fecha_inicio AS 'fecha_inicio_formacion', estudios.fecha_fin AS 'fecha_fin_formacion' FROM estudios WHERE id_cv=" . $_GET['id_demandante'];

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo '{"nombre_formacion":"' . $row['nombre_formacion'] . '","centro_formacion":"' . $row['centro_formacion'] . '","fecha_inicio_formacion":"' . $row['fecha_inicio_formacion'] . '","fecha_fin_formacion":"' . $row['fecha_fin_formacion'] . '"},';
  }

} else {
  echo "0 results";
}

$conn->close();

?>
