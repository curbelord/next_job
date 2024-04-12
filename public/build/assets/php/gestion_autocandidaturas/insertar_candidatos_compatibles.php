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


$sql = "INSERT INTO inscripcion (id_demandante, id_oferta, anotacion, created_at, updated_at) VALUES " . $_POST['datos_candidatos'];


$result = $conn->query($sql);

echo $result;

$conn->close();

?>
