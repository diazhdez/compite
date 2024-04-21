<?php

if (isset($_POST['id_encuesta']) && isset($_POST['titulo']) && isset($_POST['id_tipo_pregunta'])) {
    // Incluir archivo de conexión a base de datos
    include("../../conexion.php");

    // Obtener valores
    $id_encuesta 		= $_POST['id_encuesta'];
    $titulo     		= $_POST['titulo'];
    $id_tipo_pregunta 	= $_POST['id_tipo_pregunta'];

    $query = "INSERT INTO preguntas (id_encuesta, titulo, id_tipo_pregunta)
              VALUES ('$id_encuesta', '$titulo', '$id_tipo_pregunta')";

//agregar las 5 opciones al apar que creamos la pregunta.
    $query2="INSERT INTO opciones (id_opcion, id_pregunta, valor, puntaje) VALUES
    (NULL, (SELECT id_pregunta FROM preguntas WHERE id_pregunta=(SELECT MAX(id_pregunta)FROM preguntas)),'Totalmente de acuerdo', '5'),
    (NULL, (SELECT id_pregunta FROM preguntas WHERE id_pregunta=(SELECT MAX(id_pregunta)FROM preguntas)),'Mayormente de acuerdo', '4'),
    (NULL, (SELECT id_pregunta FROM preguntas WHERE id_pregunta=(SELECT MAX(id_pregunta)FROM preguntas)),'Indiferente', '3'),
    (NULL, (SELECT id_pregunta FROM preguntas WHERE id_pregunta=(SELECT MAX(id_pregunta)FROM preguntas)),'Pocas veces de acuerdo', '2'),
    (NULL, (SELECT id_pregunta FROM preguntas WHERE id_pregunta=(SELECT MAX(id_pregunta)FROM preguntas)),'Totalmente en desacuerdo', '1')";    


    $resultado = $con->query($query);
    $resultado2 = $con->query($query2);


}
