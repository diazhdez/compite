<?php 

  date_default_timezone_set("America/Lima");
  $date = new DateTime();

  $fecha_inicio = $date->format('Y-m-d H:i:s');
  
 ?>


<!DOCTYPE html>
<html lang="es">
<head>
  	<!-- Required meta tags -->
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  	<!-- Bootstrap CSS -->
  	<link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Favicon - FIS -->
    <link rel="shortcut icon" href="imagenes/logouta.png">

  	<title>ADMIN-CLIMCOMPANY</title>

    <script type="text/javascript" language="javascript">   
      history.pushState(null, null, location.href);
      window.onpopstate = function () {
        history.go(1);
      };
    </script>

</head>
<?php include "navbar.php"?>
<body>
<div class="container">

<br><br>

<div class="row"> <div class="col-sm-6">
 <!--card--> <div class="card">
  <h5 class="card-header bg-secondary text-white">Empresas</h5>
  <div class="card-body">
    <h5 class="card-title">Empresas añadidas recientemente</h5>
    <p class="card-text">Consulta todas las empresas que tienen competencias asociadas.</p>
    <a href="administrador/empresas.php" class="btn btn-primary">Entrar</a>
  </div></div> </div><!--end card-->





    </body>
    </html>