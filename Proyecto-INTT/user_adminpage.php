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
    $query = "SELECT id, username FROM users WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $userId);
    $stmt->execute();
    
    // Verifica si se encontró el usuario
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $username = $user['username'];
    } else {
        // Manejo de error si el usuario no se encuentra
        $username = "Usuario Desconocido";
    }
} else {
    // Manejo de error si el usuario no ha iniciado sesión
    $username = "Usuario Desconocido";
}

     // Consulta SQL para contar usuarios
     $sql = "SELECT COUNT(*) as totalUsuarios FROM users";
     $stmt = $conn->query($sql);
 
     // Obtener el total de usuarios
     $totalUsuarios = $stmt->fetchColumn();

     // Consulta SQL para contar buses
     $sql = "SELECT COUNT(*) as totalBuses FROM tmaveh";
     $stmt = $conn->query($sql);
 
     // Obtener el total de buses
     $totalBuses = $stmt->fetchColumn();

     // Consulta SQL para contar propietarios
     $sql = "SELECT COUNT(*) as totalPropietarios FROM tmapro";
     $stmt = $conn->query($sql);
 
     // Obtener el total de propietarios
     $totalPropietarios = $stmt->fetchColumn();

    // Consulta SQL para contar lineas
    $sql = "SELECT COUNT(*) as totalLineas FROM tdilit";
    $stmt = $conn->query($sql);

    // Obtener el total de lineas
    $totalLineas = $stmt->fetchColumn();

    // Consulta SQL para contar evaluaciones
    $sql = "SELECT COUNT(evtest = 'En Espera') as totalEvaluaciones FROM tmaevt";
    $stmt = $conn->query($sql);

    // Obtener el total de evaluaciones
    $totalEvaluaciones = $stmt->fetchColumn();

    // Consulta SQL para contar solicitudes
    $sql = "SELECT COUNT(*) as totalSolicitudes FROM tmasaf";
    $stmt = $conn->query($sql);

    // Obtener el total de solicitudes
    $totalSolicitudes = $stmt->fetchColumn();

    // Consulta SQL para contar choferes
    $sql = "SELECT COUNT(*) as totalChoferes FROM tmacho";
    $stmt = $conn->query($sql);

    // Obtener el total de choferes
    $totalChoferes = $stmt->fetchColumn();
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin | INTT</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="user_adminpage.php" class="logo"><b>Admin</b> INNT</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/user2-160x160.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $username; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.png" class="img-circle" alt="User Image" />
                    <p>
                      Administrador <br> Del Sistema
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="perfil_admin_page.php" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Cerrar Sesión</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Búsqueda..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">PANEL PRINCIPAL</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Buses y Conductores</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/forms/general.php"><i class="fa fa-circle-o"></i>Agregar Conductores</a></li>
                <li><a href="pages/forms/general2.php"><i class="fa fa-circle-o"></i>Agregar Buses</a></li>
                <li><a href="pages/forms/general3.php"><i class="fa fa-circle-o"></i>Agregar Solicitud</a></li>
                <li><a href="pages/forms/general4.php"><i class="fa fa-circle-o"></i>Agregar Choferes</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Tablas de Vistas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/tables/tablaconductores.php"><i class="fa fa-circle-o"></i> Ver Propietarios</a></li>
                <li><a href="pages/tables/tablabuses.php"><i class="fa fa-circle-o"></i> Ver Buses</a></li>
                <li><a href="pages/tables/tablachoferes.php"><i class="fa fa-circle-o"></i> Ver Conductores</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Solicitudes y Cupos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/applications and quotas/tablaSolicitudes.php"><i class="fa fa-circle-o"></i> Ver solicitudes</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Evaluaciones técnicas <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Ver Evaluaciones</a></li>
                    <li>
                      <a href="#"><i class="fa fa-circle-o"></i> Realizar Evaluación <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a href="pages/applications and quotas/generarresultado.php"><i class="fa fa-circle-o"></i> Resultados</a></li>
                        <li><a href="pages/applications and quotas/generarconsulta.php"><i class="fa fa-circle-o"></i> Consulta</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="pages/applications and quotas/tablaCupos.php"><i class="fa fa-circle-o"></i> Consultar Cupos</a></li>
              </ul>
            </li>
            <li><a href="pages/editar_lineas.php"><i class="fa fa-bookmark"></i> Editar Lineas</a></li>
            <li><a href="pages/editar_home.php"><i class="fa fa-home"></i> Editar Página Principal</a></li>
            <li><a href="pages/asignar_usuarios.php"><i class="fa fa-users"></i> Control de Usuarios</a></li>      
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Inicio
            <small>Página principal</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="user_adminpage.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion-person-stalker"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Usuarios totales</span>
                  <span class="info-box-number">
                    <?php
                      //Imprimir
                      // Mostrar el resultado en la página
                      echo $totalUsuarios;
                    ?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion-android-bus"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Buses Registrados</span>
                  <span class="info-box-number">

                    <?php
                      //Imprimir
                      // Mostrar el resultado en la página
                      echo $totalBuses;
                    ?>

                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion-android-contacts"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Conductores Activos</span>
                  <span class="info-box-number">

                  <?php
                      //Imprimir
                      // Mostrar el resultado en la página
                      echo $totalPropietarios;
                    ?>

                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Mapa de zona beneficiada: Ciudad de San Cristóbal</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    
                    <div class="col-md-8">
                        <div class="chart-responsive">
                            <!-- MAPA DE LA CIUDAD -->
                            <div class="embed-responsive embed-responsive-4by3" style="width:100%; height:100%;">
                                <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126504.4623639908!2d-72.30416284721822!3d7.761754370694898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e666ca49582d39f%3A0xe35525b271c7ef85!2zU2FuIENyaXN0w7NiYWwsIFTDoWNoaXJh!5e0!3m2!1ses!2sve!4v1704576476100!5m2!1ses!2sve" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div><!-- /.mapa-responsive -->
                    </div><!-- /.col -->

                    <!--BARRA LATERAL DEL MAPA INICIO-->

                    <div>
                      <div class="col-md-4">
                      <!-- Info Boxes Style 2 -->
                      <div class="info-box bg-yellow">
                        <span class="info-box-icon"><i class="ion-android-checkmark-circle"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Lineas disponibles</span>
                          <br>
                          <span class="info-box-number">
                          <?php
                            //Imprimir
                            // Mostrar el resultado en la página
                            echo $totalLineas;
                          ?>
                          </span>
                        </div><!-- /.info-box-content -->
                      </div><!-- /.info-box -->
                      <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="ion-ios-book"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Total de evaluaciones</span>
                          <br>
                          <span class="info-box-number">
                          <?php
                            //Imprimir
                            // Mostrar el resultado en la página
                            echo $totalEvaluaciones;
                          ?>
                          </span>
                        </div><!-- /.info-box-content -->
                      </div><!-- /.info-box -->
                      <div class="info-box bg-red">
                        <span class="info-box-icon"><i class="ion-android-alert"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Total de solicitudes</span>
                          <span class="info-box-text">(En espera)</span>
                          <span class="info-box-number">
                          <?php
                            //Imprimir
                            // Mostrar el resultado en la página
                            echo $totalSolicitudes;
                          ?>
                          </span>
                        </div><!-- /.info-box-content -->
                      </div><!-- /.info-box -->
                      <div class="info-box bg-aqua">
                        <span class="info-box-icon"><i class="ion-tshirt"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Avances disponibles</span>
                          <br>
                          <span class="info-box-number">
                          <?php
                            //Imprimir
                            // Mostrar el resultado en la página
                            echo $totalChoferes;
                          ?>
                          </span>
                        </div><!-- /.info-box-content -->
                      </div><!-- /.info-box -->
                    </div><!-- /.col -->
                    </div><!-- /.col -->

                    <!--BARRA LATERAL DEL MAPA FIN-->
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>