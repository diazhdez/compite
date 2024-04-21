<?php
// Validar consulta
if (isset($_POST['id_encuesta']) && isset($_POST['id_encuesta']) != "") {
    // Incluir archivo de conexión a base de datos
    include("../../conexion.php");

    // Obtener id_encuesta
    $id_encuesta = $_POST['id_encuesta'];

    // Eliminar encuesta
    $query = "UPDATE encuestas SET estado = 'Activa' WHERE id_encuesta = '$id_encuesta'";
    $resultado = $con->query($query);

}
?>