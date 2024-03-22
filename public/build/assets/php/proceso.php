<?php

header('Access-Control-Allow-Origin: *');

$servername = "http://www.next-job.lan/";
$username = "laravel";
$password = "password";
$dbname = "next_job";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT puesto_trabajo, ubicacion, created_at FROM Oferta";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo '{"puesto_trabajo":' . $row["puesto_trabajo"]. '","ubicacion":"' . $row["ubicacion"]. '","created_at":"' . $row["created_at"]. '"}';
  }
} else {
  echo "0 results";
}

$conn->close();

?>
