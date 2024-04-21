<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresas</title>
    <link rel="icon" type="image/png" href="logouta.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e07784388c.js" crossorigin="anonymous"></script>
  </head>

<?php include("nav.html");
$IDEmpresa=$_GET['IDEmpresa'];
$query = "SELECT * FROM competencia  WHERE IDEmpresa=$IDEmpresa";
$query1 = "SELECT * FROM cuestionario  WHERE IDEmpresa=$IDEmpresa";
?>

<body>
 
<style>.Uta-bg text-light{background-color:#312b71}</style>

<div class="mx-2">

<h1 class="fw-bold text-center"> Competencias</h1>
<h4 class="fw-bold text-center"><a href="#" title="Añadir empresas">Agregar Preguntas<i class="fa-solid fa-circle-plus "></i></a> </h4>

<a href="empresas.php">regresar</a>
<?php     include("conexion.php");
        $resultado=$enlace ->query($query);
        while($row=$resultado->fetch_assoc()){ ?>
 
<div class="card m-4">
  <div class="card-header bg-dark text-light">

  <div class="row">
  <p class="fw-bold text-light fs-3"><?php echo $row['Nombre']; ?> </p></div>
  <p class=" text-light "><?php echo $row['Descripcion']; ?> </p></div>
  

  <table class="table table-striped">
  
  <thead class="bg-dark text-light"> 
    <tr>
      <th scope="col"><p class="fs-5 text-muted">Preguntas</p></th>
      <th scope="col">Muy prodctivo</th>
      <th scope="col">Productivo</th>
      <th scope="col">Regular</th>
      <th scope="col">Poco prodctivo</th>
      <th scope="col">Nada Productivo</th>
    </tr>
  </thead>

  <?php         
        $resultado1=$enlace ->query($query1); $i=1;
        while($row1=$resultado1->fetch_assoc()){ ?>
  <tbody>
    <tr>
      <th class="col-5"><?php echo $i.".-"; echo $row1['Pregunta']; ?></th>
      <td><?php  echo $row1['MP']; ?> <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked> </td>
      <td><?php echo $row1['P']; ?> <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"> </td>
      <td> <?php echo $row1['R']; ?><input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"></td>
      <td> <?php echo $row1['PP']; ?><input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"> </td>
      <td> <?php echo $row1['NP']; ?><input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"></td>
      <?php $i++; }?>
    </tr> </tbody>

</table> 
      <hr>   <div class="card-body  text-light">
      <button type="button" class=" btn btn-lg btn-light text-muted">Ver pdf</button>
      <button type="button" class=" btn btn-lg btn-light text-muted">Descargar pdf</button>

      <footer class="text-muted fs-6 mt-2"><?php echo $row['Fecha_Alta']; ?></footer>
    </blockquote>
  </div>
</div>

            <?php
        }


         ?>
           </div> </body>
</html>