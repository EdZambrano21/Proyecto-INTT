<?php

// Conexión a la base de datos
require '../../database.php';

try {
    // Obtener los datos del formulario de edición desde la solicitud POST
    $vehiculoId = $_POST['vehiculoId'];
    $nuevoCampo1 = $_POST['nuevoCampo1'];  // Reemplaza con el nombre real del campo

    // Realizar la actualización en la base de datos
    $stmt = $conn->prepare("UPDATE tmaveh SET vehest = :nuevoCampo1 WHERE vehcha = :vehiculoId");
    $stmt->bindParam(':nuevoCampo1', $nuevoCampo1);
    $stmt->bindParam(':vehiculoId', $vehiculoId);
    $stmt->execute();

    echo "Datos del vehículo actualizados correctamente";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión a la base de datos
$conn = null;
?>

