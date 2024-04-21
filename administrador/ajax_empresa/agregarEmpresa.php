<?php


    include("../../conexion.php");

    // Obtener valores de empresa
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $query = "INSERT INTO empresa(nombre, descripcion, fecha_alta)
    VALUES('$nombre', '$descripcion', NOW()) ";

   $resultado = $con ->query($query);

   if(!$resultado){
       echo "<script>alert('Error, no se ha podido registrar la empresa');
           window.location='../empresas.php'</script>";
   }else{
       echo "<script>alert('Se ha registrado correctamente la empresa');
           window.location='../empresas.php'</script>";
   }


