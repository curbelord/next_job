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

// PENDIENTE OBTENER -> estilo_container_candidato', 'estilo_curriculum_visible', 'url_curriculum', 'url_nota', 'url_ojo', 'nombre_o_id_candidato', 'edad_o_experiencia_candidato'

$sql = "SELECT (SELECT COUNT(*) FROM candidatos_preseleccionados WHERE candidatos_preseleccionados.id_oferta = oferta.referencia) AS 'candidatos_preseleccionados', (SELECT COUNT(*) FROM candidatos_descartados WHERE candidatos_descartados.id_oferta = oferta.referencia) AS 'candidatos_descartados' FROM oferta WHERE oferta.referencia=" . $_GET['referencia'];

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo '{"candidatos_preseleccionados":"' . $row["candidatos_preseleccionados"] . '","candidatos_descartados":"' . $row["candidatos_descartados"] . '"},';
  }
} else {
  echo "0 results";
}

$conn->close();

?>
