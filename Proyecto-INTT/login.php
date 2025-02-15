<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password, usrest FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      //header("Location: index.php");
      if ($results['usrest'] == 1) {
        header("Location: user_page.php");
        exit();
    } elseif ($results['usrest'] == 2) {
        header("Location: user_adminpage.php");
        exit();
    } elseif ($results['usrest'] == 3) {
        header("Location: user_workpage.php");
        exit();
    }


    } else {
      $message = 'Disculpa, los datos no son correctos.';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inicia Sesión</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/LoginTemplate.css">
</head>
  <body>

     <!--Formulario que vamos armando de la plantilla-->
    <div class="container">
        
        <div class="screen">
            <div class="screen__content">
                <div>
                    <a href="index.php" class="HomeA">
                        <span class="button__text">Home</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </a>
                </div>
                <div class="logo">
                    <img src="assets/images/logo.png" alt="INTT" >
                </div>
                <form class="login" action="login.php" method="POST">
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input name="email" type="text" class="login__input" placeholder="Ingresa tu email" required>
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input id="password" name="password" type="password" class="login__input" placeholder="Ingresa tu contraseña" required>
                    </div>
                    <div class="form-group mb-4">
						<input type="checkbox" id="vercon" name="vercon" aria-label="Mostrar contraseña">
    					<label for="vercon">Mostrar contraseña</label>
					</div>
                    <div>
                      <a href="signup.php">Crear Cuenta</a>
                    </div>
                    <button class="button login__submit">
                        <span class="button__text" type="submit" value="Submit">Inicia Sesión</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>				
                </form>

                <!-- Logos para asociar el login con otras cuentas-->
                <div class="social-login">
                    <h3>Servicio a tu alcance.</h3>
                    <div class="social-icons">
                        <a href="https://www.Instagram.com" class="social-login__icon">
                            <img src="assets/images/InstagramLogo.png" alt="Instagram">
                        </a>
                        <a href="https://www.facebook.com" class="social-login__icon">
                            <img src="assets/images/FacebookLogo.png" alt="Facebook">
                        </a>
                        <a href="https://www.Twitter.com" class="social-login__icon">
                            <img src="assets/images/TwitterLogo.png" alt="Twitter">
                        </a>
                    </div>
                </div>                
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>
  </body>
 <!--Script para validar el login-->
 <script src="assets/js/login_validation.js"></script>
</html>