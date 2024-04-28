<?php

include 'env.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// header('Access-Control-Allow-Origin: *');


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT users.id AS 'id', users.nombre, users.fecha_nacimiento, users.direccion AS 'direccion_postal', users.telefono, users.email, estado.nombre AS 'nombre_estado', estado.created_at AS 'fecha_estado', estudios.nombre AS 'nombre_formacion', estudios.centro_estudios AS 'centro_formacion', estudios.fecha_inicio AS 'fecha_inicio_formacion', estudios.fecha_fin AS 'fecha_fin_formacion', experiencia.nombre AS 'nombre_experiencia', experiencia.centro_laboral AS 'empresa_experiencia', experiencia.descripcion AS 'descripcion_experiencia', experiencia.fecha_inicio AS 'fecha_inicio_experiencia', experiencia.fecha_fin AS 'fecha_fin_experiencia' FROM users INNER JOIN demandante ON users.id = demandante.id LEFT JOIN cv ON demandante.id = cv.id_demandante LEFT JOIN estudios ON cv.id = estudios.id_cv LEFT JOIN experiencia ON cv.id = experiencia.id_cv LEFT JOIN inscripcion ON inscripcion.id_demandante = demandante.id LEFT JOIN estado ON inscripcion.id_demandante = estado.id_demandante WHERE users.id=" . $_GET['id_demandante'] . " AND inscripcion.id_oferta=" . $_GET['referencia'] . " AND estado.created_at = (SELECT max(created_at) FROM estado WHERE estado.id_demandante=" . $_GET['id_demandante'] . " AND estado.id_oferta=" . $_GET['referencia'] . " AND estado.nombre != 'CV leído')";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo '{"id":"' . $row['id'] . '","nombre":"' . $row['nombre'] . '","fecha_nacimiento":"' . $row['fecha_nacimiento'] . '","direccion_postal":"' . $row['direccion_postal'] . '","telefono":"' . $row['telefono'] . '","email":"' . $row['email'] . '","nombre_estado":"' . $row['nombre_estado'] . '","fecha_estado":"' . $row['fecha_estado'] . '","nombre_formacion":"' . $row['nombre_formacion'] . '","centro_formacion":"' . $row['centro_formacion'] . '","fecha_inicio_formacion":"' . $row['fecha_inicio_formacion'] . '","fecha_fin_formacion":"' . $row['fecha_fin_formacion'] . '","nombre_experiencia":"' . $row['nombre_experiencia'] . '","empresa_experiencia":"' . $row['empresa_experiencia'] . '","descripcion_experiencia":"' . $row['descripcion_experiencia'] . '","fecha_inicio_experiencia":"' . $row['fecha_inicio_experiencia'] . '","fecha_fin_experiencia":"' . $row['fecha_fin_experiencia'] . '"},';
  }

} else {
  echo "'0 resultados'";
}

$conn->close();

?>
