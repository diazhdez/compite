<?php
// Incluimos el archivo de conexión a base de datos
include ("../../conexion.php");

$data = "";

if (isset($_GET['code'])) {
    $code = $_GET['code'];

    $query = "SELECT * FROM usuarios 
              INNER JOIN encuestas ON usuarios.id_usuario = encuestas.id_usuario 
              WHERE usuarios.Code = '$code' AND encuestas.estado = 'Activa'";

    $resultado = $con->query($query);

    if ($resultado->num_rows == 0) {
        $data .= "No hay encuestas disponibles para este usuario.";
    } else {
        while ($row = $resultado->fetch_assoc()) {
            $data .= '
                <div class="card shadow m-4">
                    <div class="card-header bg-dark text-light">
                        <div class="row">
                            <div class="col-8">
                                <p class="fw-bold text-light fs-3">' . $row['titulo'] . '</p>
                            </div>
                            <div class="col">
                                <button class="btn" data-bs-toggle="modal" data-bs-target="#modal_modificar" title="Modificar Empresa">
                                    L<i class="fas fa-marker fa-2xl p-4"></i>
                                </button>
                            </div>
                            <div class="col">
                                <a class="btn btn-warning fw-bold" href="responder.php?id_encuesta=' . $row['id_encuesta'] . '">RESPONDER</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p class="mx-2">' . $row["descripcion"] . '</p>
                            <footer class="text-muted fs-6 mx-2 mt-2">' . $row["fecha_final"] . '</footer>
                        </blockquote>
                    </div>
                </div>
            ';
        }
    }
} else {
    $data .= "No se ha proporcionado el código para buscar encuestas.";
}

echo $data;
?>
