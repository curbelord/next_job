<?php

include 'env.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// header('Access-Control-Allow-Origin: *');


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE oferta SET estado='" . $_POST['estado'] . "' WHERE referencia=" . $_POST['referencia'];

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo '{"estado":"' . $row["estado"] . '"}';
  }
} else {
  echo "0 results";
}

$conn->close();

?>
