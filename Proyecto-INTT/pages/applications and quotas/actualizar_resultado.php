<?php

// Conexión a la base de datos
require '../../database.php';

try {
    // Obtener los datos del formulario de edición desde la solicitud POST
    $resultadoId = $_POST['resultadoId'];
    $nuevoCampo1 = $_POST['nuevoCampo1'];  // Reemplaza con el nombre real del campo
    $nuevoCampo2 = $_POST['nuevoCampo2']; 

    // Realizar la actualización en la base de datos
    $stmt = $conn->prepare("UPDATE tmaevt SET evtest = :nuevoCampo1, evtdes = :nuevoCampo2 WHERE evtide = :resultadoId");
    $stmt->bindParam(':nuevoCampo1', $nuevoCampo1);
    $stmt->bindParam(':nuevoCampo2', $nuevoCampo2);
    $stmt->bindParam(':resultadoId', $resultadoId);
    $stmt->execute();

    echo "Datos del los resultados han actualizados correctamente";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión a la base de datos
$conn = null;
?>



