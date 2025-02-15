<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
     // Recibir datos del formulario
    $numChasis = $_POST["num_chasis"];
    $placa = $_POST["placa"];
    $anio = $_POST["anio"];
    $estado = $_POST["estado"];
    $cedula = $_POST["cedula"]; //PROCED de la tabla propietarios
                                //CUPIDE de la tabla de cupos
    $modeloveh = $_POST["modeloveh"]; //MODIDE de la tabla modelos de vehículo
    $marcaveh = $_POST["marcaveh"]; //MARIDE de la tabla marcas de vehículo

    // Conectar a la base de datos (reemplaza 'conexion.php' con tu lógica de conexión)
    require '../../database.php';

   // Preparar la consulta SQL para insertar datos en la base de datos
   $query = "INSERT INTO tmaveh (vehcha, vehpla, vehano, vehest, proced, modide, maride) 
   VALUES (:num_chasis, :placa, :anio, :estado, :cedula, :modeloveh, :marcaveh)";

    $stmt = $conn->prepare($query);

    // Vincular los parámetros
    $stmt->bindParam(':num_chasis', $numChasis);
    $stmt->bindParam(':placa', $placa);
    $stmt->bindParam(':anio', $anio);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':cedula', $cedula); //PROCED de la tabla propietarios
                                          //CUPIDE de la tabla de cupos
    $stmt->bindParam(':modeloveh', $modeloveh); //MODIDE de la tabla modelos de vehículo
    $stmt->bindParam(':marcaveh', $marcaveh); //MARIDE de la tabla marcas de vehículo


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
    header("Location: general2.php");
    exit();
}
?>
