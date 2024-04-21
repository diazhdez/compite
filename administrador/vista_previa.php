<?php

  	require "../conexion.php";

  	$id_encuesta = $_GET['id_encuesta'];
 	$query2 = "SELECT * FROM preguntas WHERE id_encuesta = '$id_encuesta'";
  	$respuesta2 = $con->query($query2);

  	$query3 = "SELECT encuestas.titulo, encuestas.descripcion, preguntas.id_pregunta, preguntas.id_encuesta, preguntas.id_tipo_pregunta 
		FROM preguntas
		INNER JOIN encuestas
		ON preguntas.id_encuesta = encuestas.id_encuesta
		WHERE preguntas.id_encuesta = '$id_encuesta'";
	$respuesta3 = $con->query($query3);
	$row3 = $respuesta3->fetch_assoc();


 ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Favicon - FIS -->
  <link rel="shortcut icon" href="../imagenes/logouta.png">


  <title>Sistema de encuestas</title>
</head>
<body>


	
<?php

  	require "../conexion.php";

  	$id_encuesta = $_GET['id_encuesta'];
 	$query2 = "SELECT * FROM preguntas WHERE id_encuesta = '$id_encuesta'";
  	$respuesta2 = $con->query($query2);

  	$query3 = "SELECT encuestas.titulo, encuestas.descripcion, preguntas.id_pregunta, preguntas.id_encuesta, preguntas.id_tipo_pregunta 
		FROM preguntas
		INNER JOIN encuestas
		ON preguntas.id_encuesta = encuestas.id_encuesta
		WHERE preguntas.id_encuesta = '$id_encuesta'";
	$respuesta3 = $con->query($query3);
	$row3 = $respuesta3->fetch_assoc();

	

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Favicon - FIS -->
  <link rel="shortcut icon" href="../imagenes/logouta.png">


  <title>Sistema de encuestas</title>
</head>
<body>

<?php include "navbar.php";

$total_client1 = mysqli_num_rows($respuesta2); if($total_client1>0){ ?>
    
  	<div class="container">		

 	<div class=" card text-center"><div class="card-header">
 		<h1><?php echo $row3['titulo'] ?>  <i class="fas fa-thumbtack float-end"></i></h1>
		 <h4 class="text-muted text-center">Vista previa</h4>

 		<form action="procesar.php" method="Post" autocomplete="off">
 		<input type="hidden" id="id_encuesta" name="id_encuesta" value="<?php echo $id_encuesta ?>" />
</div><div class="card-body">
 		<br>
		 <p class="fs-4"><?php echo $row3['descripcion'] ?></p>
		 <hr class="m-4">
 		<?php

 			$i = 1;  $total_client = mysqli_num_rows($respuesta3); if($total_client>0){ 
			while (($row2 = $respuesta2->fetch_assoc())) {

			$id = $row2['id_pregunta'];

			$query = "SELECT preguntas.id_pregunta, preguntas.titulo, preguntas.id_tipo_pregunta, opciones.id_opcion, opciones.valor
				FROM opciones
				INNER JOIN preguntas
				ON preguntas.id_pregunta = opciones.id_pregunta
                WHERE preguntas.id_pregunta = $id
				ORDER BY opciones.id_pregunta, opciones.id_opcion";

			$respuesta = $con->query($query);

		 ?>
		 	<div class="container col-md-12 ">
			<h5 ><?php echo "$i.- " . $row2['titulo'] ?></h5>
			<br>
		
			<div class="row align-text-center">
		<?php 	while (($row = $respuesta->fetch_assoc())) { ?>
	
  <div class="col">
			<div class="radio">
		      <label><input class="form-check-input" type="radio" name="<?php echo $row['id_pregunta'] ?>" value="<?php echo $row['id_opcion'] ?>" required> <?php echo $row['valor'] ?></label>
		    </div>
			<hr style="border: dotted 1px; opacity: 0.2" />
			</div>

		
		<?php 	
			}
			$i++;
		}}}else{echo "
			
			<div class='container'>		

			<div class=' card text-center'><div class='card-header'>
				<h1>	No hay encuestas disponibles para mostrar <i class='fas fa-thumbtack float-end'></i></h1>
	
	   
			</div></div>
		";}
		 ?>
		 </div>	</div>
		<br>
		
		
		</form>	</div></div>
		<br>
	 <div class="d-grid gap-2 col-4 mx-auto  mb-2">
	 <a href="index.php" class="btn btn-primary ">Regresar</a>
	
	</div> 
	


    
  	<!-- Optional JavaScript -->
  	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
  	<script src="../js/jquery-3.3.1.min.js"></script>
  	<script src="../js/popper.min.js"></script>
  	<script src="../js/bootstrap.min.js"></script>
</body>
</html>