<?php

// Conexión a la base de datos
require '../../database.php';

try {
    // Obtener el ID del vehículo desde la solicitud POST
    $resultadoId = $_POST['resultadoId'];

    // Realizar una consulta para obtener los detalles del vehículo
    $stmt = $conn->prepare("SELECT * FROM tmaevt WHERE evtide = :resultadoId");
    $stmt->bindParam(':resultadoId', $resultadoId);
    $stmt->execute();

    // Obtener los resultados
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Devolver los resultados en formato JSON
    header('Content-Type: application/json');
    echo json_encode($result);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión a la base de datos
$conn = null;
?>