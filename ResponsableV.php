<?php

class ResponsableV{

    //ATRIBUTOS $nroEmpleado, $nroLicencia, $nombre, $apellido
    private $nroEmpleado;
    private $nroLicencia;
    private $nombre;
    private $apellido;

    public function __construct($nroDeEmpleado, $nroDeLicencia, $name, $lastname)
    {
        $this->nroEmpleado = $nroDeEmpleado;
        $this->nroLicencia = $nroDeLicencia;
        $this->nombre = $name;
        $this->apellido = $lastname;
    }

    //GETTERS
    public function getNroEmpleado(){
        return $this->nroEmpleado;
    }
    public function getNroLicencia(){
        return $this->nroLicencia;
    }
    public function getNombreResponsable(){
        return $this->nombre;
    }
    public function getApellidoResponsable(){
        return $this->apellido;
    }

    //SETTERS
    public function setNroEmpleado($nroDeEmpleado){
        $this->nroEmpleado = $nroDeEmpleado;
    }
    public function setNroLicencia($nroDeLicencia){
        $this->nroLicencia = $nroDeLicencia;
    }
    public function setNombreResponsable($name){
        $this->nombre = $name;
    }
    public function setApellidoResponsable($lastname){
        $this->apellido = $lastname;
    }

    public function __toString()
    {
        return "\nNumero de empleado: " . $this->getNroEmpleado() . "\nNumero de licencia: " . $this->getNroLicencia() . "\nNombre de responsable: " . $this->getNombreResponsable() . "\nApellido de responsable: " . $this->getApellidoResponsable();
    }

}

/*
$objResponsable = new ResponsableV(1, 12, "Nicolas", "Antinao");
echo $objResponsable . "\n";
*/