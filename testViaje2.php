<?php

require_once('Viaje2.php');
require_once('Pasajero.php');
require_once('ResponsableV.php');

$viaje = new Viaje2("X4040","San Martin", 50, "Gabriel Gallardo");

while (true) {

    echo "\nMenu:";
    echo "\n1. Cargar información del viaje";
    echo "\n2. Ver información del viaje";
    echo "\n3. Modificar destino";
    echo "\n4. Modificar cantidad máxima de pasajeros";
    echo "\n5. Modificar datos de un pasajero";
    echo "\n6. Agregar pasajero";
    echo "\n7. Mostrar informacion del responsable";
    echo "\n8. Cargar informacion del responsable";
    echo "\n9. Salir";
    echo "\nIngrese una opción: ";
    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case 1:
            echo "\nIngrese el código del viaje: ";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese el destino del viaje: ";
            $destino = trim(fgets(STDIN));
            echo "Ingrese la cantidad máxima de pasajeros: ";
            $cantMaxPasajeros = (int)trim(fgets(STDIN));
            $viaje->setCodigo($codigo);
            $viaje->setDestino($destino);
            $viaje->setCantidadMaximaPasajeros($cantidadMaximaPasajeros);
            echo "\n¡Información del viaje cargada exitosamente!\n";
            break;

        case 2:
            echo "\nInformación del viaje:";
            echo "\nCódigo: " . $viaje->getCodigo();
            echo "\nDestino: " . $viaje->getDestino();
            echo "\nCantidad máxima de pasajeros: " . $viaje->getCantidadMaximaPasajeros();
            echo "\nResponsable del viaje: " . $viaje->getResponsable()->getNombre() . " " . $viaje->getResponsable()->getApellido() . " (Número de empleado: " . $viaje->getResponsable()->getNumEmpleado() . ", Número de licencia: " . $viaje->getResponsable()->getNumLicencia() . ")";
            echo "\nPasajeros: \n";
            $pasajeros = $viaje->getPasajeros();
            foreach ($pasajeros as $pasajero) {
                echo "- " . $pasajero->getNombre() . " " . $pasajero->getApellido() . " (Número de documento: " . $pasajero->getNumDocumento() . ", Teléfono: " . $pasajero->getTelefono() . ")\n";
            }
            break;

        case 3:
            echo "\nIngrese el nuevo destino del viaje: ";
            $destino = trim(fgets(STDIN));
            $viaje->setDestino($destino);
            echo "\n¡Destino modificado exitosamente!\n";
            break;

        case 4:
            echo "\nIngrese la nueva cantidad máxima de pasajeros: ";
            $cantMaxPasajeros = (int)trim(fgets(STDIN));
            $viaje->setCantidadMaximaPasajeros($cantMaxPasajeros);
            echo "\n¡Cantidad máxima de pasajeros modificada exitosamente!\n";
            break;
            case 5:
                // Modificar pasajero
                if (!$viaje->getPasajeros()) {
                    echo "No se ha cargado ningún pasajero.\n";
                } else {
                    echo "Ingrese el número de documento del pasajero a modificar: ";
                    $documento = readline();
            
                    $pasajero = $viaje->buscarPasajeroPorDocumento($documento);
            
                    if (!$pasajero) {
                        echo "El pasajero no se encuentra en el viaje.\n";
                    } else {
                        echo "Ingrese el nuevo nombre del pasajero: ";
                        $nombre = readline();
                        $pasajero->setNombre($nombre);
            
                        echo "Ingrese el nuevo apellido del pasajero: ";
                        $apellido = readline();
                        $pasajero->setApellido($apellido);
            
                        echo "Ingrese el nuevo teléfono del pasajero: ";
                        $telefono = readline();
                        $pasajero->setTelefono($telefono);
            
                        echo "Pasajero modificado con éxito.\n";
                    }
                }
                break;
            
            case 6:
                // Agregar pasajero
                echo "Ingrese el número de documento del pasajero: ";
                $documento = readline();
            
                if ($viaje->buscarPasajeroPorDocumento($documento)) {
                    echo "El pasajero ya se encuentra en el viaje.\n";
                } else {
                    echo "Ingrese el nombre del pasajero: ";
                    $nombre = readline();
            
                    echo "Ingrese el apellido del pasajero: ";
                    $apellido = readline();
            
                    echo "Ingrese el teléfono del pasajero: ";
                    $telefono = readline();
            
                    $pasajero = new Pasajero($nombre, $apellido, $documento, $telefono);
                    $viaje->agregarPasajero($pasajero);
            
                    echo "Pasajero agregado con éxito.\n";
                }
                break;
            
            case 7:
                // Mostrar información del responsable
                if (!$viaje->getResponsable()) {
                    echo "No se ha cargado la información del responsable.\n";
                } else {
                    $responsable = $viaje->getResponsable();
                    echo "Información del responsable:\n";
                    echo "Número de empleado: " . $responsable->getNumeroEmpleado() . "\n";
                    echo "Número de licencia: " . $responsable->getNumeroLicencia() . "\n";
                    echo "Nombre: " . $responsable->getNombre() . "\n";
                    echo "Apellido: " . $responsable->getApellido() . "\n";
                }
                break;
            
            case 8:
                // Cargar información del responsable
                echo "Ingrese el número de empleado del responsable: ";
                $numeroEmpleado = readline();
            
                echo "Ingrese el número de licencia del responsable: ";
                $numeroLicencia = readline();
            
                echo "Ingrese el nombre del responsable: ";
                $nombre = readline();
            
                echo "Ingrese el apellido del responsable: ";
                $apellido = readline();
            
                $responsable = new ResponsableV($numeroEmpleado, $numeroLicencia, $nombre, $apellido);
                $viaje->setResponsable($responsable);
            
                echo "Información del responsable cargada con éxito.\n";
                break;
                case 9:
                    echo "Adiós!\n";
                    exit();
                default:
                    echo "Opción inválida. Intente nuevamente\n";
                    break;
            } 

}
