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


// if ($_GET['curriculumsCiegos'] == "SI"){
//     $sql = "SELECT oferta.descripcion AS 'descripcion_oferta', users.id AS 'id_candidato', oferta.created_at AS 'oferta_fecha_publicacion', oferta.salario AS 'oferta_salario', oferta.jornada AS 'oferta_jornada', oferta.turno AS 'oferta_turno', (SELECT COUNT(*) FROM candidatos_preseleccionados WHERE candidatos_preseleccionados.id_oferta = oferta.referencia) AS 'candidatos_preseleccionados', (SELECT COUNT(*) FROM candidatos_descartados WHERE candidatos_descartados.id_oferta = oferta.referencia) AS 'candidatos_descartados', SUM(DATEDIFF(experiencia.fecha_fin, experiencia.fecha_inicio) / 365) AS 'experiencia_candidato' FROM oferta INNER JOIN inscripcion ON oferta.referencia = inscripcion.id_oferta INNER JOIN users ON users.id = inscripcion.id_demandante LEFT JOIN experiencia ON users.id = experiencia.id_cv WHERE oferta.referencia=" . $_GET['referencia'] . " GROUP BY users.id";
// }else{

//     $sql = "SELECT oferta.descripcion AS 'descripcion_oferta', users.id AS 'id_candidato', oferta.created_at AS 'oferta_fecha_publicacion', oferta.salario AS 'oferta_salario', oferta.jornada AS 'oferta_jornada', oferta.turno AS 'oferta_turno', (SELECT COUNT(*) FROM candidatos_preseleccionados WHERE candidatos_preseleccionados.id_oferta = oferta.referencia) AS 'candidatos_preseleccionados', (SELECT COUNT(*) FROM candidatos_descartados WHERE candidatos_descartados.id_oferta = oferta.referencia) AS 'candidatos_descartados', users.nombre AS 'nombre_candidato', YEAR(CURDATE()) - YEAR(users.fecha_nacimiento) - (RIGHT(CURDATE(), 5) < RIGHT(users.fecha_nacimiento, 5)) AS 'edad_candidato' FROM oferta, users, inscripcion WHERE oferta.referencia = inscripcion.id_oferta AND users.id = inscripcion.id_demandante AND oferta.referencia=" . $_GET['referencia'];
// }



if ($_GET['curriculumsCiegos'] == "SI"){

    $sql = "SELECT users.id AS 'id_candidato', SUM(DATEDIFF(experiencia.fecha_fin, experiencia.fecha_inicio) / 365) AS 'experiencia_candidato' FROM users LEFT JOIN experiencia ON users.id = experiencia.id_cv INNER JOIN demandante ON users.id = demandante.id INNER JOIN inscripcion ON demandante.id = inscripcion.id_demandante WHERE inscripcion.id_oferta=" . $_GET['referencia'] . " GROUP BY users.id";

}else{

    $sql = "SELECT users.id AS 'id_candidato', users.nombre AS 'nombre_candidato', YEAR(CURDATE()) - YEAR(users.fecha_nacimiento) - (RIGHT(CURDATE(), 5) < RIGHT(users.fecha_nacimiento, 5)) AS 'edad_candidato' FROM users INNER JOIN demandante ON users.id = demandante.id LEFT JOIN inscripcion ON demandante.id = inscripcion.id_demandante WHERE inscripcion.id_oferta=" . $_GET['referencia'];

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
    echo "'0 candidatos'";
}

$conn->close();

?>
