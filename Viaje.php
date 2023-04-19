<?php

//Alumno: Antinao Nicolas


include_once "Pasajero.php";
include_once "ResponsableV.php";
class Viaje {

    //Atributos: $codViaje, $destino, $maxPasajeros, $arregloPasajeros, $responsableViaje

    private $codViaje;
    private $destino;
    private $maxPasajeros;
    private $arregloPasajeros;
    private $responsableViaje;


    public function __construct($codigo, $destinoViaje, $cantMaxPasajeros, $arrayPasajeros) {
        $this->codViaje = $codigo;
        $this->destino = $destinoViaje;
        $this->maxPasajeros = $cantMaxPasajeros;
        $this->arregloPasajeros = $arrayPasajeros;
        $this->responsableViaje = new ResponsableV("", "", "", "");
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
     * Retorna el valor del objeto responsable
     */
    public function getResponsableViaje(){
        return $this->responsableViaje;
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
    /**
     * Setea el valor del objeto responsable
     */
    public function setResponsableViaje($responsableV){
        $this->responsableViaje = $responsableV;
    }


    public function __toString(){
        $objetoResponsable = $this->getResponsableViaje();
        return "\nViaje " . $this->getCodViaje() . "\nDestino: " . $this->getDestino() . "\nCantidad maxima de pasajeros: " . $this->getMaxPasajeros() . "\nPasajeros:\n" . $this->mostrarPasajero() . "\n-- Responsable del viaje --" . $objetoResponsable->__toString();
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
            $objetoPasajero = $auxiliarColeccion[$i];
            $infoPasajero = $infoPasajero . $objetoPasajero->__toString() . "\n";
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
        $auxiliarColeccion = $this->getArregloPasajeros();
        $i = 0;
        $nroDocumentoExiste = false;

        while ($i<count($auxiliarColeccion) && !$nroDocumentoExiste) {
            $objetoPasajero = $auxiliarColeccion[$i];
            if ($objetoPasajero->getNroDocumento() == $dni) {
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


    public function modificarPasajero($dniABuscar, $nombreModificado, $apellidoModificado, $telefonoModificado){
        
        $indiceDni = $this->obtenerPasajeroDni($dniABuscar);
        if ($indiceDni>=0) {
            $colPasajeros = $this->getArregloPasajeros();
            $objetoPasajero = $colPasajeros[$indiceDni];
            $objetoPasajero->setNombre($nombreModificado);
            $objetoPasajero->setApellido($apellidoModificado);
            $objetoPasajero->setTelefono($telefonoModificado);

            $this->setArregloPasajeros($colPasajeros);
        }
    }


    public function agregarPasajero($nuevoNombre, $nuevoApellido, $nuevoDni, $nuevoTelefono){
        $colPasajeros = $this->getArregloPasajeros();
        $nuevoPasajero = new Pasajero($nuevoNombre, $nuevoApellido, $nuevoDni, $nuevoTelefono);
        $colPasajeros[] = $nuevoPasajero;
        $this->setArregloPasajeros($colPasajeros);
    }


    public function agregarResponsable(){
        $objetoResponsable = $this->getResponsableViaje();
        //$datosObjetoResponsable = $objetoResponsable->__toString();
        if (empty($objetoResponsable->getNroEmpleado())) {
            echo "Ingrese el numero del empleado responsable: ";
            $nroEmpleadoResponsable = trim(fgets(STDIN));
            echo "Ingrese el numero de licencia del responsable: ";
            $nroLicenciaResponsable = trim(fgets(STDIN));
            echo "Ingrese el nombre del responsable: ";
            $nombreResponsable = trim(fgets(STDIN));
            echo "Ingrese el apellido del responsable: ";
            $apellidoResponsable = trim(fgets(STDIN));
            $objetoResponsable = new ResponsableV($nroEmpleadoResponsable, $nroLicenciaResponsable, $nombreResponsable, $apellidoResponsable);
            $this->setResponsableViaje($objetoResponsable);
        }
    }
    
    

}



?>