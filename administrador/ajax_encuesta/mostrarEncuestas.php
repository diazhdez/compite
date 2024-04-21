
<?php

// Incluimos el archivo de conexión a base de datos
include ("../../conexion.php");
// Diseñamos el encabezado de la tabla
session_start();
$data = '
';
$id_usuariolog= $_SESSION['id_usuario'];
$query = "SELECT * FROM encuestas WHERE id_usuario='$id_usuariolog'  ORDER BY id_encuesta DESC";
$resultado = $con->query($query);

while ($row = $resultado->fetch_assoc()) {
    $data .= '


    <div class="card m-4">
    <div class="card-header bg-secondary">
  
    <div class="row"> 
      <div class="col-9 "><a href="mostrar_preguntas.php?id_encuesta=' . $row['id_encuesta'] . '"class="link-light fw-bold  fs-4"  >' . $row['titulo'] . ' </a></div>
      <div class="col"> 
      <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Accciones
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <button onclick="obtenerDetallesEncuesta(' . $row['id_encuesta'] . ')" class="dropdown-item text-warning">Modificar</button>
        <button onclick="eliminarEncuesta(' . $row['id_encuesta'] . ')" class="dropdown-item btn text-danger">Eliminar</button>
        <button onclick="publicarEncuesta(' . $row['id_encuesta'] . ')" class="dropdown-item btn text-primary">Publicar</button>
        <button onclick="finalizarEncuesta(' . $row['id_encuesta'] . ')" class="dropdown-item btn text-success">Finalizar</button>

        <a class="dropdown-item btn text-secondary" href="vista_previa.php?id_encuesta='  . $row['id_encuesta'] . '">Vista Previa de encuesta</a>

        <a class="dropdown-item btn text-secondary" href="resultados.php?id_encuesta=' . $row['id_encuesta'] . '">Resultados</a>
    </div>
      
      </div>
      
    </div></div>
    
    <div class="card-body"> <blockquote class="blockquote mb-0">
  
        <p >' . $row['descripcion'] . '</p>

        <div class= "row">

      <div class="col"><p class="btn btn-warning opacity-50 fs-5"> Estado de la encuesta: ' . $row["estado"] . ' </p> </div>
  
      </div>
      <div class= "row">

      <div class="col"><p class="btn btn-warning opacity-50 fs-5"> Resultado esperado: ' . $row["resultado_esperado"] . ' </p> </div>
  
      </div>
 <footer class="text-muted fs-6 mx-2 mt-2">
        
    <div class="row"> <div class="col">
      Inicio: ' . $row["fecha_inicio"] . ' </div>
 <div class="col text-end">
     Finalización:   ' . $row["fecha_final"] . ' </div>
 </footer>
    
    </div>
  </div>';
}


$data .= '';

echo $data;