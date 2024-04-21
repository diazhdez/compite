<!DOCTYPE html>
<html lang="es">
<head>
  	<!-- Required meta tags -->
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  	<!-- Bootstrap CSS -->
  	<link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Favicon - FIS -->
    <link rel="shortcut icon" href="../imagenes/logo compite.png">

  	<title>Compite</title>
    <script type="text/javascript" language="javascript">   
      history.pushState(null, null, location.href);
      window.onpopstate = function () {
        history.go(1);
      };
    </script>

</head>
<body>


<?php include "navbar.php"?>

	<!-- Content Section -->
	<div class="container" style="margin-top: 30px;">
	    <div class="row">
	        <div class="col-md-12 row">
	        	<div class="col-md-12 col-xs-12">
	        		<h3>COMPETENCIAS DISPONIBLES</h3>
	        	</div>
	        </div>
	    </div>
	    <hr/>
	    <div class="row">
	        <div class="col-md-12">
	         <h4>Competencias:</h4>
	         <div class="table-responsive">
	            <div id="#"></div>
	         </div>
	        </div>
	    </div>
	</div>
	<!-- /Content Section -->

	<?php 

date_default_timezone_set("America/Lima");
$date = new DateTime();

$fecha_inicio = $date->format('Y-m-d H:i:s');
include ("../conexion.php");

$data = "";

if (isset($_GET['code'])) {
  $code = $_GET['code'];

  $query = "SELECT * FROM usuarios 
			INNER JOIN encuestas ON usuarios.id_usuario = encuestas.id_usuario 
			WHERE usuarios.Code = '$code' AND encuestas.estado = 'Activa'";

  $resultado = $con->query($query);

  if ($resultado->num_rows == 0) {
	  $data .= "No se ha proporcionado el código para buscar encuestas.";
  } else {
	  while ($row = $resultado->fetch_assoc()) {
		  $data .= '
			  <div class="card shadow m-4">
				  <div class="card-header bg-dark text-light">
					  <div class="row">
						  <div class="col-8">
							  <p class="fw-bold text-light fs-3">' . $row['titulo'] . '</p>
						  </div>
						  <div class="col">
							  <button class="btn" data-bs-toggle="modal" data-bs-target="#modal_modificar" title="Modificar Empresa">
								  L<i class="fas fa-marker fa-2xl p-4"></i>
							  </button>
						  </div>
						  <div class="col">
							  <a class="btn btn-warning fw-bold" href="responder.php?id_encuesta=' . $row['id_encuesta'] . '">RESPONDER</a>
						  </div>
					  </div>
				  </div>
				  <div class="card-body">
					  <blockquote class="blockquote mb-0">
						  <p class="mx-2">' . $row["descripcion"] . '</p>
						  <footer class="text-muted fs-6 mx-2 mt-2">' . $row["fecha_final"] . '</footer>
					  </blockquote>
				  </div>
			  </div>
		  ';
	  }
  }
} else {
  $data .= "No hay encuestas disponibles hasta el momento.";
}

echo $data;
?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="js/encuestas.js"></script>
 
</body>
</html>