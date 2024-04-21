<?php
  session_start();   // Necesitamos una sesion
  if(isset($SESSION['u_usuario'])){  // comparamos si existe
    header("Location: validacion.php"); // si existe, lo redireccionamos a sesion.php
  }
  else{
    session_destroy();  // si no existe, destruimos sesion
  }
?>﻿


<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="shortcut icon" href="imagenes/logouta.png">
  <script src="js/bootstrap.bundle.min.js"></script>

  <!-- My Styles -->

  <title>Compite</title>
</head>

<body>

<style>
  body{background-image: url(imagenes/background.jpg);
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size:cover;}
</style>

    <!--NAVBAR-->

  <nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="login.php">
      <img src="imagenes/Logo Compite.png" alt="" width="70" class="d-inline-block align-text-top">
      COMPITE
    </a></div>
  <br></nav>

    <!--LOGIN-->

    <body class="text-center">
    <center>
         <div class=" card shadow m-4 mt-5  bg-dark" 
         style="width: 70rem; --bs-bg-opacity: .9;" >
      
         <div class="row"><div class="col"><div class="card-body bg-light m-4 " style="width: 30rem;" >

        <img class="m-4 " src="imagenes/Logo Compite.png" alt="Foto ilustrativa del usuario" style="width: 50%;" >
        <h1 class="h3 mb-3 fw-normal">Ingrese el código de la encuesta</h1>
            
  <form class="form-signin" action="" method="POST">

                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputEmail" class="form-control mb-3" placeholder="Código" required autofocus name="nombres">
               
                <div id="remember" class="checkbox">
                    <!--
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                     -->
                </div>
                <button class="btn btn-lg btn-primary  btn-block mb-4" type="submit">Evaluar</button>
               
            </form><!-- /form --></div></div>
<div class="text-light col mr-5"> 

<h3 class="mt-5 fw-light">Sistema de evaluación</h3>
<h1>COMPITE</h1>

<hr class="bg-light">
<br>



</div>

        </div><!-- /card-container -->
    </div><!-- /container -->
</center>
</body>
<br> <br><br><br><br><br><br>
   
    

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
 
</body>
</html>

