<?php

require '../database.php';

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

  //RESPUESTAS PARA EL LLAMADO DE LAS FUNCIONES EN PHP

  //Impresión de contenido en PHP
  //Realizar la consulta SQL para obtener los cuadros de impresión

   //Llamamos todos los campos
   $query = "SELECT * FROM tdilit";
   $result = $conn->query($query);
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin | INTT</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

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
        <a href="../user_adminpage.php" class="logo"><b>Admin</b> INNT</a>
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
                  <img src="../dist/img/user2-160x160.png" class="user-image" alt="User Image"/>
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
                      <a href="../perfil_admin_page.php" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="../logout.php" class="btn btn-default btn-flat">Cerrar Sesión</a>
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
                <li><a href="forms/general.php"><i class="fa fa-circle-o"></i>Agregar Conductores</a></li>
                <li><a href="forms/general2.php"><i class="fa fa-circle-o"></i>Agregar Buses</a></li>
                <li><a href="forms/general3.php"><i class="fa fa-circle-o"></i>Agregar Solicitud</a></li>
                <li><a href="forms/general4.php"><i class="fa fa-circle-o"></i>Agregar Choferes</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Tablas de Vistas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="tables/tablaconductores.php"><i class="fa fa-circle-o"></i> Ver Propietarios</a></li>
                <li><a href="tables/tablabuses.php"><i class="fa fa-circle-o"></i> Ver Buses</a></li>
                <li><a href="tables/tablachoferes.php"><i class="fa fa-circle-o"></i> Ver Conductores</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Solicitudes y Cupos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="applications and quotas/tablaSolicitudes.php"><i class="fa fa-circle-o"></i> Ver solicitudes</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Evaluaciones técnicas <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Ver Evaluaciones</a></li>
                    <li>
                      <a href="#"><i class="fa fa-circle-o"></i> Realizar Evaluación <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a href="applications and quotas/generarresultado.php"><i class="fa fa-circle-o"></i> Resultados</a></li>
                        <li><a href="applications and quotas/generarconsulta.php"><i class="fa fa-circle-o"></i> Consulta</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="applications and quotas/tablaCupos.php"><i class="fa fa-circle-o"></i> Consultar Cupos</a></li>
              </ul>
            </li>
            <li><a href="editar_lineas.php"><i class="fa fa-bookmark"></i> Editar Lineas</a></li>
            <li><a href="editar_home.php"><i class="fa fa-home"></i> Editar Página Principal</a></li>
            <li><a href="asignar_usuarios.php"><i class="fa fa-users"></i> Control de Usuarios</a></li>    
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Rutas
            <small>Lineas de Transporte</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="../user_adminpage.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="editar_lineas.php">Editar Lineas</a></li>
          </ol>
        </section>

        <!-- Main content -->
            <!--ADMIN CON FORMULARIOS QUE PERMITE MODIFICAR TODO EL INDEX/USER_PAGE DE LA PÁGINA-->
                <!-- Tabla para "Ruta Corta" -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Lineas de transporte inscritas - Ruta Corta</h3>
                                </div>
                                <div class="box-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Número de ruta</th>
                                            <th>Nombre</th>
                                            <th>Ubicación</th>
                                            <th>Teléfono</th>
                                            <th>Ruta asignada</th>
                                            <th>Horario</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            // Función para obtener resultados por tipo
                                            function obtenerResultadosPorTipo($tipo, $conn)
                                            {
                                                // Realizar la consulta y devolver el conjunto de resultados
                                                // Asegúrate de ajustar la consulta según tus necesidades
                                                $consulta = "SELECT * FROM tdilit WHERE littip = :tipo";
                                                $stmt = $conn->prepare($consulta);
                                                $stmt->bindParam(':tipo', $tipo);
                                                $stmt->execute();
                                                return $stmt;
                                            }

                                            // Obtener los resultados para "Ruta Corta"
                                            $resultRutaCorta = obtenerResultadosPorTipo('Ruta Corta', $conn);

                                            // Iterar sobre los resultados y mostrar solo las filas con "littip" igual a "Ruta Corta"
                                            while ($row = $resultRutaCorta->fetch(PDO::FETCH_ASSOC)) {
                                                // Agregar la condición para imprimir solo las filas con "littip" igual a "Ruta Corta"
                                                echo "<tr>";
                                                echo "<td>{$row['litide']}</td>";
                                                echo "<td>{$row['litnom']}</td>";
                                                echo "<td>{$row['litdir']}</td>";
                                                echo "<td>{$row['littel']}</td>";
                                                echo "<td>{$row['littip']}</td>";
                                                echo "<td>" . obtenerHorario($row['horpri']) . "</td>";
                                                echo "<td><button class='btn btn-primary editar-btn' data-toggle='modal' data-target='#editarModal' data-id='{$row['litide']}'>Editar</button></td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Tabla para "Ruta Larga" -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Lineas de transporte inscritas - Ruta Larga</h3>
                                </div>
                                <div class="box-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Número de ruta</th>
                                                <th>Nombre</th>
                                                <th>Ubicación</th>
                                                <th>Teléfono</th>
                                                <th>Ruta asignada</th>
                                                <th>Horario</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                // Obtener los resultados para "Ruta Corta"
                                                $resultRutaLarga = obtenerResultadosPorTipo('Ruta Larga', $conn);

                                                // Iterar sobre los resultados y mostrar solo las filas con "littip" igual a "Ruta Corta"
                                                while ($row = $resultRutaLarga->fetch(PDO::FETCH_ASSOC)) {
                                                    // Agregar la condición para imprimir solo las filas con "littip" igual a "Ruta Larga"
                                                    echo "<tr>";
                                                    echo "<td>{$row['litide']}</td>";
                                                    echo "<td>{$row['litnom']}</td>";
                                                    echo "<td>{$row['litdir']}</td>";
                                                    echo "<td>{$row['littel']}</td>";
                                                    echo "<td>{$row['littip']}</td>";
                                                    echo "<td>" . obtenerHorario($row['horpri']) . "</td>";
                                                    echo "<td><button class='btn btn-primary editar-btn' data-toggle='modal' data-target='#editarModal' data-id='{$row['litide']}'>Editar</button></td>";
                                                    echo "</tr>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
                  // Función para obtener el horario según el valor de "horpri"
                  function obtenerHorario($valor)
                  {
                      switch ($valor) {
                          case 1:
                              return "Diurno";
                          case 2:
                              return "Nocturno";
                          case 3:
                              return "Ambos turnos";
                          default:
                              return "Desconocido";
                      }
                  }
                ?>
              </div><!-- /.content-wrapper -->
              <footer class="main-footer">
                <div class="pull-right hidden-xs">
                  <b>Version</b> 2.0
                </div>
                <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
              </footer>
            <!--ADMIN CON FORMULARIOS QUE PERMITE MODIFICAR TODO EL INDEX/USER_PAGE DE LA PÁGINA-->
      </div><!-- /.content-wrapper -->
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="../plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="../plugins/chartjs/Chart.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard2.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js" type="text/javascript"></script>

    

    <script>
    $(document).ready(function () {
        // Captura el evento de clic en un botón de editar
        $('.editar-btn').click(function () {
            // Obtiene el ID del vehículo desde el botón
            var litideId = $(this).data('id');

            // Realiza una petición AJAX para obtener los datos del vehículo
            $.ajax({
                url: 'obtener_lineas.php', // Reemplaza con el nombre de tu archivo PHP para obtener datos del vehículo
                method: 'POST',
                data: { litideId: litideId },
                dataType: 'json',
                success: function (data) {
                    // Rellena el formulario de edición con los datos del vehículo
                    $('#litId').val(data.litide);
                    $('#nuevoCampo1').val(data.litdir);
                    $('#nuevoCampo2').val(data.littel);
                    $('#nuevoCampo3').val(data.littip);
                    $('#nuevoCampo4').val(data.horpri);
                    // Agrega más líneas según sea necesario para otros campos
                },
                error: function () {
                    alert('Error al obtener datos de la linea');
                }
            });
        });

        // Captura el evento de envío del formulario de edición
        $('#editarForm').submit(function (e) {
            e.preventDefault();

            // Petición AJAX para actualizar los datos del vehículo
            $.ajax({
                url: 'actualizar_lineas.php',
                method: 'POST',
                data: $(this).serialize(),
                success: function () {
                    // Cierra el modal
                    $('#editarModal').modal('hide');
                    // Actualiza la tabla (deberías implementar la lógica para recargar los datos)
                    location.reload(); // Esto recarga toda la página; ajusta según tus necesidades
                },
                error: function () {
                    alert('Error al actualizar contenido de la linea');
                }
            });
        });
    });
    </script>

  </body>
  <!-- Modal de Edición -->
  <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Editar linea de transporte</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <!-- Aquí irá el formulario de edición -->
                  <form id="editarForm">
                      <input type="hidden" id="litId" name="litId">
                      <!-- Agrega los campos que desees editar -->
                        <div class="form-group">
                            <label for="nuevoCampo1">Dirección de linea:</label>
                            <input type="text" class="form-control" id="nuevoCampo1" name="nuevoCampo1" required>
                        </div>

                        <div class="form-group">
                            <label for="nuevoCampo1">Teléfono de la linea:</label>
                            <input type="number" class="form-control" id="nuevoCampo2" name="nuevoCampo2" required>
                        </div>

                        <div class="form-group">
                          <label for="nuevoCampo3">Tipo de ruta</label>
                          <select class="form-control" id="nuevoCampo3" name="nuevoCampo3" required>
                            <option value="Ruta Corta">Ruta Corta</option>
                            <option value="Ruta Larga">Ruta Larga</option>
                            <option value="Ruta Corta/Larga">Ambas Rutas</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="nuevoCampo4">Tipo de ruta</label>
                          <select class="form-control" id="nuevoCampo4" name="nuevoCampo4" required>
                            <option value="1">Diurno</option>
                            <option value="2">Nocturno</option>
                            <option value="3">Ambos Horarios</option>
                          </select>
                        </div>
                      <!-- Agrega más campos según sea necesario -->
                      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</html>