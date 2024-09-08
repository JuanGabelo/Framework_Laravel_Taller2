<?php
require_once '../vendor/autoload.php';
use Taller2\Controllers\EmployeeController;
use Taller2\Models\Employee;

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $salary_month = $_POST['salary_month'];

        $employeeController = new EmployeeController('../employees.json');
        $employee = new Employee($name, $phone, $email, $salary_month);
        
        $employeeController->add($employee);
        header('Location: index.php');
    }
?>
<form method="POST">
    <label>Nombre<label>
    <input type="text" name="name" id="name">
    <br>
    <label>Telefono<label>
    <input type="text" name="phone" id="phone">
    <br>
    <label>Correo Electronico<label>
    <input type="email" name="email" id="email">
    <br>
    <label>Salario Mensual<label>
    <input type="text" name="salary_month" id="salary_month">
    <br>
    <br>
    <button id="add">Agregar</button>
</form>