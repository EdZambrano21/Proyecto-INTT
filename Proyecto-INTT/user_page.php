<?php
session_start();
require 'database.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
  }


    $query = "SELECT condes FROM tdicon WHERE connom = 'Título 3'";
   $result = $conn->query($query);
   $stmt = $conn->prepare($query);
   $stmt->execute();
   
   // Verifica si se encontró el usuario
   if ($stmt->rowCount() > 0) {
       $cont5 = $stmt->fetch(PDO::FETCH_ASSOC);
       $titulo3 = $cont5['condes'];
   } else {
       // Manejo de error si el usuario no se encuentra
       $titulo3 = "Título Desconocido";
   }

   $query = "SELECT condes FROM tdicon WHERE connom = 'Párrafo 3'";
   $result = $conn->query($query);
   $stmt = $conn->prepare($query);
   $stmt->execute();
   
   // Verifica si se encontró el usuario
   if ($stmt->rowCount() > 0) {
       $cont6 = $stmt->fetch(PDO::FETCH_ASSOC);
       $parrafo3 = $cont6['condes'];
   } else {
       // Manejo de error si el usuario no se encuentra
       $parrafo3 = "Párrafo Desconocido";
   }

   $query = "SELECT condes FROM tdicon WHERE connom = 'Precio 1 RC'";
   $result = $conn->query($query);
   $stmt = $conn->prepare($query);
   $stmt->execute();
   
   // Verifica si se encontró el usuario
   if ($stmt->rowCount() > 0) {
       $cont7= $stmt->fetch(PDO::FETCH_ASSOC);
       $precio1 = $cont7['condes'];
   } else {
       // Manejo de error si el usuario no se encuentra
       $precio1 = "Precio Desconocido";
   }

   $query = "SELECT condes FROM tdicon WHERE connom = 'Conv. Precio 1'";
   $result = $conn->query($query);
   $stmt = $conn->prepare($query);
   $stmt->execute();
   
   // Verifica si se encontró el usuario
   if ($stmt->rowCount() > 0) {
       $cont8= $stmt->fetch(PDO::FETCH_ASSOC);
       $convprecio1 = $cont8['condes'];
   } else {
       // Manejo de error si el usuario no se encuentra
       $convprecio1 = "Precio Desconocido";
   }

   $query = "SELECT condes FROM tdicon WHERE connom = 'Precio 2 RL'";
   $result = $conn->query($query);
   $stmt = $conn->prepare($query);
   $stmt->execute();
   
   // Verifica si se encontró el usuario
   if ($stmt->rowCount() > 0) {
       $cont9= $stmt->fetch(PDO::FETCH_ASSOC);
       $precio2 = $cont9['condes'];
   } else {
       // Manejo de error si el usuario no se encuentra
       $precio2 = "Precio Desconocido";
   }

   $query = "SELECT condes FROM tdicon WHERE connom = 'Conv. Precio 2'";
   $result = $conn->query($query);
   $stmt = $conn->prepare($query);
   $stmt->execute();
   
   // Verifica si se encontró el usuario
   if ($stmt->rowCount() > 0) {
       $cont8= $stmt->fetch(PDO::FETCH_ASSOC);
       $convprecio2 = $cont8['condes'];
   } else {
       // Manejo de error si el usuario no se encuentra
       $convprecio2 = "Precio Desconocido";
   }
?>

<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Página web para el servicio de las unidades urbanas en el estado Táchira, Venezuela.">
    <meta name="author" content="Eazyd">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">

    <title>Transporte Seguro / Táchira</title>
