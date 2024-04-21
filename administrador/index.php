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

  	<!-- Bootstrap CSS -->
  	<link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Favicon - FIS -->
    <link rel="shortcut icon" href="../imagenes/logo compite.png">

  	<title>Biblioteca de competencias</title>

    <script type="text/javascript" language="javascript">   
      history.pushState(null, null, location.href);
      window.onpopstate = function () {
        history.go(1);
      };
    </script>

</head>
<body>

<?php include "navbar.php"?>

	<!-- Content Section -->
	<div class="container" style="margin-top: 30px;">
  <div class="card m-4 ">
  <div class="card-header bg-dark text-light p-3">
<h3 class="text-light ml-2">Biblioteca de competencias
<button class="float-end btn btn-primary" id="boton_agregar" ><i class="fas fa-plus fa-2xl"></i> Competencia</button>
</h3>
	    </div>
	    <hr/>
	    <div class="row">
	        <div class="col-md-12">

	            <div class="table-responsive">
	            	<div id="tabla_encuestas"></div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- /Content Section -->


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="js/encuestas.js"></script>

</body>
</html>

<!-- Modal Agregar Nueva Competencia -->
<div class="modal fade" id="modal_agregar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header bg-dark" >
            	<h4 class="modal-title text-white">Agregar Nueva Competencia</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

            	<div class="form-group row">
      					<label for="titulo" class="col-sm-3 col-form-label">Título</label>
      					<div class="col-sm-9">
      						<input type="text" class="form-control" id="titulo" placeholder="Título" autocomplete="off" autofocus>
      					</div>
      				</div>
              <div class="form-group row">
                <label for="descripcion" class="col-sm-3 col-form-label">Descripción</label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="descripcion" placeholder="Descripción"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="resultado_esperado" class="col-sm-3 col-form-label">Resultado Esperado</label>
                <div class="col-sm-9">
                  <input  type="numer" class="form-control" id="resultado_esperado" placeholder="Resultado Esperado" autocomplete="off" autofocus>
                </div>
              </div>
              <div class="form-group row">
                <label for="fecha_final" class="col-sm-3 col-form-label">Fecha Final</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="fecha_final" value="<?php echo $fecha_inicio ?>"  autocomplete="off">
                  <p>Fomato: año-mes-día horas:minutos:segundos</p>
                </div>
              </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="agregarEncuesta()">Agregar Encuesta</button>
                <input type="hidden" id="hidden_id_usuario" value="<?php echo $_SESSION['id_usuario'] ?>">
            </div>

        </div>
    </div>
</div>

<!-- Modal Modificar Competencia -->
<div class="modal fade" id="modal_modificar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
            	<h4 class="modal-title">Modificar Competencia</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

            	<div class="form-group row">
      					<label for="modificar_titulo" class="col-sm-3 col-form-label">Título</label>
      					<div class="col-sm-9">
      						<input type="text" class="form-control" id="modificar_titulo" placeholder="Título">
      					</div>
      				</div>

              <div class="form-group row">
                <label for="descripcion" class="col-sm-3 col-form-label">Descripción</label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="modificar_descripcion" placeholder="Descripción"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="resultado_esperado" class="col-sm-3 col-form-label">Resultado Esperado</label>
                <div class="col-sm-9">
                  <input  type="numer" class="form-control" id="resultado_esperado" placeholder="Resultado Esperado" autocomplete="off" autofocus>
                </div>
              </div>

              <div class="form-group row">
                <label for="fecha_final" class="col-sm-3 col-form-label">Fecha Final</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="modificar_fecha_final" placeholder="Fecha de Cierre" autocomplete="off"
                  value="<?php echo $fecha_inicio ?>">
                  <p>Fomato: año-mes-día horas:minutos:segundos</p>
                </div>
              </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="modificarDetallesEncuesta()">Modificar Encuesta</button>
                <input type="hidden" id="hidden_id_encuesta">
            </div>

        </div>
    </div>
</div>


