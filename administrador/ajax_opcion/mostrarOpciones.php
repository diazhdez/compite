<?php

// Incluimos el archivo de conexión a base de datos
include ("../../conexion.php");

if (isset($_POST['id_pregunta'])) {
    $id_pregunta = $_POST['id_pregunta'];
}

// Diseñamos el encabezado de la tabla
$data = '
    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-dark">
            <tr>
               
                <th>Opcion</th>
                <th>Valor</th>
                <th>Accciones</th>
            </tr>
        </thead>';

$query = "SELECT * FROM opciones WHERE id_pregunta = '$id_pregunta'";

$resultado = $con->query($query);

while ($row = $resultado->fetch_assoc()) {
    $data .= '
        <tbody>
            <tr>
                
                <td>' . $row["valor"] . '</td>
                <td>' . $row["puntaje"] . '</td>
                <td>
                    <button onclick="obtenerDetallesOpcion(' . $row['id_opcion'] . ')" class="btn btn-warning">Modificar</button>
                    <button onclick="eliminarOpcion(' . $row['id_opcion'] . ')" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
        </tbody>';
}

$data .= '</table>';

echo $data; 