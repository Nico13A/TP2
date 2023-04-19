<?php

//Alumno: Antinao Nicolas

class Viaje {

    //Atributos: $codViaje, $destino, $maxPasajeros, $arregloPasajeros

    private $codViaje;
    private $destino;
    private $maxPasajeros;
    private $arregloPasajeros;


    public function __construct($codigo, $destinoViaje, $cantMaxPasajeros, $arrayPasajeros) {
        $this->codViaje = $codigo;
        $this->destino = $destinoViaje;
        $this->maxPasajeros = $cantMaxPasajeros;
        $this->arregloPasajeros = $arrayPasajeros;
    }
    

    /** 
     * Retorna el valor codigo 
     */
    public function getCodViaje() {
        return $this->codViaje;
    }
    
    /** 
     * Retorna el valor destino
     */
    public function getDestino() {
        return $this->destino;
    }

    /** 
     * Retorna el valor maxPasajeros
     */
    public function getMaxPasajeros() {
        return $this->maxPasajeros;
    }

    /** 
     * Retorna el valor pasajeros
     */
    public function getArregloPasajeros() {
        return $this->arregloPasajeros;
    }


    /** 
     * Setea el valor codigo
     */
    public function setCodViaje($codigo) {
        $this->codViaje = $codigo;
    }

    /** 
     * Setea el valor destino
     */
    public function setDestino($destino) {
        $this->destino = $destino;
    }

    /** 
     * Setea el valor cantMaxPasajeros
     */
    public function setMaxPasajeros($cantMaxPasajeros) {
        $this->maxPasajeros = $cantMaxPasajeros;
    }

    /** 
     * Setea el valor pasajeros
     */
    public function setArregloPasajeros($arrayPasajeros) {
        $this->arregloPasajeros = $arrayPasajeros;
    }


    public function __toString(){
        return "\nViaje " . $this->getCodViaje() . "\nDestino: " . $this->getDestino() . "\nCantidad maxima de pasajeros: " . $this->getMaxPasajeros() . "\nPasajeros:\n" . $this->mostrarPasajero();
    }

    
    /**
     * Devuelve verdadero si el total del arreglo no supero el maximo permitido de pasajeros.
     * @return Boolean
     */
    public function viajeConLugar() {
        
        $cantActualPasajeros = count($this->getArregloPasajeros());
        $hayLugar = true;
        if ($cantActualPasajeros<$this->getMaxPasajeros()) {
            $hayLugar;
        }
        else {
            $hayLugar = false;
        }
        return $hayLugar;
    }
    

    /**
     * Funcion que recorre el arreglo y va mostrando la informacion de cada pasajero.
     * @return String
     */
    public function mostrarPasajero(){
        $auxiliarColeccion = $this->getarregloPasajeros();
        $infoPasajero = "";

        for ($i=0; $i<count($auxiliarColeccion); $i++){
            $nombre = $auxiliarColeccion[$i]["nombre"];
            $apellido = $auxiliarColeccion[$i]["apellido"];
            $dni = $auxiliarColeccion[$i]["dni"];
            $infoPasajero = $infoPasajero . $nombre . " " . $apellido . " ". $dni . " " . "\n";
        }
        return $infoPasajero;
    }
    
    /**
     * Dado el indice de un arreglo, elimina este.
     * @param Int
     */
    public function quitarPasajero($indice){
        $auxiliarColeccion = $this->getArregloPasajeros();
        $cantidadArreglo = count($auxiliarColeccion);
        unset($auxiliarColeccion[$indice]);
        if (count($auxiliarColeccion)<$cantidadArreglo) {
            //Array values devuelve todos los valores del array e indexa numéricamente el array
            $this->setArregloPasajeros(array_values($auxiliarColeccion));
        } 
        else{
            echo "El numero de documento ingresado no existe.\n";
        }
    }

    /**
     * Dado el dni de un pasajero retorna un entero si este existe en el arreglo, caso contrario devuelve -1
     * @param Int
     */
    public function obtenerPasajeroDni($dni){
        $i = 0;
        $nroDocumentoExiste = false;
        $cantidadPasajeros = count($this->getArregloPasajeros());
        while ($i<$cantidadPasajeros && !$nroDocumentoExiste) {
            if ($this->getArregloPasajeros()[$i]["dni"] == $dni) {
                $nroDocumentoExiste = true;
            } 
            else {
                $i++;
            }
        }
        if (!$nroDocumentoExiste) {
            $i = -1;
        }
        return $i;
    }
    

}



?>