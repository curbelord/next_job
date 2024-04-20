<?php

include '../../env.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// header('Access-Control-Allow-Origin: *');


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE oferta SET puesto_trabajo='" . $_POST['puesto_trabajo'] . "', ubicacion='" . $_POST['ubicacion'] . "', provincia='" . $_POST['provincia'] . "', tipo_trabajo='" . $_POST['tipo_trabajo'] . "', sector='" . $_POST['sector'] . "', descripcion='" . $_POST['descripcion'] . "', estudios_minimos='" . $_POST['estudios_minimos'] . "', experiencia_minima=" . $_POST['experiencia_minima'] . ", jornada='" . $_POST['jornada'] . "', turno='" . $_POST['turno'] . "', numero_vacantes=" . $_POST['numero_vacantes'] . ", salario=" . $_POST['salario'] . ", fecha_cierre='" . $_POST['fecha_cierre'] . "', estado='" . $_POST['estado'] . "' WHERE referencia=" . $_POST['referencia'];

$result = $conn->query($sql);

echo $result;

$conn->close();

?>
