<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
     // Recibir datos del formulario
    $fecrealizacion = $_POST["fec_realizacion"];
    $evtanotacion = $_POST["evt_anotacion"];
    $numchasis = $_POST["num_chasis"];
    // Conectar a la base de datos (reemplaza 'conexion.php' con tu lógica de conexión)
    require '../../database.php';

   // Preparar la consulta SQL para insertar datos en la base de datos
   $query = "INSERT INTO tmaevt (evtfec, evtdes, vehcha) 
   VALUES (:fec_afiliacion, :evt_anotacion, :num_chasis)";

    $stmt = $conn->prepare($query);

    // Vincular los parámetros
    $stmt->bindParam(':fec_realizacion', $fecrealizacion);
    $stmt->bindParam(':evt_anotacion', $evtanotacion);
    $stmt->bindParam(':num_chasis', $numchasis);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // La inserción fue exitosa, puedes redirigir al usuario a una página de éxito
        header("Location: ../../user_adminpage.php");
        exit();
    } else {
        // Ocurrió un error en la inserción
        echo "Error en la inserción de datos: " . $stmt->errorInfo()[2];
    }

    // Cerrar la conexión a la base de datos
    $conn = null;
} else {
    // Si alguien intenta acceder a este archivo directamente sin enviar datos por el formulario
    header("Location: generarconsulta.php");
    exit();
}
?>
