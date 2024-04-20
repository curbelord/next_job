<?php

include 'env.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// header('Access-Control-Allow-Origin: *');


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT oferta.descripcion AS 'descripcion_oferta', oferta.created_at AS 'oferta_fecha_publicacion', oferta.salario AS 'oferta_salario', oferta.jornada AS 'oferta_jornada', oferta.turno AS 'oferta_turno', (SELECT COUNT(*) FROM candidatos_preseleccionados WHERE candidatos_preseleccionados.id_oferta = oferta.referencia) AS 'candidatos_preseleccionados', (SELECT COUNT(*) FROM candidatos_descartados WHERE candidatos_descartados.id_oferta = oferta.referencia) AS 'candidatos_descartados' FROM oferta WHERE oferta.referencia=" . $_GET['referencia'];


$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        echo '{"candidatos_preseleccionados":"' . $row["candidatos_preseleccionados"] . '","candidatos_descartados":"' . $row["candidatos_descartados"] . '","oferta_fecha_publicacion":"' . $row['oferta_fecha_publicacion'] . '","oferta_salario":"' . $row['oferta_salario'] . '","oferta_jornada":"' . $row['oferta_jornada'] . '","oferta_turno":"' . $row['oferta_turno'] . '","descripcion_oferta":"' . $row['descripcion_oferta'] . '"},';

    }

} else {
    echo "'0 results'";
}

$conn->close();

?>
