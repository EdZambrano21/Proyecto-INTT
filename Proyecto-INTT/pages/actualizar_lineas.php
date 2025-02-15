<?php

// Conexión a la base de datos
require '../database.php';

try {
    // Obtener los datos del formulario de edición desde la solicitud POST
    $litideId = $_POST['litId'];
    $nuevoCampo1 = $_POST['nuevoCampo1'];  // Reemplaza con el nombre real del campo
    $nuevoCampo2 = $_POST['nuevoCampo2'];
    $nuevoCampo3 = $_POST['nuevoCampo3'];
    $nuevoCampo4 = $_POST['nuevoCampo4'];

    // Realizar la actualización en la base de datos
    $stmt = $conn->prepare("UPDATE tdilit SET litdir = :nuevoCampo1, littel = :nuevoCampo2, littip = :nuevoCampo3, horpri = :nuevoCampo4 WHERE litide = :litideId");
    $stmt->bindParam(':nuevoCampo1', $nuevoCampo1);
    $stmt->bindParam(':nuevoCampo2', $nuevoCampo2);
    $stmt->bindParam(':nuevoCampo3', $nuevoCampo3);
    $stmt->bindParam(':nuevoCampo4', $nuevoCampo4);
    $stmt->bindParam(':litideId', $litideId);
    $stmt->execute();

    echo "Contenido del home actualizados correctamente";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión a la base de datos
$conn = null;
?>



