<?php
require_once 'IPersona.php';
/*
En esta clase se coloca todo el codigo repetido en las clases hijas
 lo distinto NO, porque queda en las hijas.
*/
abstract class Empleado implements IPersona{

    protected $nombre;
    protected $apellido;
    protected $sector;
    protected $salario;
    protected $dni;

    public function __construct($nombre, $apellido, $dni, $salario)
    {
        $this->nombre=$nombre;;
        $this->apellido=$apellido;
        $this->salario=$salario;
        $this->dni=$dni;
    }
    
    public function getNombreApellido() 
    {
        return $this->nombre . " " . $this->apellido;
    }

    public function getDNI()
    {
        return $this->dni;
    }
    
    public function getSalario()
    {
        return $this->salario;
    }

    public function setSector($sector) {
        $this->sector = $sector;
    }

    abstract public function calcularComision();

    public function calcularIngresoTotal() {
        // TODO: Construir este método
      return  $this->calcularComision() + $this->salario;
    }
    public function __toString(){ // lo que quiero que haga cuando el objeto sea convertido en una cadena
        $texto = $this->getNombreApellido();
        $texto.= " -<br> $this->dni". " <br>Salario sin comision: ".$this->getSalario()." <br>Salario con comision: ". $this->calcularIngresoTotal( );
        return $texto; //texto q represente mi objeto
    }

}

//------------------- ANOTACIONES ------------------- //

/*
siempre require_once al principio para requerir otros archivos
siempre en protected, mejor que public y no tan restrictivo como private
constructores siempre en Public ||| public function __construct
Constantes se escriben como en js, pero empiezan con mayuscula. Cuando se utilizan las precede un self::nombreConstante
Apenas empieza la clase se colocan las variables a utlizar, con signo peso
En los argumentos del constructor se pasan esas variables, dentro del mismo se hacen referencia con $this->nombre = $nombre
se utliza parent:: para indicar que esas propiedas las tiene la madre, si no las encuentra en la clase hija. Es lo que se repite en todas las hijas (lo del punto anterior)
abstract impide que se cree una nueva clase madre
POLIMORFISMO : el metodo calcular ingresoTotal necesita del metodo calcularComision, que no se encuentra en la clase madre. Con asbtract obligamos a q si hacemos una clase hija que herede de la madre, si o si tenga el metodo abstracto
Mando datos objeto ocmo string al archivo ver datos, luego de table en verDatos.php
*/