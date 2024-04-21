<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de empleados</title>
    <link rel="icon" type="image/png" href="../imagenes/logo compite.png">

    <link rel="stylesheet" href="../css/bootstrap.min.css">    
    <script src="../js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e07784388c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/contenedor3.css"> <!-- Agrega este enlace para el archivo de estilos -->
 
</head>
</head>

<?php include("navbar.php")?> 

<body>

<div class="container">

<h1 class="fw-bold text-center"> Control de empleados <button class="link-primary btn" data-bs-toggle="modal" data-bs-target="#modal_agregar" title="registrar empleado"><i class="fa-solid fa-circle-plus fa-3x "></i></button></h1>

<div class="contenedor"> <!-- Nuevo contenedor para los grupos de tarjetas -->
  <?php
  // Llamada a session_start() ya no es necesaria aquí, se hace en "navbar.php"

  include("../conexion.php");
  $data = '';

  $id_usuariolog = $_SESSION['id_usuario'];
  $query = "SELECT * FROM usuarios WHERE id_tipo_usuario = 2 ";
  $resultado = $con->query($query);
  $i = 1;
  while ($row = $resultado->fetch_assoc()) {
      // Código HTML para mostrar los datos del usuario
  ?>
  <div class="grupo">
    <div class="card col-sm-1 m-2 p-1" style="width: 18rem;">
    <img src="../imagenes/<?php echo $row['foto_perfil']; ?>" class="card-img-top" alt="...">
    
      <h5 class="card-title"><?php echo $row['nombres'];?> <?php echo $row['apellidos']?></h5>
      <p class="card-text"><b>Contacto</b><br><?php echo $row['email']?></p>
      <div class="row">
        <div class="col"><b>Rol</b></div>
        <div class="col invisible" id="rol"><?php echo $row['id_tipo_usuario']?> </div>
        <?php $ses= $row['id_tipo_usuario']?>
      </div>
      <p class="card-text" id="rol2"></p>
      <hr>
      <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-dark">Editar perfil</button>
      <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-dark"><a href='registro/eliminausuario.php?id_usuario=<?php echo $row['id_usuario']; ?>' class="table_item_link">Eliminar Datos de Empleado</a></button>

    </div>
  </div>
  <?php
    $i++;
  }
  ?>
</div> <!-- Fin del nuevo contenedor -->

</div>

<!-- Resto del código -->
<script src="../js/eliminar.js"></script>
</body>
</html>

<div class="modal fade" id="modal_agregar" role="dialog">
    <div class="modal-dialog">  <div class="modal-content">

            <div class="modal-header bg-dark">
              <h4 class="modal-title text-white">Agregar Nuevo Empleado</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form  action='registro/registrousuario.php' method="POST" enctype="multipart/form-data" id="formulario">

            <div class="modal-body">
              <div class="form-group row mb-2">
                <label for="titulo" class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-9">
                  <input type="text" name="nombres" class="form-control" id="nombres" placeholder="Nombres" autocomplete="off" autofocus>
                </div></div>
                <div class="form-group row mb-2">
                <label for="titulo" class="col-sm-3 col-form-label">Apellidos</label>
                <div class="col-sm-9">
                  <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="apellidos" autocomplete="off" autofocus>
                </div></div>
                <div class="form-group row mb-2">
                <label for="titulo" class="col-sm-3 col-form-label">Correo</label>
                <div class="col-sm-9">
                  <input type="text" name="email" class="form-control" id="email" placeholder="Correo" autocomplete="off" autofocus>
                </div></div>
                <div class="form-group row mb-2">
                <label for="titulo" class="col-sm-3 col-form-label">Contraseña</label>
                <div class="col-sm-9">
                  <input type="text" name="clave" class="form-control" id="clave" placeholder="Contraseña" autocomplete="off" autofocus>
                </div></div>
                <div class="form-group row mb-2">
                <label for="titulo" class="col-sm-3 col-form-label">Empresa</label>
                <div class="col-sm-9">
                  <input type="text" name="id_empresa" class="form-control" id="id_empresa" placeholder="Empresa" autocomplete="off" autofocus>
                </div></div>
                <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
               <input type="submit" style="background-color: #0f27df;" class="btn btn-primary" value="Enviar">
              </div>
              </div>          
            </div>
                
             

                </div>  </div>
 </form>

