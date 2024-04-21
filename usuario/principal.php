<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/busca.css">
    <!-- Favicon - FIS -->
    <link rel="shortcut icon" href="../imagenes/logo compite.png">
    <title>Compite</title>
    <script type="text/javascript" language="javascript">   
        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1);
        };
    </script>
</head>
<body>
    <?php include "navbar.php"?>
    <h1>Buscador de Código</h1>
    <form action="index.php" method="get">
        <div id="search-box">
            <input type="text" name="code" id="search-input" placeholder="Ingrese el código proporcionado" maxlength="6">
            <br><br>
            <button type="submit" class="btn btn-lg btn-primary">Buscar</button>
        </div>
    </form>
</body>
</html>
