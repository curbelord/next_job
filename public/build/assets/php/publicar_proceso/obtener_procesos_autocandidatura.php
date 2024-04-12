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


$sql = "SELECT referencia FROM oferta WHERE id_seleccionador=" . $_GET['id_seleccionador'] . " AND estado='Autocandidatura'";


$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        echo '{"referencia":"' . $row["referencia"] . '"},';

    }

} else {
    echo "'0 resultados'";
}

$conn->close();

?>
