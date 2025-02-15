<?php
require('fpdf186/fpdf.php'); // Incluye la biblioteca FPDF

// Conecta a tu base de datos (ajusta los detalles de conexión según tu base de datos)
$servername = 'localhost:3306';
$username = 'root';
$password = '';
$dbname = 'php_login_database';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Lista de Usuarios', 0, 1, 'C');
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Consulta a la base de datos para obtener los datos de los usuarios
$query = "SELECT * FROM users";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    $pdf->Cell(0, 10, 'Id: ' . $row['id'], 0, 1);
    $pdf->Cell(0, 10, 'Correo: ' . $row['email'], 0, 1);
    $pdf->Cell(0, 10, 'Contraseña: ' . $row['password'], 0, 1);
    $pdf->Ln(10);
}

$pdf->Output();
