    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/bg.css">
    <script src="https://kit.fontawesome.com/e07784388c.js" crossorigin="anonymous"></script>
    <!-- Favicon - FIS -->
    <link rel="shortcut icon" href="imagenes/Logo Compite.png">
      
      


  <nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand fw-bold" href="login.php">
      <img src="imagenes/Logo Compite.png" alt="" width="70" class="d-inline-block align-text-top">
      COMPITE  </a>

        <a href="administrador/empresas.php" class="btn text-light text-opacity-50 fs-5 ">Empresas <i class="fa-solid fa-briefcase"></i></a>
        <a href="administrador/index.php" class="btn text-light text-opacity-50 fs-5 ">Encuestas <i class="fa-solid fa-clipboard-list"></i></a>

        <form  style="color: #fff">
          
          <?php   
          session_start();
            if (isset($_SESSION['u_usuario'])) {
              echo "  <i class='fa-solid fa-user'></i> Bienvenido/a, " . $_SESSION['u_usuario'] . "\t";
              
    
              echo "<a href='cerrar_sesion.php' class='btn btn-danger  ' style='margin-left: 10px'>Cerrar Sesión</a>";
            } else {
              header("Location: login/login.php"); }   ?>
             
          </form>

    </nav>

  <br>