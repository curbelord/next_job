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

// VIEJA CONSULTA: SELECT referencia, puesto_trabajo, ubicacion, created_at FROM Oferta

// SELECT referencia, puesto_trabajo, ubicacion, Oferta.created_at, COUNT(id_demandante) AS 'candidatos_inscritos' FROM Oferta, Inscripcion WHERE Oferta.referencia = Inscripcion.id_oferta GROUP BY referencia;

$sql = "SELECT referencia, puesto_trabajo, ubicacion, Oferta.created_at, COUNT(id_demandante) AS 'candidatos_inscritos' FROM Oferta, Inscripcion WHERE Oferta.referencia = Inscripcion.id_oferta GROUP BY referencia";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo '{"referencia":"' . $row["referencia"] . '","puesto_trabajo":"' . $row["puesto_trabajo"] . '","ubicacion":"' . $row["ubicacion"]. '","fecha_creacion":"' . date('d/m/Y', strtotime($row["created_at"])) . '","candidatos_inscritos":"' . $row["candidatos_inscritos"] . '"},';
  }
} else {
  echo "0 results";
}

$conn->close();

?>
