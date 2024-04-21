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
  <link rel="shortcut icon" href="imagenes/logo compite.png">
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


<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="index.php">
      <img src="imagenes/Logo Compite.png" alt="" width="70" class="d-inline-block align-text-top">
      COMPITE
    </a></div>
  <br></nav>


    <!--LOGIN-->

    <body class="text-center">
    <center>
         <div class=" card shadow m-4 mt-5 align-items-center bg-dark" 
         style="width: 70rem; --bs-bg-opacity: .9;" >
      
         <div class="row"><div class="col"><div class="card-body bg-light m-4 " style="width: 30rem;" >

        <img class="m-4 " src="imagenes/Logo Compite.png" alt="Foto ilustrativa del usuario" style="width: 50%;" >
        <h1 class="h3 mb-3 fw-normal">Inicia sesión</h1>
            
  
        <form class="form-signin" action="validacion.php" method="POST">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputEmail" class="form-control" placeholder="Usuario" required autofocus name="nombres">
                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required name="clave">
   <div style="margin-left: 58%" >
<div class="form-check  mb-3">
  <input class="form-check-input" type="checkbox" role="switch" id="swi" onChange="mostrar_contraseña()">
  <label class="form-check-label" >Mostrar contraseña</label>
 
</div></div>
                <button class="btn btn-lg btn-primary  btn-block mb-4" type="submit">Ingresar</button>
               
            </form><!-- /form --></div></div>


<div class="text-light col mr-3"> 
<form class="form-signin" action="politicas.php" method="POST">
<h3 class="mt-5 fw-light">Bienvenido al sistema de evaluación</h3>
<h1>COMPITE</h1>

<hr class="bg-light">
<br>
<button class="btn btn-lg btn-primary  btn-block mb-4" type="submit">Políticas de privacidad</button>

  </form>

</div>

        </div><!-- /card-container -->
    </div><!-- /container -->
</center>
</body>
<br> <br><br><br><br>
</body>
</html>


<script>
function mostrar_contraseña(){

 var pass=document.getElementById("pass");
 var check=document.getElementById("swi");

  if(check.checked==true) // 
  { pass.type = "text"; }else 
  {  pass.type = "password"; }}
</script>