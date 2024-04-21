<?php
 
    include("../../conexion.php");

    $id_usuario=$_REQUEST['id_usuario'];

   
  

    $query = "DELETE FROM usuarios WHERE id_usuario='$id_usuario'";
    $resultado = $con ->query($query);

    if(!$resultado){
        echo "<script>alert('Error, no se ha podido eliminar');
            window.location='../empleados.php'</script>";
    }else{
        echo "<script>alert('Se eliminaron los datos correctamente');
            window.location='../empleados.php'</script>";
    }


?>