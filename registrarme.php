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
<style>
  body{background-image: url(imagenes/background.jpg);
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size:cover;}
</style>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="login.php">
      <img src="imagenes/Logo Compite.png" alt="" width="70" class="d-inline-block align-text-top">
      COMPITE
    </a></div>
  <br></nav>

  <body class="text-center">
    <center>
         <div class=" card shadow m-4 mt-5 align-items-center bg-dark" 
         style="width: 70rem; --bs-bg-opacity: .9;" >
      
         <div class="row"><div class="col"><div class="card-body bg-light m-4 " style="width: 30rem;" >

        <img class="m-4 " src="imagenes/Logo Compite.png" alt="Foto ilustrativa del usuario" style="width: 50%;" >
        <h1 class="h3 mb-3 fw-normal">Registrate aquí</h1>
     

			





<div class="formulario" id="formulario" style="margin: 50px;
    text-align: justify;
    padding: 10px;
    border-radius: 10px;">   
 <center>
 
<!-- Inicio del formulario-->


<form action='registro/registrousuario.php' method="POST" enctype="multipart/form-data" id="formulario">
    <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Introduzca su nombre" value=""><br>
    <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Introduzca sus apellidos" value=""><br>
    <input type="text" name="id_tipo_usuario" placeholder="Introduzca tipo de cuenta que desee" value=""><br><br>
    <input type="email" name="email" id="email" class="form-control" placeholder="Introduzca el correo" value=""><br>
    <input type="password" name="clave" id="clave" class="form-control" placeholder="Introduzca la contraseña" value=""><br>
<div class="form-check  mb-3">
<input class="form-check-input" type="checkbox" role="switch" id="termino" onChange="#">
  <a href="politicas.php" class="link-info">Políticas y privacidad</a>  <br><br>
<!-- Fin del formulario-->
<input type="submit" style="background-color: #0f27df;" class="btn btn-primary" value="Enviar">                                        

</form>
<br> <br>

<div class="text-center small link-dark">
  <a class="link-secondary text-decoration-none"id="link1" href="login.php">Ya cuento con una cuenta</a> </div>
                               
                              
   
<script>


	</script>
  
</body>
</html>