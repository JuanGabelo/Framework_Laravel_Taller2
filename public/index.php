<?php
    require_once '../vendor/autoload.php';
    use Taller2\Controllers\EmployeeController;

    $employeeController = new EmployeeController('../employees.json');
    $employees = $employeeController->readJsonFile();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Sueldo mensual</th>
                    <th scope="col">Sueldo anual</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($employees as $index => $employee){
                        echo '<tr>';
                        echo '<th scope="row">' . ($index + 1) . '</th>';
                        echo '<td>' . $employee['name'] . '</td>';
                        echo '<td>' . $employee['phone'] . '</td>';
                        echo "<td>" . ($employee['email'] ?? '') . "</td>";
                        echo "<td>" . ($employee['salary_month'] ?? '') . "</td>";
                        echo "<td>" . ($employee['salary_year'] ?? '') . "</td>";
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
        <a href="add.php" class="btn btn-success">Crear nuevo empleado</a>
        <a href="generate_pdf.php" class="btn btn-danger mt-3">Descargar PDF</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>