<!--
SOFTY PINKO
https://templatemo.com/tm-535-softy-pinko
-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-softy-pinko.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
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
                            <li><a href="#welcome" class="active">Inicio</a></li>
                            <li><a href="#pricing-plans">Precios Solidarios</a></li>
                            <li><a href="#work-process">Líneas Activas</a></li>

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

    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-sm-12">
                        <h1>Servicio de <strong>Transporte Urbano</strong><br>al alcance de<strong> ti</strong></h1>
                        <a href="#features" class="main-button-slider">Descubre Más</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Features Small Start ***** -->
    <section class="section home-feature">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- ***** Features Small Item Start ***** -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                            <div class="features-small-item">
                                <div class="icon">
                                    <i><img src="assets/images/featured-item-01.png" alt=""></i>
                                </div>
                                <h5 class="features-title">Rutas</h5>
                                <p>Conoce las rutas que está en funcionamiento</p>
                            </div>
                        </div>
                        <!-- ***** Features Small Item End ***** -->

                        <!-- ***** Features Small Item Start ***** -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
                            <div class="features-small-item">
                                <div class="icon">
                                    <i><img src="assets/images/featured-item-01.png" alt=""></i>
                                </div>
                                <h5 class="features-title">Noticias actualizadas</h5>
                                <p>No te pierdas de la actualidad</p>
                            </div>
                        </div>
                        <!-- ***** Features Small Item End ***** -->

                        <!-- ***** Features Small Item Start ***** -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
                            <div class="features-small-item">
                                <div class="icon">
                                    <i><img src="assets/images/featured-item-01.png" alt=""></i>
                                </div>
                                <h5 class="features-title">Escoge el municipio</h5>
                                <p>Busca los servicios de tú interés</p>
                            </div>
                        </div>
                        <!-- ***** Features Small Item End ***** -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Small End ***** -->

    <!-- ***** Pricing Plans Start ***** -->
    <section class="section colored" id="pricing-plans">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title"><?php echo $titulo3; ?></h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p><?php echo $parrafo3; ?></p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row justify-content-center">
                <!-- ***** Pricing Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                    <div class="pricing-item">
                        <div class="pricing-header">
                            <h3 class="pricing-title">Rutas Cortas</h3>
                        </div>
                        <div class="pricing-body">
                            <div class="price-wrapper">
                                <span class="currency"><?php echo $precio1; ?></span>
                                <span class="period"><?php echo $convprecio1; ?></span>
                            </div>
                            <ul class="list">
                                <li class="active">Casco de la ciudad</li>
                                <li class="active">21 de Mayo</li>
                                <li class="active">Romulo Gallegos</li>
                                <li class="active">Transporte San Cristóbal</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ***** Pricing Item End ***** -->

                <!-- ***** Pricing Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
                    <div class="pricing-item">
                        <div class="pricing-header">
                            <h3 class="pricing-title">Rutas Largas</h3>
                        </div>
                        <div class="pricing-body">
                            <div class="price-wrapper">
                                <span class="currency"><?php echo $precio2; ?></span>
                                <span class="period"><?php echo $convprecio2; ?></span>
                            </div>
                            <ul class="list">
                                <li class="active">Rutas inter-municipales</li>
                                <li class="active">Intercomunal</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ***** Pricing Item End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Pricing Plans End ***** --> 

    <!-- ***** Home Parallax Start ***** -->
    <section class="mini" id="work-process">
        <div class="mini-content">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="info">
                            <h1>Conoce las rutas</h1>
                            <p>Rutas disponibles dentro del municipio</p>
                        </div>
                    </div>
                </div>

                <!-- ***** Mini Box Start ***** -->
                    <div class="row justify-content-center">
                        <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                            <div class="mini-box">
                                <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                                <a href="ruta1.php"><strong>Intercomunal</strong></a>
                                <span>RUTA B</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                            <div class="mini-box">
                                <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                                <a href="ruta2.php"><strong>Transporte San Cristóbal</strong></a>
                                <span>RUTA A</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                            <div class="mini-box">
                                <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                                <a href="ruta3.php"><strong>21 de Mayo</strong></a>
                                <span>RUTA A</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                            <div class="mini-box">
                                <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                                <a href="ruta4.php"><strong>Romulo Gallegos</strong></a>
                                <span>RUTA B</span>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Mini Box End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Home Parallax End ***** -->
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright">Copyright &copy; 2023 Eazyd</p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>
    <!-- Menú de ícono de usuario: Archivo maestro de cambios específicos-->
    <script src="assets/js/AMespecifico.js"></script>

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

  </body>
</html>
