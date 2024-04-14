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


$sql = "SELECT oferta.puesto_trabajo, oferta.ubicacion, oferta.created_at, CASE WHEN inscritos.candidatos_inscritos IS NULL THEN 0 ELSE inscritos.candidatos_inscritos END AS candidatos_inscritos, candidatos_preseleccionados, candidatos_descartados FROM users INNER JOIN oferta ON users.id = oferta.id_seleccionador
LEFT OUTER JOIN (SELECT id_oferta, COUNT(id_demandante) AS candidatos_inscritos FROM inscripcion GROUP BY id_oferta) AS inscritos ON oferta.referencia = inscritos.id_oferta LEFT OUTER JOIN candidatos_preseleccionados ON oferta.referencia = candidatos_preseleccionados.id_oferta LEFT OUTER JOIN candidatos_descartados ON oferta.referencia = candidatos_descartados.id_oferta WHERE oferta.id_seleccionador=" . $_GET['id_seleccionador'] . " ORDER BY created_at DESC LIMIT 5";


$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo '{"puesto_trabajo":"' . $row["puesto_trabajo"] . '","ubicacion":"' . $row["ubicacion"]. '","fecha_publicacion":"' . date('d/m/Y', strtotime($row["created_at"])) . '","candidatos_inscritos":"' . $row["candidatos_inscritos"] . '","candidatos_preseleccionados":"' . $row["candidatos_preseleccionados"] . '","candidatos_descartados":"' . $row['candidatos_descartados'] . '"},';
  }
} else {
  echo "'0 resultados'";
}

$conn->close();

?>
