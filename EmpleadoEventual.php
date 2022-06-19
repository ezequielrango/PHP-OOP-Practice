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
        //TODO: Construir el método constructor
        // ATENCIÓN: Tener en cuenta que en $ventas llega un Array (llamado
        // $_POST['ventas'] en el archivo verDatos.php
    }

    public function calcularComision() {
        // TODO: Construir este método
      $totalVentas=array_sum($this->ventas) ;
      return  self::ComisionPorVentas * $totalVentas;

    }
    
}
