<?php 	

session_start();

$id_usuario = $_POST['id_usuario'];
echo $id_usuario;
$nombres = $_POST['nombres'];
echo $id_usuario;
$clave 	= $_POST['clave'];
echo $clave;
include("conexion.php");

$query = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario' OR nombres='$nombres' AND clave = '$clave'";
	

	$resultado = $con->query($query);

	
	if ($row = $resultado->fetch_assoc()) {


		if ($row['id_tipo_usuario'] == '1') {
			$_SESSION['id_usuario'] = $row['id_usuario'];
			$_SESSION['u_usuario'] = $row['nombres'];
			header("Location: administrador/principal.php");
		} else {
			$_SESSION['id_usuario'] = $row['id_usuario'];
			$_SESSION['u_usuario'] = $row['nombres'];
			header("Location: usuario/principal.php");
		}

	} else {
		header("Location: index.php");
	}

	if (!$query) {
	    printf("Error: %s\n", mysqli_error($conn));
	    exit();
	}
	

 ?>