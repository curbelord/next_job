<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$fecha_actual = date('Y-m-d H:i:s');

// header('Access-Control-Allow-Origin: *');

$servername = "localhost";
$username = "laravel";
$password = "password";
$dbname = "next_job";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO estado (nombre, descripcion, id_demandante, id_oferta, created_at, updated_at) VALUES('" . $_POST['nombre'] . "','" . $_POST['descripcion'] . "'," . $_POST['id_demandante'] . "," . $_POST['id_oferta'] . ",'" . $fecha_actual . "','" . $fecha_actual . "')";

if ($conn->query($sql) === TRUE) {
    echo "Estado añadido correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error . "<br>" . $date;
}

$conn->close();

?>