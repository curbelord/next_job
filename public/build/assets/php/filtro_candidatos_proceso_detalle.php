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

$sql = "";


if ($_GET['curriculumsCiegos'] == "SI"){

    $sql = "SELECT users.id AS 'id_candidato', SUM(DATEDIFF(experiencia.fecha_fin, experiencia.fecha_inicio) / 365) AS 'experiencia_candidato' FROM users LEFT JOIN experiencia ON users.id = experiencia.id_cv INNER JOIN demandante ON users.id = demandante.id INNER JOIN inscripcion ON demandante.id = inscripcion.id_demandante INNER JOIN estado ON demandante.id = estado.id_demandante WHERE inscripcion.id_oferta=" . $_GET['referencia'] . " " . $_GET['filtro'] . " GROUP BY users.id LIMIT 10 OFFSET " . $_GET['numero_offset'];

    // Preseleccionados -> SELECT users.id AS 'id_candidato', SUM(DATEDIFF(experiencia.fecha_fin, experiencia.fecha_inicio) / 365) AS 'experiencia_candidato' FROM users LEFT JOIN experiencia ON users.id = experiencia.id_cv INNER JOIN demandante ON users.id = demandante.id INNER JOIN inscripcion ON demandante.id = inscripcion.id_demandante INNER JOIN estado ON demandante.id = estado.id_demandante WHERE inscripcion.id_oferta=1 AND inscripcion.id_oferta = estado.id_oferta AND estado.id_demandante IN (SELECT id_demandante FROM estado WHERE nombre = 'Preseleccionado') AND estado.id_demandante NOT IN (SELECT id_demandante FROM estado WHERE nombre = 'Descartado') GROUP BY users.id;

    // Descartados -> SELECT users.id AS 'id_candidato', SUM(DATEDIFF(experiencia.fecha_fin, experiencia.fecha_inicio) / 365) AS 'experiencia_candidato' FROM users LEFT JOIN experiencia ON users.id = experiencia.id_cv INNER JOIN demandante ON users.id = demandante.id INNER JOIN inscripcion ON demandante.id = inscripcion.id_demandante INNER JOIN estado ON demandante.id = estado.id_demandante WHERE inscripcion.id_oferta=1 AND inscripcion.id_oferta = estado.id_oferta AND estado.id_demandante IN (SELECT id_demandante FROM estado WHERE nombre = 'Descartado') AND estado.id_demandante NOT IN (SELECT id_demandante FROM estado WHERE nombre = 'Preseleccionado') GROUP BY users.id;

}else{

    $sql = "SELECT users.id AS 'id_candidato', CONCAT(users.nombre, ' ', users.apellidos) AS 'nombre_candidato', YEAR(CURDATE()) - YEAR(users.fecha_nacimiento) - (RIGHT(CURDATE(), 5) < RIGHT(users.fecha_nacimiento, 5)) AS 'edad_candidato' FROM users INNER JOIN demandante ON users.id = demandante.id LEFT JOIN inscripcion ON demandante.id = inscripcion.id_demandante INNER JOIN estado ON demandante.id = estado.id_demandante WHERE inscripcion.id_oferta=" . $_GET['referencia'] . " " . $_GET['filtro'] . " GROUP BY users.id LIMIT 10 OFFSET " . $_GET['numero_offset'];

    // Preseleccionados -> AND inscripcion.id_oferta = estado.id_oferta AND estado.id_demandante IN (SELECT id_demandante FROM estado WHERE nombre = 'Preseleccionado') AND estado.id_demandante NOT IN (SELECT id_demandante FROM estado WHERE nombre = 'Descartado') GROUP BY users.id LIMIT 10 OFFSET

    // Descartados -> AND inscripcion.id_oferta = estado.id_oferta AND estado.id_demandante IN (SELECT id_demandante FROM estado WHERE nombre = 'Descartado') AND estado.id_demandante NOT IN (SELECT id_demandante FROM estado WHERE nombre = 'Preseleccionado') GROUP BY users.id LIMIT 10 OFFSET ;

}


$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    if ($_GET['curriculumsCiegos'] == "SI"){
        echo '{"id_candidato":"' . $row['id_candidato'] . '","edad_o_experiencia_candidato":"' . $row['experiencia_candidato'] . '"},';
    }else{
        echo '{"id_candidato":"' . $row['id_candidato'] . '","nombre_o_id_candidato":"' . $row['nombre_candidato'] . '","edad_o_experiencia_candidato":"' . $row['edad_candidato'] . '"},';
    }
  }
} else {
    echo "'0 candidatos' ";
}

$conn->close();

?>
