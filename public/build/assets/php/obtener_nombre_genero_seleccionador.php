<?php

include 'env.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// header('Access-Control-Allow-Origin: *');


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT users.nombre AS 'nombre_seleccionador', users.genero FROM users WHERE users.id=" . $_GET['id_seleccionador'] . "";


$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo '{"nombre_seleccionador":"' . $row["nombre_seleccionador"] . '","genero_seleccionador":"' . $row["genero"] . '"},';
  }
} else {
  echo "'0 resultados'";
}

$conn->close();

?>
