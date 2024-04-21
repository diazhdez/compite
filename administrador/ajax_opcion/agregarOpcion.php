<?php


    include("../../conexion.php");

    // Obtener valores
    $id_pregunta     = $_POST['id_pregunta'];
    $valor 			 = $_POST['valor'];
    $puntaje 	     = $_POST['puntaje'];

    $query = "INSERT INTO opciones (id_pregunta, valor, puntaje)
              VALUES ('$id_pregunta', '$valor', '$puntaje')";

    $resultado = $con->query($query);

?>
