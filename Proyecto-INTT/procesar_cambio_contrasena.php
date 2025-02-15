<?php
// procesar_cambio_contrasena.php

require 'database.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nuevaContrasena = $_POST['nueva_contrasena'];
    $confirmarContrasena = $_POST['confirmar_contrasena'];

    // Verifica que las contraseñas coincidan
    if ($nuevaContrasena === $confirmarContrasena) {
        // Hash de la nueva contraseña
        $hashedContrasena = password_hash($nuevaContrasena, PASSWORD_DEFAULT);

        // Actualiza la contraseña en la base de datos
        $userId = $_SESSION['user_id'];
        $query = "UPDATE users SET password = :password WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':password', $hashedContrasena);
        $stmt->bindParam(':id', $userId);
        $stmt->execute();

        echo "Contraseña actualizada con éxito.";
        header('Location: user_page.php');
        exit();
    } else {
        echo "Las contraseñas no coinciden. Intenta de nuevo.";
        header('Location: user_page.php');
        exit();
    }
} else {
    echo "Acceso no permitido.";
    header('Location: user_page.php');
    exit();
}
?>