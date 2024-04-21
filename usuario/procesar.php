<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Favicon - FIS -->
  <link rel="shortcut icon" href="../imagenes/logouta.png">

  <title>Procesar</title>
</head>
<body>
  <!-- NAVBAR -->
  <?php include "navbar.php"?>

  <center>
    <div style="margin-top: 50px"></div>
    <?php
    require ('../conexion.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificamos que la variable de sesión esté iniciada
        if (!isset($_SESSION)) {
            session_start();
        }

        // Verificamos que la variable de sesión id_usuario esté definida
        if (!isset($_SESSION['id_usuario'])) {
            echo "No se ha iniciado sesión.";
            exit; // Salimos del script si no hay sesión iniciada
        }

        $id_encuesta = $_POST['id_encuesta'];
        $id_usuario = $_SESSION['id_usuario'];
        $ids = array();

        $query10 = "SELECT * FROM encuestas WHERE id_encuesta = '$id_encuesta'";
        $resultado10 = $con->query($query10);

        if ($resultado10->num_rows > 0) {
            $row10 = $resultado10->fetch_assoc();
            $estado_encuesta = $row10['estado'];

            $query5 = "SELECT * FROM usuarios_encuestas WHERE id_usuario = '$id_usuario' AND id_encuesta = '$id_encuesta'";
            $resultado5 = $con->query($query5);

            if ($resultado5->num_rows > 0) {
                echo "Ya respondiste la encuesta";
            } else {
                $query6 = "INSERT INTO usuarios_encuestas (id_usuario, id_encuesta) VALUES ('$id_usuario', '$id_encuesta')";
                $resultado6 = $con->query($query6);

                if ($resultado6) {
                    if ($estado_encuesta == 'Activa') {
                        $insercionesExitosas = true; // Variable para controlar si todas las inserciones son exitosas

                        for ($i = 1; $i <= 100; $i++) {
                            if (isset($_POST[$i])) {
                                $ids[$i] = $_POST[$i];
                                $id = $ids[$i];

                                $query2 = "SELECT id_opcion, id_pregunta, valor FROM opciones WHERE id_opcion = '$ids[$i]'";
                                $resultado2 = $con->query($query2);

                                if ($resultado2->num_rows > 0) {
                                    $row2 = $resultado2->fetch_assoc();
                                    $id_opcion = $row2['id_opcion'];
                                    $query3 = "INSERT INTO resultados (id_opcion) VALUES ('$id_opcion')";
                                    $resultado3 = $con->query($query3);

                                    if (!$resultado3) {
                                        $insercionesExitosas = false; // Si hay una inserción fallida, se marca como false
                                        echo "Error al ingresar resultado para la opción $id_opcion: " . $con->error;
                                    }
                                }
                            }
                        }

                        if ($insercionesExitosas) {
                            echo "Todas las inserciones se realizaron con éxito";
                        }
                    } else {
                        echo "ERROR: La encuesta se encuentra cerrada";
                    }
                } else {
                    echo "Error al insertar datos en usuarios_encuestas: " . $con->error;
                }
            }
        } else {
            echo "No se encontró la encuesta especificada.";
        }
    } else {
        echo "No se han recibido datos del formulario";
    }
    ?>

    <br/>
    <a class="btn btn-primary" href="index.php">VOLVER</a>
  </center>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../js/jquery-3.3.1.slim.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>
</html>
