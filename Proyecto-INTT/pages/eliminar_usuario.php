<?php

// Conexión a la base de datos
require '../database.php';

try {
    // Establecer el modo de error de PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener el ID del usuario de la solicitud AJAX
    $userId = $_POST['Id']; // Usa el mismo nombre que especificaste en data: { Id: Id } en tu solicitud AJAX

    // Preparar la consulta SQL para eliminar al usuario
    $stmt = $conn->prepare("DELETE FROM users WHERE id = :userId");

    // Asignar el valor del parámetro
    $stmt->bindParam(':userId', $userId);

    // Ejecutar la consulta
    $stmt->execute();

    // Devolver una respuesta de éxito al cliente (puedes personalizar esto según tus necesidades)
    echo "Usuario eliminado con éxito";

} catch (PDOException $e) {
    // Manejar errores de la base de datos
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión a la base de datos
$conn = null;
?>
