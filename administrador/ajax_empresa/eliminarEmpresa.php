<?php
 
    include("../../conexion.php");

    $id_empresa=$_REQUEST['id_empresa'];

   
  

    $query = "DELETE FROM empresa WHERE id_empresa='$id_empresa'";
    $resultado = $con ->query($query);

    if(!$resultado){
        echo "<script>alert('Error, no se ha podido eliminar');
            window.location='../empresas.php'</script>";
    }else{
        echo "<script>alert('Se eliminaron los datos correctamente');
            window.location='../empresas.php'</script>";
    }


?>