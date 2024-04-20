<?php

include '../../env.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// header('Access-Control-Allow-Origin: *');


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT puesto_trabajo, ubicacion, provincia, tipo_trabajo, sector, descripcion, estudios_minimos, experiencia_minima, jornada, turno, numero_vacantes, salario, fecha_cierre, estado FROM oferta WHERE referencia=" . $_GET['referencia'];


$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        echo '{"puesto_trabajo":"' . $row["puesto_trabajo"] . '","ubicacion":"' . $row["ubicacion"] . '","provincia":"' . $row["provincia"] . '","tipo_trabajo":"' . $row['tipo_trabajo'] . '","sector":"' . $row['sector'] . '","descripcion":"' . $row['descripcion'] . '","estudios_minimos":"' . $row['estudios_minimos'] . '","experiencia_minima":"' . $row['experiencia_minima'] . '","jornada":"' . $row['jornada'] . '","turno":"' . $row['turno'] . '","numero_vacantes":"' . $row['numero_vacantes'] . '","salario":"' . $row['salario'] . '","fecha_cierre":"' . $row['fecha_cierre'] . '","estado":"' . $row['estado'] . '"},';

    }

} else {
    echo "'0 resultados'";
}

$conn->close();

?>
