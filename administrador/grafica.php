<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">      
  <link rel="shortcut icon" href="../imagenes/logo compite.png">
  <title>Resultados</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
    
</head>

<?php include "navbar.php"?>

<body>

<?php     include("../conexion.php"); 
$id_usuariolog= $_SESSION['id_usuario'];

 $id_empresa = $_GET['id_empresa'];
 

        $query = "SELECT * FROM empresa WHERE id_empresa= '$id_empresa' ";
        $resultado=$con ->query($query);
        while($row=$resultado->fetch_assoc()){ ?> 

<h1 class=" mb-3 text-center" ><p id="titulo">Resultados por competencias generales de <?php echo $row['nombre']; ?></p> </h1>


<?php }  ?>


<?php     $query5 = "SELECT sumacion.*, usuarios_encuestas.id_usuario
FROM sumacio WHERE id_usuario ='$id_usuariolog'
	, usuarios_encuestasGROUP BY id_usuario HAVING COUNT(*)>1;
"; $i= 1;
$resultado5=$con ->query($query5);

 ?>



<div class="row mx-5">
    
<div class=" col-3">
<center><button class="btn btn-success fw-bold mb-3" onclick="generateTable1()">
<i class="fa-solid fa-file-pdf fa-2x "></i> Descargar</button></center>

  <table class="table table-light table-bordered table-hover table-striped shadow-sm"  id="tabla1">
        <thead class="table-dark">
            <tr>
               
                <th>Competencia</th>
                <th >Resultado esperado</th>
            </tr>
        </thead> <tbody>


<?php  


$query = "SELECT id_usuario, titulo, resultado_esperado FROM encuestas WHERE id_usuario ='$id_usuariolog' ORDER BY titulo DESC"; $i= 1;
$resultado=$con ->query($query);
while($row=$resultado->fetch_assoc()){ ?> 




            <tr>     
                <td id="titulo<?php echo $i?>"><?php echo $row['titulo']; ?></td>
                <td id="esperado<?php echo $i?>" class="text-danger"><?php echo $row['resultado_esperado']; ?></td>
                
                <?php $i++; }  ?>
 
      </tr> </table>
    
      <table class="table table-light table-bordered table-hover table-striped shadow-sm"  id="tabla1">
        <thead class="table-dark">
            <tr>
               
                <th>Competencia</th>
                <th>Resultado obtenido</th>
            </tr>
        </thead> <tbody>


<?php    

 $query = "SELECT SUM(puntaje)/2 AS resultado_obtenido, titulo FROM `competencia`  GROUP BY titulo ORDER BY titulo DESC"; $i= 1;
$resultado=$con ->query($query);
while($row=$resultado->fetch_assoc()){ ?> 




            <tr>     
                <td id="titulo<?php echo $i?>"><?php echo $row['titulo']; ?></td>
                
                <td  id="obtenido<?php echo $i?>" class="text-success"><?php echo $row['resultado_obtenido']; ?></td>
                <?php $i++; }  ?>
 
      </tr> </table>
    
    



    </div>
      <div class="col"> <canvas class="bg-light p-3 shadow" id="grafica"></canvas> </div>
    
    <div class="col-1 "></div>
</div>

</body>
</html>
<?php
$queryTitulo = "SELECT titulo, id_usuario FROM `encuestas` WHERE id_usuario ='$id_usuariolog' ORDER BY titulo DESC "; 
$resultadoTitulo=$con ->query($queryTitulo);
$array = array();

while($rowJ =mysqli_fetch_assoc($resultadoTitulo)){
    $array[] = $rowJ["titulo"];} ?>
  
    <p id="array" class="invisible">  <?php echo json_encode($array, JSON_UNESCAPED_UNICODE);?></p>
    
<?php
    $queryEsp = "SELECT Resultado_esperado, id_usuario FROM `encuestas` WHERE id_usuario ='$id_usuariolog' ORDER BY titulo DESC "; 
$resultadoEsp=$con ->query($queryEsp);
$array = array();
while($rowEsp =mysqli_fetch_assoc($resultadoEsp)){
    $array2[] = $rowEsp["Resultado_esperado"];} 
    
?> <p id="array2" class="invisible">  <?php echo json_encode($array2, JSON_NUMERIC_CHECK);?></p>


<?php
    $queryObt = "SELECT SUM(puntaje)/2 AS resultado_obtenido, titulo FROM `competencia` GROUP BY titulo ORDER BY titulo DESC "; 
$resultadoObt=$con ->query($queryObt);
$array = array();
while($rowObt =mysqli_fetch_assoc($resultadoObt)){
    $array3[] = $rowObt["resultado_obtenido"];} 
    
?> <p id="array3" class="invisible">  <?php echo json_encode($array3, JSON_NUMERIC_CHECK);?></p>





<script>

///------------------------------GENERAR GRÁFICA------------------------------

// Obtener una referencia al elemento canvas del DOM
const $grafica = document.querySelector("#grafica");
//Crear etiquetas
var array_T=document.getElementById("array").innerHTML;
array_T2=JSON.parse(array_T);
var array_Esp=document.getElementById("array2").innerHTML;
array_Esp2=JSON.parse(array_Esp);
var array_Obt=document.getElementById("array3").innerHTML;
array_Obt3=JSON.parse(array_Obt);
//var array_Ob=document.getElementById("array3").innerHTML;
//array_Ob2=JSON.parse(array_Ob);


// Podemos tener varios conjuntos de datos. Comencemos con uno
const datos_esperados = {
    label: "Resultados Esperados",
    data: array_Esp2, // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: 'rgba(255, 99, 132, 0.2)', // Color de fondo
    borderColor: 'rgb(255, 99, 132)', // Color del borde
    borderWidth: 1,// Ancho del borde
};

const datos_obtenidos= {
            label: 'Resultados Obtenidos',
            data: array_Obt3,
            backgroundColor:  'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgb(75, 192, 192)',
            borderWidth: 1,
        }
const bgColor={ id: 'bgColor',
beforeDraw: (chart, steps, options)=>{
    const{ctx,width,height}=chart;
    ctx.fillStyle= options.backgroundColor;
    ctx.fillRect(0,0, width, height)
    ctx.restore();
}
}
const Grafi = new Chart($grafica, {
    type: 'bar',// Tipo de gráfica
    data: {
        labels: array_T2,
        datasets: [ datos_esperados, datos_obtenidos, ]   },
    options: {
        
        scales: {
            y:{  beginAtZero: true  }
            } },
            plugins: {bgColor:{ backgroundColor2: 'white'}}
    
        },
);

//------------------------------PDF------------------------------
function generateTable1() {

var titulo=document.getElementById("titulo").innerHTML;
const chart=document.getElementById("grafica");
//crear la imagen
const imagen= chart.toDataURL('image/png',1.0);

var doc = new jsPDF('p', 'pt', 'letter');
var y = 20;  function salto(){y=y+30}
doc.setLineWidth(2);
doc.setFontType('bold')
doc.text(120, y=y+20, titulo);

doc.autoTable({
    html: '#tabla1',
    startY: y=y+30,
    theme: 'striped',

styles: { filcolor:[(244,243,241)]  }, headStyles :{fillColor : [(0,0,0)]},
columnStyles: {   1: { halign: 'center', textColor: [221,53,69] }, 2: { halign: 'center', textColor: [25,135,84] } }, // Cells in first column centered and green
margin: { top: 10 },})
salto();
doc.addImage(imagen,'JPEG',60,y=y+60,500,270);

//doc.save('auto_table_pdf');
window.open(doc.output('bloburl')) 
}

    </script>