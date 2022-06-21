<?php
require_once 'Empleado.php';
class EmpleadoEventual extends Empleado implements IPersona
{

    private $ventas;
    const ComisionPorVentas = 0.05;

    public function __construct($nombre, $apellido, $dni, $salario,Array $ventas)
    {
        parent::__construct($nombre, $apellido, $dni, $salario); // se utliza parent:: para indicar que esas propiedas las tiene la madre, si no las encuentra en la clase hija
        $this->ventas=$ventas;
        // $ventas llega un Array (llamado $_POST['ventas'] en el archivo verDatos.php
    }

    public function calcularComision() {
      $totalVentas=array_sum($this->ventas) ;
      return  self::ComisionPorVentas * $totalVentas;

    }
    
}
