<?php

include("../../conexion.php");

$id_empresa=$_REQUEST['id_empresa'];

   
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Modificar empresa
    $query = " UPDATE empresa SET
        nombre  = '$nombre', descripcion = '$descripcion' 
        WHERE id_empresa   = '$id_empresa'";

$resultado = $conexion ->query($query);

if(!$resultado){
    echo "<script>alert('Error, no se ha podido eliminar');
        window.location='../empresas.php'</script>";
}else{
    echo "<script>alert('Se eliminaron los datos correctamente');
        window.location='../empresas.php'</script>";
}


?>