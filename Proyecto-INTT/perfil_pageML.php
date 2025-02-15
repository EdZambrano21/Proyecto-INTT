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
                <li><a href="perfil_page.php" title=""><i class="icono-perfil fas fa-bullhorn"></i> Información De usuario</a></li>
                <li><a href="perfil_pageML.php" title=""><i class="icono-perfil fas fa-info-circle"></i> Ver mapa libre</a></li>
                <li><a href="perfil_pageAD.php" title=""><i class="icono-perfil fas fa-grin"></i> Ayuda</a></li>
            </ul>
        </div>
        <!--Vista de usuario-->
        <section>
            <section class="py-3">
                <div class="row align-items-center">
                    <!-- ***** Pricing Item Start ***** -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="pricing-item">
                            <div class="pricing-header">
                                <h3 class="pricing-title">Nuestro Mapa Libre</h3>
                            </div>
                            <div class="pricing-body">
                                <div class="price-wrapper">
                                    <span class="currency">¡Explora!</span>
                                </div>
                                <ul class="list">
                                    <li class="active">Conoce el área beneficiada por nuestros servicios de transporte urbano.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Pricing Item End ***** -->
                    <div class="col-md-8">
                        <div class="chart-responsive bg-white p-1 rounded">
                            <!-- MAPA DE LA CIUDAD -->
                            <div class="embed-responsive embed-responsive-16by9" style="width: 100%; height: 100%;">
                                <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126504.4623639908!2d-72.30416284721822!3d7.761754370694898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e666ca49582d39f%3A0xe35525b271c7ef85!2zU2FuIENyaXN0w7NiYWwsIFTDoWNoaXJh!5e0!3m2!1ses!2sve!4v1704576476100!5m2!1ses!2sve" style="border: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div><!-- /.mapa-responsive -->
                    </div><!-- /.col -->
                </div>
            </section>
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