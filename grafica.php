<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">      

  <title>Resultados</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
    
</head>

<?php include "navbar.php"?>

<body>


<?php     include("conexion.php");

        $query = "SELECT * FROM empresa WHERE id_empresa= 1 ";
        $resultado=$con ->query($query);
        while($row=$resultado->fetch_assoc()){ ?> 


<h1 class="text-center mb-4">Resultados gráficos <?php echo $row['nombre']; ?></h1>
<?php }  ?>

<div class="row mx-5">
<div class="col-3">



  <table class="table table-light table-bordered table-hover table-striped"  id="tabla1">
        <thead class="thead-dark">
            <tr>
               
                <th>Competencia</th>
                <th  class="text-danger">Resultado esperado</th>
                <th  class="text-success">Resultado obtenido</th>
            </tr>
        </thead>
        <tbody>


        <?php     

$query = "SELECT * FROM `encuestas` "; $i= 1;
$resultado=$con ->query($query); 

while($row=$resultado->fetch_assoc()){ ?> 

            <tr>
                
                <td id="titulo<?php echo $i?>"><?php echo $row['titulo']; ?></td>
                <td id="esperado<?php echo $i?>" class="text-danger"><?php echo $row['Resultado_esperado']; ?></td>
                <td  id="obtenido<?php echo $i?>" class="text-success">90</td>

      <?php $i++; }  ?>
      </tr> </table> </div>

      <div class="col-7"> <canvas class="card" id="grafica"></canvas> </div>

    
    <div class="col-1">
    
<button class="btn btn-secondary fw-bold mx-5" onclick="generateTable1()"><i class="fa-solid fa-file-pdf"></i> Descasdfsdf pdf</button>

     </div></div>

</body>
</html>
<?php
$queryTitulo = "SELECT titulo FROM `encuestas` "; 
$resultadoTitulo=$con ->query($queryTitulo);
$array = array();

while($rowJ =mysqli_fetch_assoc($resultadoTitulo)){
    $array[] = $rowJ["titulo"];} ?>
  
    <p id="array" class="invisible">  <?php echo json_encode($array, JSON_UNESCAPED_UNICODE);?></p>
    
<?php
    $queryEsp = "SELECT Resultado_esperado FROM `encuestas` "; 
$resultadoEsp=$con ->query($queryEsp);
$array = array();
while($rowEsp =mysqli_fetch_assoc($resultadoEsp)){
    $array2[] = $rowEsp["Resultado_esperado"];} 
    
?> <p id="array2" class="invisible">  <?php echo json_encode($array2, JSON_NUMERIC_CHECK);?></p>


<script>
function generateTable1() {
    var doc = new jsPDF('p', 'pt', 'letter');
    var y = 20;
    doc.setLineWidth(2);
    doc.setFontType('bold')
    doc.text(240, y = y + 30, "Reporte de vistas");
    doc.autoTable({
        html: '#tabla1',
        startY: 70,
        theme: 'striped',
        styles : { halign : 'left'}, headStyles :{fillColor : [255, 228, 181]}
        
    })
    //doc.save('auto_table_pdf');
    window.open(doc.output('bloburl')) 
}

///GENERAR GRÁFICA

// Obtener una referencia al elemento canvas del DOM
const $grafica = document.querySelector("#grafica");
//Crear etiquetas
var array_T=document.getElementById("array").innerHTML;
array_T2=JSON.parse(array_T);
var array_Esp=document.getElementById("array2").innerHTML;
array_Esp2=JSON.parse(array_Esp);


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
            data: [660, 200, 300, 450],
            backgroundColor:  'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgb(75, 192, 192)',
            borderWidth: 1,
        }
new Chart($grafica, {
    type: 'bar',// Tipo de gráfica
    data: {
        labels: array_T2,
        datasets: [ datos_esperados, datos_obtenidos, ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
        },
    }
});
    </script>