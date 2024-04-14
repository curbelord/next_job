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

$sql = "SELECT oferta.referencia, oferta.puesto_trabajo, oferta.descripcion, oferta.salario, oferta.jornada, oferta.turno, oferta.estado AS 'estado', oferta.ubicacion, oferta.created_at, COUNT(inscripcion.id_demandante) AS 'candidatos_inscritos', candidatos_preseleccionados AS 'candidatos_preseleccionados', candidatos_descartados AS 'candidatos_descartados', curriculums_ciegos, palabras_clave FROM oferta LEFT JOIN inscripcion ON oferta.referencia = inscripcion.id_oferta LEFT JOIN candidatos_preseleccionados ON oferta.referencia = candidatos_preseleccionados.id_oferta LEFT JOIN candidatos_descartados ON candidatos_preseleccionados.id_oferta = candidatos_descartados.id_oferta WHERE oferta.id_seleccionador=" . $_GET['id_seleccionador'] . " AND oferta.estado='Autocandidatura' GROUP BY oferta.referencia, oferta.puesto_trabajo, oferta.ubicacion, oferta.created_at, candidatos_preseleccionados, curriculums_ciegos";


$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo '{"referencia":"' . $row["referencia"] . '","puesto_trabajo":"' . $row["puesto_trabajo"] . '","descripcion":"' . $row['descripcion'] . '","salario":"' . $row['salario'] . '","jornada":"' . $row['jornada'] . '","turno":"' . $row['turno'] . '","estado":"' . $row['estado'] . '","ubicacion":"' . $row["ubicacion"]. '","fecha_creacion":"' . date('d/m/Y', strtotime($row["created_at"])) . '","candidatos_inscritos":"' . $row["candidatos_inscritos"] . '","candidatos_preseleccionados":"' . $row["candidatos_preseleccionados"] . '","candidatos_descartados":"' . $row['candidatos_descartados'] . '","curriculums_ciegos":"' . $row["curriculums_ciegos"] . '","palabras_clave":"' . $row['palabras_clave'] . '"},';
  }
} else {
  echo "'0 resultados'";
}

$conn->close();

?>
