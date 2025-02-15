<?php

// Conexión a la base de datos
require '../database.php';

try {
    // Obtener los datos del formulario de edición desde la solicitud POST
    $conideId = $_POST['conId'];
    $nuevoCampo1 = $_POST['nuevoCampo1'];  // Reemplaza con el nombre real del campo

    // Realizar la actualización en la base de datos
    $stmt = $conn->prepare("UPDATE tdicon SET condes = :nuevoCampo1 WHERE conide = :conideId");
    $stmt->bindParam(':nuevoCampo1', $nuevoCampo1);
    $stmt->bindParam(':conideId', $conideId);
    $stmt->execute();

    echo "Contenido del home actualizados correctamente";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión a la base de datos
$conn = null;
?>



