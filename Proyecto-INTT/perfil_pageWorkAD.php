<?php
require 'database.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
  }

  if (isset($_SESSION['user_id'])) {
    // Obtén la información del usuario desde la base de datos
    $userId = $_SESSION['user_id'];
    $query = "SELECT id, username, email, password FROM users WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $userId);
    $stmt->execute();
    
    // Verifica si se encontró el usuario
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $username = $user['username'];
        $email = $user['email'];

    } else {
        // Manejo de error si el usuario no se encuentra
        $username = "Usuario Desconocido";
        $email = "Correo Desconocido";
    }
    } else {
        // Manejo de error si el usuario no ha iniciado sesión
        $username = "Usuario Desconocido";
        $email = "Correo Desconocido";
    }

   // Realizar la consulta SQL para obtener los cuadros de impresión
   $query = "SELECT condes FROM tdicon WHERE connom = 'Serv. Num 1'";
   $result = $conn->query($query);
   $stmt = $conn->prepare($query);
   $stmt->execute();
   
   // Verifica si se encontró el usuario
   if ($stmt->rowCount() > 0) {
       $cont1 = $stmt->fetch(PDO::FETCH_ASSOC);
       $servnum1 = $cont1['condes'];
   } else {
       // Manejo de error si el usuario no se encuentra
       $servnum1 = "Número Desconocido";
   }

   // Realizar la consulta SQL para obtener los cuadros de impresión
   $query = "SELECT condes FROM tdicon WHERE connom = 'Serv. Num 2'";
   $result = $conn->query($query);
   $stmt = $conn->prepare($query);
   $stmt->execute();
   
   // Verifica si se encontró el usuario
   if ($stmt->rowCount() > 0) {
       $cont2 = $stmt->fetch(PDO::FETCH_ASSOC);
       $servnum2 = $cont2['condes'];
   } else {
       // Manejo de error si el usuario no se encuentra
       $servnum2 = "Número Desconocido";
   }

   // Realizar la consulta SQL para obtener los cuadros de impresión
   $query = "SELECT condes FROM tdicon WHERE connom = 'Serv. Num 3'";
   $result = $conn->query($query);
   $stmt = $conn->prepare($query);
   $stmt->execute();
   
   // Verifica si se encontró el usuario
   if ($stmt->rowCount() > 0) {
       $cont3 = $stmt->fetch(PDO::FETCH_ASSOC);
       $servnum3 = $cont3['condes'];
   } else {
       // Manejo de error si el usuario no se encuentra
       $servnum3 = "Número Desconocido";
   }

   // Realizar la consulta SQL para obtener los cuadros de impresión
   $query = "SELECT condes FROM tdicon WHERE connom = 'Apy. Num 1'";
   $result = $conn->query($query);
   $stmt = $conn->prepare($query);
   $stmt->execute();
   
   // Verifica si se encontró el usuario
   if ($stmt->rowCount() > 0) {
       $cont4 = $stmt->fetch(PDO::FETCH_ASSOC);
       $apynum1 = $cont4['condes'];
   } else {
       // Manejo de error si el usuario no se encuentra
       $apynum1 = "Número Desconocido";
   }

   // Realizar la consulta SQL para obtener los cuadros de impresión
   $query = "SELECT condes FROM tdicon WHERE connom = 'Apy. Num 2'";
   $result = $conn->query($query);
   $stmt = $conn->prepare($query);
   $stmt->execute();
   
   // Verifica si se encontró el usuario
   if ($stmt->rowCount() > 0) {
       $cont5 = $stmt->fetch(PDO::FETCH_ASSOC);
       $apynum2 = $cont5['condes'];
   } else {
       // Manejo de error si el usuario no se encuentra
       $apynum2 = "Número Desconocido";
   }

   // Realizar la consulta SQL para obtener los cuadros de impresión
   $query = "SELECT condes FROM tdicon WHERE connom = 'Apy. Num 3'";
   $result = $conn->query($query);
   $stmt = $conn->prepare($query);
   $stmt->execute();
   
   // Verifica si se encontró el usuario
   if ($stmt->rowCount() > 0) {
       $cont6 = $stmt->fetch(PDO::FETCH_ASSOC);
       $apynum3 = $cont6['condes'];
   } else {
       // Manejo de error si el usuario no se encuentra
       $apynum3 = "Número Desconocido";
   }

   // Realizar la consulta SQL para obtener los cuadros de impresión
   $query = "SELECT condes FROM tdicon WHERE connom = 'Ins. Num 1'";
   $result = $conn->query($query);
   $stmt = $conn->prepare($query);
   $stmt->execute();
   
   // Verifica si se encontró el usuario
   if ($stmt->rowCount() > 0) {
       $cont7 = $stmt->fetch(PDO::FETCH_ASSOC);
       $insnum1 = $cont7['condes'];
   } else {
       // Manejo de error si el usuario no se encuentra
       $insnum1 = "Número Desconocido";
   }

   // Realizar la consulta SQL para obtener los cuadros de impresión
   $query = "SELECT condes FROM tdicon WHERE connom = 'Ins. Num 2'";
   $result = $conn->query($query);
   $stmt = $conn->prepare($query);
   $stmt->execute();
   
   // Verifica si se encontró el usuario
   if ($stmt->rowCount() > 0) {
       $cont8 = $stmt->fetch(PDO::FETCH_ASSOC);
       $insnum2 = $cont8['condes'];
   } else {
       // Manejo de error si el usuario no se encuentra
       $insnum2 = "Número Desconocido";
   }

   // Realizar la consulta SQL para obtener los cuadros de impresión
   $query = "SELECT condes FROM tdicon WHERE connom = 'Ins. Num 3'";
   $result = $conn->query($query);
   $stmt = $conn->prepare($query);
   $stmt->execute();
   
   // Verifica si se encontró el usuario
   if ($stmt->rowCount() > 0) {
       $cont9 = $stmt->fetch(PDO::FETCH_ASSOC);
       $insnum3 = $cont9['condes'];
   } else {
       // Manejo de error si el usuario no se encuentra
       $insnum3 = "Número Desconocido";
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/Pefilpage.css">
    <!-- Agrega estas líneas al head de tu HTML para incluir Bootstrap y jQuery -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- Additional CSS Files -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

        <link rel="stylesheet" href="assets/css/templatemo-softy-pinko.css">

</head>
<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <img src="assets/images/logo.png" alt="INTT"/>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="user_page.php" class="active">Inicio</a></li>
                            <li><a href="user_page.php">Precios Solidarios</a></li>
                            <li><a href="user_page.php">Líneas Activas</a></li>

                            <li id="user-menu-trigger">
                                <a href="#">
                                    <img src="assets/images/user_icon.png" alt="">
                                </a>
                                <ul id="user-menu">
                                    <li><a href="perfil_page.php">Perfil</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>                        
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
<section class="perfil-usuario">
    <div class="contenedor-perfil">
        <div class="portada-perfil" style="background-image: url(assets/images/banner-bg.png);">
            <div class="sombra"></div>
            <div class="avatar-perfil">
                <img src="assets/images/perfil_img.png" alt="img">
                <a href="#" class="cambiar-foto">
                    <i class="fas fa-camera"></i> 
                    <span>Usuario</span>
                </a>
            </div>
            
            <div class="datos-perfil">
                <h4 class="titulo-usuario">Información de Cuenta</h4>
            </div>
        </div>
        <div class="menu-perfil">
            <ul>
                <li><a href="perfil_pageWork.php" title=""><i class="icono-perfil fas fa-bullhorn"></i> Información De usuario</a></li>
                <li><a href="perfil_pageWorkML.php" title=""><i class="icono-perfil fas fa-bullhorn"></i> Ver mapa libre</a></li>
                <li><a href="perfil_pageWorkVEH.php" title=""><i class="icono-perfil fas fa-info-circle"></i> Reporte</a></li>
                <li><a href="perfil_pageWorkAD.php" title=""><i class="icono-perfil fas fa-grin"></i>
            </ul>
        </div>
        <!--Vista de usuario-->
        <section>
            <br>
        <div class="row justify-content-center">
                <!-- ***** Pricing Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="pricing-item">
                        <div class="pricing-header">
                            <h3 class="pricing-title">Servicios</h3>
                        </div>
                        <div class="pricing-body">
                            <div class="price-wrapper">
                                <span class="currency">Ambulancia</span>
                            </div>
                            <ul class="list">
                                <li class="active"><?php echo $servnum1; ?></li>
                                <li class="active"><?php echo $servnum2; ?></li>
                                <li class="active"><?php echo $servnum3; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ***** Pricing Item End ***** -->

                <!-- ***** Pricing Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="pricing-item">
                        <div class="pricing-header">
                            <h3 class="pricing-title">Apoyo</h3>
                        </div>
                        <div class="pricing-body">
                            <div class="price-wrapper">
                                <span class="currency">Gruas</span>
                            </div>
                            <ul class="list">
                                <li class="active"><?php echo $apynum1; ?></li>
                                <li class="active"><?php echo $apynum2; ?></li>
                                <li class="active"><?php echo $apynum3; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ***** Pricing Item End ***** -->

                <!-- ***** Pricing Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="pricing-item">
                        <div class="pricing-header">
                            <h3 class="pricing-title">Instituto</h3>
                        </div>
                        <div class="pricing-body">
                            <div class="price-wrapper">
                                <span class="currency">INTT</span>
                            </div>
                            <ul class="list">
                                <li class="active"><?php echo $insnum1; ?></li>
                                <li class="active"><?php echo $insnum2; ?></li>
                                <li class="active"><?php echo $insnum3; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ***** Pricing Item End ***** -->
            </div>
        </section>
    </div>
</section>
<!--====  End of html  ====-->


</body>
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <!-- Menú de ícono de usuario: Archivo maestro de cambios específicos-->
    <script src="assets/js/AMespecifico.js"></script>
    
</html>