<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
     // Recibir datos del formulario
    $fecafiliacion = $_POST["fec_afiliacion"];
    $fechaFormateada = date('Y-m-d', strtotime($fechaNacimiento));
    $cupoasig = $_POST["cupo_asig"];
    $numchasis = $_POST["num_chasis"];
    $cedula = $_POST["cedula"]; //PROCED de la tabla propietarios
    $lineaasig = $_POST["linea_asig"];

    // Conectar a la base de datos (reemplaza 'conexion.php' con tu lógica de conexión)
    require '../../database.php';

   // Preparar la consulta SQL para insertar datos en la base de datos
   $query = "INSERT INTO tmasaf (saffec, cupide, vehcha, proced, litide) 
   VALUES (:fec_afiliacion, :cupo_asig, :num_chasis, :cedula, :linea_asig)";

    $stmt = $conn->prepare($query);

    // Vincular los parámetros
    $stmt->bindParam(':fec_afiliacion', $fechaFormateada);
    $stmt->bindParam(':cupo_asig', $cupoasig);
    $stmt->bindParam(':num_chasis', $numchasis);
    $stmt->bindParam(':cedula', $cedula); //PROCED de la tabla propietarios
    $stmt->bindParam(':linea_asig', $lineaasig);

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
    header("Location: general3.php");
    exit();
}
?>
