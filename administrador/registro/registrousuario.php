<?php
    include("../../conexion.php");

    // Obtener valores de empresa
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $clave = $_POST['clave'];
    $id_empresa = $_POST['id_empresa'];

    // Consultar la base de datos para obtener el último id_usuario
    $query_max_id = "SELECT MAX(id_usuario) AS max_id FROM usuarios";
    $resultado_max_id = $con->query($query_max_id);
    $row_max_id = $resultado_max_id->fetch_assoc();
    $ultimo_id_usuario = $row_max_id['max_id'];
 
    // Incrementar el último valor utilizado para el siguiente registro
    $nuevo_id_usuario = $ultimo_id_usuario + 1;

    $query = "INSERT INTO usuarios (id_usuario, nombres, apellidos, email, clave, foto_perfil, id_empresa, id_tipo_usuario)
              VALUES ('$nuevo_id_usuario','$nombres', '$apellidos', '$email', '$clave', 'login.png', '$id_empresa', 2)";

    $resultado = $con->query($query);

    if (!$resultado) {
        echo "<script>alert('Error, no se ha podido registrar al empleado');
           window.location='../empleados.php'</script>";
    } else {
        echo "<script>alert('Se ha registrado correctamente al empleado');
           window.location='../empleados.php'</script>";
    }
?>
