<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresas</title>
    <link rel="icon" type="image/png" href="../imagenes/logo compite.png">

    <link rel="stylesheet" href="../css/bootstrap.min.css">    
    <script src="../js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e07784388c.js" crossorigin="anonymous"></script>
  </head>

<?php include("navbar.php")?>

<body>
 
<div class="container">

<h1 class="fw-bold text-center"> Empresas <button class="link-primary btn" data-bs-toggle="modal" data-bs-target="#modal_agregar" title="Añadir empresas"><i class="fa-solid fa-circle-plus fa-3x "></i></button></h1>

<?php     include("../conexion.php");

        $id_usuariolog= $_SESSION['id_usuario'];
        $query = "SELECT usuarios.*, empresa.* FROM usuarios LEFT JOIN empresa ON usuarios.id_empresa = empresa.id_empresa WHERE id_usuario ='$id_usuariolog'";
        $resultado=$con ->query($query); $i=1;
        while($row=$resultado->fetch_assoc()){
          
          //href="notas_form.php?Nombre_Tabla=<?php echo $data['Nombre_Tabla']"
          ?>
 
<div class="card m-4 shadow">
  <div class="card-header bg-dark text-light">

  <div class="row">
    <div class="col-8 "> <p class="fw-bold text-light fs-3"><?php echo $row['nombre']; ?> </div>
    <div class="col ">  
    <button class=" btn link-secondary" data-bs-toggle="modal" data-bs-target="#modal_modificar" title="Modificar empresas"><i class="fa-solid fa-marker fa-2x"></i></button>
     </div>
    <div class="col">  <a href='ajax_empresa/eliminarEmpresa.php?id_empresa=<?php echo $row['id_empresa']; ?>'class="link-secondary" onclick= "return confirm('¿Seguro que quieres borrar?')"><i class="fas fa-trash fa-2xl p-4"></i></a> </div>

  </div></div>
  
  
  <div class="card-body"> <blockquote class="blockquote mb-0">

      <p class= "mx-2"><?php echo $row['descripcion']; ?></p>
  <a href="grafica.php?id_empresa=<?php echo $row['id_empresa']; ?>" class="btn btn-secondary"> Resultados </a>

      <footer class="text-muted fs-6 mx-2 mt-2" id="fecha_c<?php echo$i ?>"><?php echo $row['fecha_alta']; ?></footer>
    </blockquote>
  </div>
</div>

            <?php
    $i++;    }


         ?>
           </div> </body>
</html>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/es.js" integrity="sha256-bETP3ndSBCorObibq37vsT+l/vwScuAc9LRJIQyb068=" crossorigin="anonymous"></script>
  
<script>
var i = 1;  
while(document.getElementById("fecha_c"+i) != null) {
 fecha= document.getElementById("fecha_c"+i).innerHTML;
 fecha2=  moment(fecha, "YYYY-MM-DD HH:mm:ss").format('DD/MM/YYYY, hh:mm:ss A');
 document.getElementById('fecha_c'+i).innerHTML=fecha2;
i++;}
</script>



<!-- Modal Agregar Nueva Empresa -->
<div class="modal fade" id="modal_agregar" role="dialog">
    <div class="modal-dialog">  <div class="modal-content">

            <div class="modal-header bg-dark">
              <h4 class="modal-title text-white">Agregar Nueva Empresa</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

<form  action='ajax_empresa/agregarEmpresa.php' method="POST" enctype="multipart/form-data" id="formulario">

            <div class="modal-body">
              <div class="form-group row mb-2">
                <label for="titulo" class="col-sm-3 col-form-label">Empresa</label>
                <div class="col-sm-9">
                  <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" autocomplete="off" autofocus>
                </div></div>

                <div class="form-group row mb-2">
                
                <label for="titulo" class="col-sm-3 col-form-label">Descripcion</label>
                <div class="col-sm-9">
                  <textarea class="form-control" name="descripcion" id="descripcion" aria-label="With textarea"></textarea>
             

                </div>  </div>
 </form>                
 <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
               <input type="submit" style="background-color: #0f27df;" class="btn btn-primary" value="Enviar">
              </div>
              </div>          
            </div>





            <!-- Modal Modificar Empresa -->
           

            
<!-- Modal Agregar Nueva Empresa -->
<div class="modal fade" id="modal_modificar" role="dialog">
    <div class="modal-dialog">  <div class="modal-content">

            <div class="modal-header bg-primary">
              <h4 class="modal-title text-white">Agregar Nueva Empresa</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
  <form  action='ajax_empresa/modificarEmpresa.php' method="POST" enctype="multipart/form-data" id="formulario">

<div class="modal-body">
  <div class="form-group row mb-2">
    <label for="titulo" class="col-sm-3 col-form-label">Empresa</label>
    <div class="col-sm-9">
      <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" autocomplete="off" autofocus value="<?php echo $row['nombre']; ?>"/>
    </div></div>

    <div class="form-group row mb-2">
    
    <label for="titulo" class="col-sm-3 col-form-label" value="<?php echo $row['descripcion']; ?>"/></label>
    <div class="col-sm-9">
      <textarea class="form-control" name="descripcion" id="descripcion" aria-label="With textarea"></textarea>
 
    </div>  </div>
</form>                  
 <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
               <input type="submit" style="background-color: #0f27df;" class="btn btn-primary" value="Enviar">
            </div>
              </div>          
            </div>




            