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
  	<title>Compite</title>
    <link rel="shortcut icon" href="../imagenes/logo compite.png">
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
  

<h2>Perfil de usuario & Secciones</h2>
<hr>

<?php $nombres= $_SESSION['u_usuario'];?> 

<div class="row"> 
  

<?php     include("../conexion.php");
 //   $nombres = $_GET['nombres'];

        $query = "SELECT * FROM usuarios WHERE nombres= '$nombres'";
        $resultado=$con ->query($query);
        while($row=$resultado->fetch_assoc()){  ?>

<div class="card col-sm-1 m-2 p-1" style="width: 18rem;">
  <img src="../imagenes/<?php echo $row['foto_perfil']; ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['nombres'];?>  <?php echo $row['apellidos']?></h5>
    <p class="card-text"> <b> Contacto </b><br> <?php echo $row['email']?></p>
    <p class="card-text"> <b> Código de acceso a encuestas </b><br> <?php echo $row['Code']?></p>
    <div class="row"> <div class="col"><b> Rol </b></div>
    <div class="col invisible" id="rol"><?php echo $row['id_tipo_usuario']?> </div> 
    <?php $ses= $row['id_tipo_usuario']?></div>
    <p class="card-text" id="rol2">  </p>    
   <hr>
    <button type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal"
    
    class="btn btn-outline-dark"> Editar perfil </button>
  </div>
</div>

<script>
var rol= document.getElementById("rol").innerHTML;
var empresa= document.getElementById("empresa");
var competencia= document.getElementById("competencia");

if (rol==1){
document.getElementById('rol2').innerHTML="Administrador";}
else{
  document.getElementById('rol2').innerHTML="Usuario";
  competencia.className="invisible";
  empresa.className="invisible";
}

</script>

<?php }    

if($ses==2){?>
  <div class="col-sm-5"> <br><br>
 <!--card--> <div class="card shadow">
  <h5 class="card-header bg-secondary text-white">Contestar encuestas</h5>
  <div class="card-body">
    <h5 class="card-title">Se necesitan códigos</h5>
    <p class="card-text">Contesta las encuentas envíadas por su empresa responsable.</p>
    <a href="../usuario/index.php" class="btn btn-primary">Entrar</a>
  </div></div> </div><!--end card-->
<?php }else{ ?>

<div class="col-sm-4"> <br><br>
 <!--card--> <div class="card shadow">
  <h5 class="card-header bg-secondary text-white">Empresas</h5>
  <div class="card-body">
    <h5 class="card-title">Empresas añadidas recientemente</h5>
    <p class="card-text">Consulta y añade empresas que requieran de crear encuestas, utilizando las competencias.</p>
    <a href="empresas.php" class="btn btn-primary">Entrar</a>
  </div></div> </div><!--end card-->

  <div class="col-sm-5"> <br><br>
 <!--card--> <div class="card shadow">
  <h5 class="card-header bg-secondary text-white">Biblioteca de competencias</h5>
  <div class="card-body">
    <h5 class="card-title">Competencias & Preguntas</h5>
    <p class="card-text">Aquí puede encontrar todas las competencias registradas en la aplicación y realizar encuestas con ello.</p>
    <a href="index.php" class="btn btn-primary">Entrar</a>
  </div></div> </div><!--end card-->

  </div>
  </div>


  <?php }?>
    </body>
    </html>

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

