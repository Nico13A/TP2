<?php

class Pasajero {

    //ATRIBUTOS $nombre, $apellido, $nroDocumento, $telefono
    private $nombre;
    private $apellido;
    private $nroDocumento;
    private $telefono;

    public function __construct($name, $lastName, $dni, $cellphone)
    {   
        $this->nombre = $name;
        $this->apellido = $lastName;
        $this->nroDocumento = $dni;
        $this->telefono = $cellphone;
    }

    //GETTERS
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getNroDocumento(){
        return $this->nroDocumento;
    }
    public function getTelefono(){
        return $this->telefono;
    }

    //SETTERS
    public function setNombre($name){
        $this->nombre = $name;
    }
    public function setApellido($lastName){
        $this->apellido = $lastName;
    }
    public function setNroDocumento($dni){
        $this->nroDocumento = $dni;
    }
    public function setTelefono($cellphone){
        $this->telefono = $cellphone;
    }

    public function __toString()
    {
        return "\nNombre de pasajero: " . $this->getNombre() . "\nApellido de pasajero: " . $this->getApellido() . "\nNumero de documento de pasajero: " . $this->getNroDocumento() . "\nTelefono de pasajero: " . $this->getTelefono();
    }

}

/*
$objPasajero = new Pasajero("Nicolas", "Antinao", 41050862, 2996571810);
echo $objPasajero;
*/