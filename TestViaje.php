<?php
include_once "Viaje.php";

/**
 * Dada una cantidad maxima de pasajeros se crea un arreglo y se le va pidiendo al usuario la informacion de los pasajeros.
 * @param Int
 * @return Array
 */
function arrayPasajeros($maxPasajeros){
    $arregloPasajeros = [];
    $cantidadPasajeros = solicitarCantidadPasajeros($maxPasajeros);
    for ($numPasajero=0; $numPasajero<$cantidadPasajeros; $numPasajero++){
        
        echo "Ingrese el nombre del pasajero numero ". ($numPasajero+1) . ": ";
        $nombre = trim(fgets(STDIN));
        echo "Ingrese el apellido del pasajero numero " .($numPasajero+1) . ": ";
        $apellido = trim(fgets(STDIN));
        echo "Ingrese el documento del pasajero numero " . ($numPasajero+1) . ": ";
        $documento = trim(fgets(STDIN));
        echo "Ingrese el telefono del pasajero numero " . ($numPasajero+1) . ": ";
        $telefono = trim(fgets(STDIN));
        
        /*
        $arregloPasajeros[$numPasajero]["nombre"] = $nombre;
        $arregloPasajeros[$numPasajero]["apellido"] = $apellido;
        $arregloPasajeros[$numPasajero]["dni"] = $documento;
        */
        
        $objPasajero = new Pasajero($nombre, $apellido, $documento, $telefono);
        $arregloPasajeros[] = $objPasajero; 
    }
    return $arregloPasajeros;
}

/**
 * Dado el maximo de pasajeros permitidos, se le solicita al usuario la cantidad de pasajeros que viajan, devuelve la cantidad si el numero es menor o igual al maximo permitido, caso contrario se le vuelve a pedir que ingrese otra cantidad.
 * @param Int 
 * @return Int
 */
function solicitarCantidadPasajeros($maximoPasajeros){
    $condicion = false;
    do {
        echo "Ingrese la cantidad de pasajeros: ";
        $cantidadPasajeros = trim(fgets(STDIN));
        if ($cantidadPasajeros <= $maximoPasajeros && $cantidadPasajeros > 0) {
            $condicion = true;
        }
        else {
            echo "Cantidad de pasajeros incorrecta\n";
        }
    } while ($condicion == false);
    return $cantidadPasajeros;
}



echo "Ingrese el codigo del viaje: ";
$codigoViaje = trim(fgets(STDIN));
echo "Ingrese el destino del viaje: ";
$destinoViaje = trim(fgets(STDIN));
echo "Ingrese la cantidad maxima de pasajeros del viaje: ";
$maxCantViaje = trim(fgets(STDIN));
$arregloPasajeros = arrayPasajeros($maxCantViaje);
$objViaje = new Viaje($codigoViaje, $destinoViaje, $maxCantViaje, $arregloPasajeros);

$bandera = true;
//Menu
do {
    echo "\n\nBienvenido a Viaje Feliz!!\n\nElija una opcion\n";
    echo "1. Agregar un pasajero.\n";
    echo "2. Quitar un pasajero.\n";
    echo "3. Mostrar informacion del viaje.\n";
    echo "4. Modificar el destino.\n";
    echo "5. Modificar la informacion de un pasajero.\n";
    echo "6. Agregar otro responsable para el viaje.\n";
    echo "7. Salir.\nOpciones: ";
    
    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case 1: {
            echo "Ingrese los datos del pasajero que quiere agregar: \n";
            echo "Ingrese el nombre: ";
            $nombreNuevo = trim(fgets(STDIN));
            echo "Ingrese el apellido: ";
            $apellidoNuevo = trim(fgets(STDIN));
            echo "Ingrese el numero de documento: ";
            $dniNuevo = trim(fgets(STDIN));
            echo "Ingrese el telefono: ";
            $telefonoNuevo = trim(fgets(STDIN));

            if ($objViaje->viajeConLugar()) {
                if ($objViaje->obtenerPasajeroDni($dniNuevo) > -1) {
                    echo "No se puede agregar al pasajero porque el dni del mismo ya se encuentra registrado.\n";
                }
                else {
                    $objViaje->agregarPasajero($nombreNuevo, $apellidoNuevo, $dniNuevo, $telefonoNuevo);
                }
            }
            else {
                echo "No se puede agregar al pasajero, el viaje esta completo.\n";
            }
            break;
        }
        case 2: {
            
            echo "Ingrese el numero de documento del pasajero que quiere quitar: ";
            $dni = trim(fgets(STDIN));
            $indicePasajero = $objViaje->obtenerPasajeroDni($dni);
            if (is_int($indicePasajero)) {
                $objViaje->quitarPasajero($indicePasajero);
            } else {
                echo "El pasajero no existe.\n";
            }
            break;
        }
        case 3: {
            $objViaje->agregarResponsable();
            echo $objViaje;
            break;
        }
        case 4: {
            echo "Ingrese el nuevo destino del viaje: ";
            $nuevoDestino = trim(fgets(STDIN));
            $objViaje->setDestino($nuevoDestino);
            break;
        }
        case 5:
            echo "Ingrese el dni del pasajero que quiere modificar: ";
            $dniBuscado = trim(fgets(STDIN));
            if ($objViaje->obtenerPasajeroDni($dniBuscado)>=0) {
                echo "Ingrese el nombre: ";
                $nombreNuevo = trim(fgets(STDIN));
                echo "Ingrese el apellido: ";
                $apellidoNuevo = trim(fgets(STDIN));
                echo "Ingrese el telefono: ";
                $telefonoNuevo = trim(fgets(STDIN));
                $objViaje->modificarPasajero($dniBuscado, $nombreNuevo, $apellidoNuevo, $telefonoNuevo);
            }
            else {
                echo "El dni no se ha encontrado, por lo tanto no se han podido modificar los datos.\n";
            }
            break;
        case 6:
            echo "Ingrese el numero del empleado responsable: ";
            $nroEmpleadoResponsable = trim(fgets(STDIN));
            echo "Ingrese el numero de licencia del responsable: ";
            $nroLicenciaResponsable = trim(fgets(STDIN));
            echo "Ingrese el nombre del responsable: ";
            $nombreResponsable = trim(fgets(STDIN));
            echo "Ingrese el apellido del responsable: ";
            $apellidoResponsable = trim(fgets(STDIN));
            $objetoResponsable = new ResponsableV($nroEmpleadoResponsable, $nroLicenciaResponsable, $nombreResponsable, $apellidoResponsable);
            $objViaje->setResponsableViaje($objetoResponsable);
            break;
        case 7: {
            $bandera = false;
            echo "Gracias por usar nuestra aplicacion!!\n";
            break;
        }
        default: {
            echo "La opcion ingresada no existe\n";
            break;
        }
    }
} while ($bandera);

?>