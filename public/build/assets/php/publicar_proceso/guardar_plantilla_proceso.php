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


$sql = "INSERT INTO oferta (fecha_cierre, numero_vacantes, salario, jornada, sector, tipo_trabajo, puesto_trabajo, descripcion, estudios_minimos, experiencia_minima, ubicacion, turno, estado, curriculums_ciegos, id_seleccionador, created_at, updated_at) VALUES ('" . $_POST['fecha_cierre'] . "', " . $_POST['numero_vacantes'] . ", " . $_POST['salario'] . ", '" . $_POST['jornada'] . "', '" . $_POST['sector'] . "', '" . $_POST['tipo_trabajo'] . "', '" . $_POST['puesto_trabajo'] . "', '" . $_POST['descripcion'] . "', '" . $_POST['estudios_minimos'] . "', " . $_POST['experiencia_minima'] . ", '" . $_POST['ubicacion'] . "', '" . $_POST['turno'] . "', 'Plantilla', '" . $_POST['curriculums_ciegos'] . "', " . $_POST['id_seleccionador'] . ", '" . $_POST['created_at'] . "', '" . $_POST['updated_at'] . "')";


$result = $conn->query($sql);

echo $result;

$conn->close();

?>
