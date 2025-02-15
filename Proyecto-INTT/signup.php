<?php

require 'database.php';

if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    
    // Verificar si el nickname ya existe
    $checkUsername = "SELECT COUNT(*) FROM users WHERE username = :username";
    $checkStmt = $conn->prepare($checkUsername);
    $checkStmt->bindParam(':username', $_POST['username']);
    $checkStmt->execute();
    
    if ($checkStmt->fetchColumn() > 0) {
        // El nickname ya existe, mostrar un mensaje de error con JavaScript
        echo '<script>alert("El Nickname ya existe, escoje otro.");</script>';
    } else {
        // Si no existe, proceder con la inserción
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $_POST['username']);
        $stmt->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            header("Location: user_page.php");
            exit();
        } else {
            header("Location: signup.php");
            exit();
        }
    }
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Crear Cuenta</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/LoginTemplate.css">
  </head>
  <body>
    
    <!--Validación-->
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>  

     <!--Formulario que vamos armando de la plantilla-->
    <div class="container">
        
        <div class="screen">
            <div class="screen__content">
                <div class="PosiciónDiv">
                    <div>
                        <a href="index.php" class="HomeA">
                            <span class="button__text">Home</span>
                            <i class="button__icon fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <div>
                        <a href="login.php" class="IniciarA">
                            <span class="button__text">Iniciar Sesión</span>
                            <i class="button__icon fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
                <form class="login" action="signup.php" method="POST" id="formulario">
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input name="username" type="text" class="login__input" placeholder="Ingresa tu nickname" required>
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input name="email" type="text" class="login__input" placeholder="Ingresa tu email" required id="email">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input name="password" type="password" class="login__input" placeholder="Ingresa tu contraseña" required id="password">
                    </div>
                    <div class="form-group mb-4">
						<input type="checkbox" id="show-password-1" name="show-password" aria-label="Mostrar contraseña">
    					<label for="show-password">Mostrar contraseña</label>
					</div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input name="confirm_password" type="password" class="login__input" placeholder="Confirmar" required  id="password2">
                    </div>
                    <div class="form-group mb-4">
						<input type="checkbox" id="show-password-2" name="show-password" aria-label="Mostrar contraseña">
    					<label for="show-password">Mostrar contraseña</label>
					</div>
                    <button class="AceptarA">
                        <span class="button__text" type="submit" value="Submit">Aceptar</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>				
                </form>

                <!-- Logos para asociar el login con otras cuentas-->
                <div class="social-login">
                    <h3>Sé parte de nosotros.</h3>
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
<!--Script para validar el registrar usuario-->
<script src="assets/js/signup_validation.js"></script>
</html>
