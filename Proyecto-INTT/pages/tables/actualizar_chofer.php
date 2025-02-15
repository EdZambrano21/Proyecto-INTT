<?php

// Conexión a la base de datos
require '../../database.php';

try {
    // Obtener los datos del formulario de edición desde la solicitud POST
    $choferId = $_POST['choferId'];
    $nuevoCampo1 = $_POST['nuevoCampo1'];  // Reemplaza con el nombre real del campo
    $nuevoCampo2 = $_POST['nuevoCampo2']; 
    $nuevoCampo3 = $_POST['nuevoCampo3']; 
    $nuevoCampo4 = $_POST['nuevoCampo4'];
    $nuevoCampo5 = $_POST['nuevoCampo5'];  

    // Realizar la actualización en la base de datos
    $stmt = $conn->prepare("UPDATE tmacho SET chotef = :nuevoCampo1, chotem = :nuevoCampo2, chodir = :nuevoCampo3, chocor = :nuevoCampo4, vehcha = :nuevoCampo5 WHERE choced = :choferId");
    $stmt->bindParam(':nuevoCampo1', $nuevoCampo1);
    $stmt->bindParam(':nuevoCampo2', $nuevoCampo2);
    $stmt->bindParam(':nuevoCampo3', $nuevoCampo3);
    $stmt->bindParam(':nuevoCampo4', $nuevoCampo4);
    $stmt->bindParam(':nuevoCampo5', $nuevoCampo5);
    $stmt->bindParam(':choferId', $choferId);
    $stmt->execute();

    echo "Datos del conductor actualizados correctamente";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión a la base de datos
$conn = null;
?>



