<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
     // Recibir datos del formulario
     $cedula = $_POST["cedula"];
     $nombres = $_POST["nombres"];
     $apellidos = $_POST["apellidos"];
     $telefonoFijo = $_POST["telefono_fijo"];
     $telefonoMovil = $_POST["telefono_movil"];
     $direccion = $_POST["direccion"];
     $correo = $_POST["correo"];

    // Conectar a la base de datos (reemplaza 'conexion.php' con tu lógica de conexión)
    require '../../database.php';

   // Preparar la consulta SQL para insertar datos en la base de datos
   $query = "INSERT INTO tmacho (choced, chonom, choape, chotef, chotem, chodir, chocor) 
   VALUES (:cedula, :nombres, :apellidos, :telefonoFijo, :telefonoMovil, :direccion, :correo)";

    $stmt = $conn->prepare($query);

    // Vincular los parámetros
    $stmt->bindParam(':cedula', $cedula);
    $stmt->bindParam(':nombres', $nombres);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':telefonoFijo', $telefonoFijo);
    $stmt->bindParam(':telefonoMovil', $telefonoMovil);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':correo', $correo);

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
    header("Location: general.php");
    exit();
}
?>