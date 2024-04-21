    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/bg.css">
    <script src="https://kit.fontawesome.com/e07784388c.js" crossorigin="anonymous"></script>
    <!-- Favicon - FIS -->
    <link rel="shortcut icon" href="../imagenes/logo compite.png">
      
      
  <nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand fw-bold" href="principal.php">
      <img src="../imagenes/Logo Compite.png" alt="" width="70" class="d-inline-block align-text-top">
      COMPITE  </a>

    
        <form  style="color: #fff">
          
          <?php   
          session_start();
            if (isset($_SESSION['u_usuario'])) {
              echo "  <i class='fa-solid fa-user'></i>  Bienvenido/a, " . $_SESSION['u_usuario'] . "\t";
              
    
              echo "<a href='../cerrar_sesion.php' class='btn btn-danger  ' style='margin-left: 10px'>Cerrar Sesión</a>";
            } else {
              header("Location: ../login/login.php"); }   ?>
             
          </form>

    </nav>

  <br>
  <br>