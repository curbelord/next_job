<?php

include '../../env.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// header('Access-Control-Allow-Origin: *');


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE oferta SET eliminada = true WHERE referencia=" . $_POST['referencia'];

$result = $conn->query($sql);

echo $result;

$conn->close();

?>
