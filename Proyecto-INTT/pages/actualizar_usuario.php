<?php

// Conexión a la base de datos
require '../database.php';

try {
    // Obtener los datos del formulario de edición desde la solicitud POST
    $Id = $_POST['Id'];
    $nuevoCampo1 = $_POST['nuevoCampo1'];  // Reemplaza con el nombre real del campo

    // Realizar la actualización en la base de datos
    $stmt = $conn->prepare("UPDATE users SET usrest = :nuevoCampo1 WHERE id = :Id");
    $stmt->bindParam(':nuevoCampo1', $nuevoCampo1);
    $stmt->bindParam(':Id', $Id);
    $stmt->execute();

    echo "Dato del usuario actualizado correctamente";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión a la base de datos
$conn = null;
?>



