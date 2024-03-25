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

$sql = "SELECT referencia, puesto_trabajo, ubicacion, oferta.created_at, COUNT(inscripcion.id_demandante) AS 'candidatos_inscritos', candidatos_preseleccionados AS 'candidatos_preseleccionados', curriculums_ciegos FROM oferta INNER JOIN inscripcion ON oferta.referencia = inscripcion.id_oferta LEFT JOIN candidatos_preseleccionados ON oferta.referencia = candidatos_preseleccionados.id_oferta GROUP BY oferta.referencia;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo '{"referencia":"' . $row["referencia"] . '","puesto_trabajo":"' . $row["puesto_trabajo"] . '","ubicacion":"' . $row["ubicacion"]. '","fecha_creacion":"' . date('d/m/Y', strtotime($row["created_at"])) . '","candidatos_inscritos":"' . $row["candidatos_inscritos"] . '","candidatos_preseleccionados":"' . $row["candidatos_preseleccionados"] . '","curriculums_ciegos":"' . $row["curriculums_ciegos"] . '"},';
  }
} else {
  echo "0 results";
}

$conn->close();

?>
