<?php
error_reporting(0); // Desactiva la visualización de errores para la prueba
require_once '../vendor/autoload.php';

// Crear una nueva instancia de TCPDF
$pdf = new \TCPDF();
$pdf->AddPage();

// Título del documento
$pdf->SetFont('Helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Lista de Empleados', 0, 1, 'C');
$pdf->Ln(10);

// Crear tabla
$pdf->SetFont('Helvetica', '', 12);

// Cargar los empleados
$employeeController = new \Taller2\Controllers\EmployeeController('../employees.json');
$employees = $employeeController->readJsonFile();

$html = '<table border="1" cellpadding="5">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Sueldo Mensual</th>
                <th>Sueldo Anual</th>
            </tr>';

foreach ($employees as $index => $employee) {
    $html .= '<tr>
                <td>' . ($index + 1) . '</td>
                <td>' . $employee['name'] . '</td>
                <td>' . $employee['phone'] . '</td>
                <td>' . ($employee['email'] ?? 'N/A') . '</td>
                <td>' . ($employee['salary_month'] ?? 'N/A') . '</td>
                <td>' . ($employee['salary_year'] ?? 'N/A') . '</td>
              </tr>';
}

$html .= '</table>';

// Escribir el contenido en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Salida del PDF (descarga)
$pdf->Output('empleados.pdf', 'D');
exit; // Asegúrate de usar exit para evitar cualquier salida adicional
