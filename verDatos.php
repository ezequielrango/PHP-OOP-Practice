<?php
require_once 'EmpleadoPermanente.php';
require_once 'EmpleadoEventual.php';

//Creamos un nuevo empleado según el tipo:
if($_POST['tipo'] == 'e') {
    $emp = new EmpleadoEventual($_POST['nombre'], $_POST['apellido'], $_POST['dni'], $_POST['salario'],  $_POST['ventas']);
}
elseif ($_POST['tipo'] == 'p') {
    $emp = new EmpleadoPermanente($_POST['nombre'], $_POST['apellido'], $_POST['dni'], $_POST['salario'], new DateTime($_POST['fechaIngreso']));
}

//Cargamos en variables los datos del empleado
$nombreApellido = $emp->getNombreApellido();
$salario = $emp->getSalario();
$comision = $emp->calcularComision();
$ingresoTotal = $emp->calcularIngresoTotal();

// Mostramos los datos:
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Datos del empleado</title>
    </head>
    <body>
      <h1>Datos del empleado</h1>  
      <table border=1 style="border-collapse:collapse">
        <tr>
            <th>Nombre:</th><td><?=$nombreApellido?></td>
        </tr>
        <tr>
            <th>Salario:</th><td>$<?=$salario?></td>
        </tr>
        <tr>
            <th>Comisión:</th><td>$<?=$comision?></td>
        </tr>
        <tr>
            <th>Ingreso total:</th><td>$<?=$ingresoTotal?></td>
        </tr>
      </table>
      <p> Datos empleado : <br> <?php echo $emp;?> </p>
    </body>
</html>
