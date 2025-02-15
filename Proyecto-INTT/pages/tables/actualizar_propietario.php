<?php

// Conexión a la base de datos
require '../../database.php';

try {
    // Obtener los datos del formulario de edición desde la solicitud POST
    $propietarioId = $_POST['propietarioId'];
    $nuevoCampo1 = $_POST['nuevoCampo1'];  // Reemplaza con el nombre real del campo
    $nuevoCampo2 = $_POST['nuevoCampo2']; 
    $nuevoCampo3 = $_POST['nuevoCampo3']; 
    $nuevoCampo4 = $_POST['nuevoCampo4']; 

    // Realizar la actualización en la base de datos
    $stmt = $conn->prepare("UPDATE tmapro SET protef = :nuevoCampo1, protem = :nuevoCampo2, prodir = :nuevoCampo3, procor = :nuevoCampo4 WHERE proced = :propietarioId");
    $stmt->bindParam(':nuevoCampo1', $nuevoCampo1);
    $stmt->bindParam(':nuevoCampo2', $nuevoCampo2);
    $stmt->bindParam(':nuevoCampo3', $nuevoCampo3);
    $stmt->bindParam(':nuevoCampo4', $nuevoCampo4);
    $stmt->bindParam(':propietarioId', $propietarioId);
    $stmt->execute();

    echo "Datos del vehículo actualizados correctamente";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión a la base de datos
$conn = null;
?>



