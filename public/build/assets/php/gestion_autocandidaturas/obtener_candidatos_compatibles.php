<?php

include '../env.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// header('Access-Control-Allow-Origin: *');


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "";


if ($_GET['curriculumsCiegos'] == "SI"){

    $sql = "SELECT users.id AS 'id_candidato', SUM(DATEDIFF(experiencia.fecha_fin, experiencia.fecha_inicio) / 365) AS 'experiencia_candidato' FROM users INNER JOIN demandante ON users.id = demandante.id LEFT JOIN cv ON demandante.id = cv.id_demandante LEFT JOIN experiencia ON cv.id = experiencia.id_cv WHERE (experiencia.nombre " . $_GET['palabras_clave'] . ") AND users.id NOT IN (SELECT id_demandante FROM inscripcion WHERE id_oferta=" . $_GET['referencia'] . ") GROUP BY users.id ORDER BY demandante.checkin DESC LIMIT 10";

}else{

    $sql = "SELECT users.id AS 'id_candidato', CONCAT(users.nombre, ' ', users.apellidos) AS 'nombre_candidato', YEAR(CURDATE()) - YEAR(users.fecha_nacimiento) - (RIGHT(CURDATE(), 5) < RIGHT(users.fecha_nacimiento, 5)) AS 'edad_candidato' FROM users INNER JOIN demandante ON users.id = demandante.id LEFT JOIN cv ON demandante.id = cv.id_demandante LEFT JOIN estudios ON cv.id = estudios.id_cv LEFT JOIN experiencia ON cv.id = experiencia.id_cv WHERE (experiencia.nombre " . $_GET['palabras_clave'] . ") AND users.id NOT IN (SELECT id_demandante FROM inscripcion WHERE id_oferta=" . $_GET['referencia'] . ") ORDER BY demandante.checkin DESC LIMIT 10";

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
