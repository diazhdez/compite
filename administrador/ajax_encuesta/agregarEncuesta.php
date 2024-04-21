<?php

if (isset($_POST['id_usuario']) && isset($_POST['titulo']) && isset($_POST['descripcion'])&& isset($_POST['resultado_esperado']) && isset($_POST['fecha_final'])) {
    // Incluir archivo de conexión a base de datos
    include("../../conexion.php");

    // Establecemos la zona horario
    date_default_timezone_set("America/Lima");
  	$date = new DateTime();
  	$fecha_inicio = $date->format('Y-m-d H:i:s');

    // Obtener valores
    $id_usuario  = $_POST['id_usuario'];
    $titulo      = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $resultado_esperado = $_POST['resultado_esperado'];
    $fecha_final = $_POST['fecha_final'];

    $query = "INSERT INTO encuestas (id_usuario, titulo, descripcion, resultado_esperado, estado, fecha_inicio, fecha_final)
              VALUES ('$id_usuario', '$titulo', '$descripcion', '$resultado_esperado','En espera', '$fecha_inicio', '$fecha_final')";

    $resultado = $con->query($query);

}
