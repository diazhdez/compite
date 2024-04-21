
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <scripy src="../js/bootstrap.bundle.min.js"></script>
     <link rel="stylesheet" href="../css/bg.css">
   
   
     <script src="https://kit.fontawesome.com/e07784388c.js" crossorigin="anonymous"></script>
  
    <!-- Favicon - FIS -->
    <link rel="shortcut icon" href="../imagenes/logo compite.png">
      
      
  <nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand fw-bold" href="principal.php">
      <img src="../imagenes/Logo Compite.png" alt="" width="70" class="d-inline-block align-text-top">
      COMPITE  </a>

     
     
      <a href="empresas.php" id="empresa" class="btn text-light text-opacity-50 fs-5 ">Empresas <i class="fa-solid fa-briefcase"></i></a>
      <a href="index.php" id="competencia" class="btn text-light text-opacity-50 fs-5 ">Biblioteca de competencias <i class="fa-solid fa-clipboard-list"></i></a>
      <a href="empleados.php" id="empleados" class="btn text-light text-opacity-50 fs-5 ">Control de empleados<i class="fa-solid fa-person-walking-luggage"></i></a>

        <form  style="color: #fff">
          
          <?php   
          session_start();
            if (isset($_SESSION['u_usuario'])) {
              echo "  <i class='fa-solid fa-user'></i>  Bienvenido/a, " . $_SESSION['u_usuario'] . "\t";
              
    
              echo "<a href='../cerrar_sesion.php' class='btn btn-danger  ' style='margin-left: 10px'>Cerrar Sesión</a>";
            } else {
              header("Location: ../cerrar_sesion.php"); }   ?>
             
          </form>

    </nav>

  <br>
  <br>
  