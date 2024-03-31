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

// CONSULTA ANTIGUA (FUNCIONA, PERO NO TIENE LÍMITE Y NO DIFIERE POR EMPRESA) -> SELECT referencia, puesto_trabajo, ubicacion, oferta.created_at, COUNT(inscripcion.id_demandante) AS 'candidatos_inscritos', candidatos_preseleccionados AS 'candidatos_preseleccionados', curriculums_ciegos FROM oferta INNER JOIN inscripcion ON oferta.referencia = inscripcion.id_oferta LEFT JOIN candidatos_preseleccionados ON oferta.referencia = candidatos_preseleccionados.id_oferta GROUP BY oferta.referencia;

// SIGUIENTE CONSULTA. LO BUSCADO, PERO CON LIMITACIÓN EN LA DEVOLUCIÓN DE LOS DATOS -> SELECT referencia, puesto_trabajo, ubicacion, oferta.created_at, COUNT(inscripcion.id_demandante) AS 'candidatos_inscritos', candidatos_preseleccionados AS 'candidatos_preseleccionados', curriculums_ciegos FROM oferta INNER JOIN inscripcion ON oferta.referencia = inscripcion.id_oferta LEFT JOIN candidatos_preseleccionados ON oferta.referencia = candidatos_preseleccionados.id_oferta WHERE oferta.id_seleccionador=" . $_GET['id_seleccionador'] . " GROUP BY oferta.referencia LIMIT 10 OFFSET " . $_GET['numero_offset']

// FALTABA AÑADIR LA CANTIDAD TOTAL DE PROCESOS -> SELECT oferta.referencia, oferta.puesto_trabajo, oferta.ubicacion, oferta.created_at, COUNT(inscripcion.id_demandante) AS 'candidatos_inscritos', candidatos_preseleccionados AS 'candidatos_preseleccionados', curriculums_ciegos FROM oferta LEFT JOIN inscripcion ON oferta.referencia = inscripcion.id_oferta LEFT JOIN candidatos_preseleccionados ON oferta.referencia = candidatos_preseleccionados.id_oferta WHERE oferta.id_seleccionador=" . $_GET['id_seleccionador'] . " GROUP BY oferta.referencia, oferta.puesto_trabajo, oferta.ubicacion, oferta.created_at, candidatos_preseleccionados, curriculums_ciegos LIMIT 10 OFFSET " . $_GET['numero_offset']

// SELECT oferta.referencia, oferta.puesto_trabajo, oferta.ubicacion, oferta.created_at, COUNT(inscripcion.id_demandante) AS 'candidatos_inscritos', candidatos_preseleccionados AS 'candidatos_preseleccionados', curriculums_ciegos,(SELECT COUNT(*) FROM oferta WHERE oferta.id_seleccionador = 2) AS 'cantidad_total_ofertas' FROM oferta LEFT JOIN inscripcion ON oferta.referencia = inscripcion.id_oferta LEFT JOIN candidatos_preseleccionados ON oferta.referencia = candidatos_preseleccionados.id_oferta  WHERE oferta.id_seleccionador = 2  GROUP BY oferta.referencia, oferta.puesto_trabajo, oferta.ubicacion, oferta.created_at, candidatos_preseleccionados, curriculums_ciegos;


$sql = "SELECT oferta.referencia, oferta.puesto_trabajo, oferta.ubicacion, oferta.created_at, COUNT(inscripcion.id_demandante) AS 'candidatos_inscritos', candidatos_preseleccionados AS 'candidatos_preseleccionados', curriculums_ciegos, (SELECT COUNT(*) FROM oferta WHERE oferta.id_seleccionador=" . $_GET['id_seleccionador'] . ") AS 'cantidad_total_ofertas' FROM oferta LEFT JOIN inscripcion ON oferta.referencia = inscripcion.id_oferta LEFT JOIN candidatos_preseleccionados ON oferta.referencia = candidatos_preseleccionados.id_oferta  WHERE oferta.id_seleccionador=" . $_GET['id_seleccionador'] . " GROUP BY oferta.referencia, oferta.puesto_trabajo, oferta.ubicacion, oferta.created_at, candidatos_preseleccionados, curriculums_ciegos LIMIT 10 OFFSET " . $_GET['numero_offset'];

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo '{"referencia":"' . $row["referencia"] . '","puesto_trabajo":"' . $row["puesto_trabajo"] . '","ubicacion":"' . $row["ubicacion"]. '","fecha_creacion":"' . date('d/m/Y', strtotime($row["created_at"])) . '","candidatos_inscritos":"' . $row["candidatos_inscritos"] . '","candidatos_preseleccionados":"' . $row["candidatos_preseleccionados"] . '","curriculums_ciegos":"' . $row["curriculums_ciegos"] . '","cantidad_total_ofertas":"' . $row['cantidad_total_ofertas'] . '"},';
  }
} else {
  echo "0 results";
}

$conn->close();

?>
