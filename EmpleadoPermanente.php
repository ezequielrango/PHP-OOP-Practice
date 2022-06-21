<?php
require_once 'Empleado.php';

class EmpleadoPermanente extends Empleado implements IPersona
{

    private $fechaIngreso;
    const ComisionPorAnio = 0.1;

    public function __construct($nombre, $apellido, $dni, $salario,DateTime $fechaIngreso = null)
    {
        parent::__construct($nombre, $apellido, $dni, $salario); // lo abstraje por la clase madre, todo lo que es $this->
        
        if (is_null($fechaIngreso)) {
            //Asigna hoy como fecha de ingreso:
            $this->fechaIngreso = new DateTime();
        }
        else {
            $this->fechaIngreso = $fechaIngreso;
        }
    }


    private function calcularAntiguedad() {
        //Retorna la antigüedad en años. (Puede ser cero.)
        $antiguedad = $this->fechaIngreso->diff(new DateTime()); 

        // $antiguedad está expresado en años, meses, días, horas, min, seg...
        // Pero nosotros retornaremos solamente los años ( ->y ):
        return $antiguedad->y;
    }

    public function calcularComision() {

        return self::ComisionPorAnio * $this->calcularAntiguedad() * $this->salario;
    }
    
}
