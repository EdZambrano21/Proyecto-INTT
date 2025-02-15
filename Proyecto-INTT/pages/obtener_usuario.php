<?php

// Conexión a la base de datos
require '../database.php';

try {
    $Id = $_POST['Id'];
    // Realizar una consulta para obtener los detalles del vehículo
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = :Id");
    $stmt->bindParam(':Id', $Id);
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