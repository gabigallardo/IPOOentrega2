<?php
class Pasajero {
  private $nombre;
  private $apellido;
  private $numeroDocumento;
  private $telefono;

  public function __construct($nombre, $apellido, $numeroDocumento, $telefono) {
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->numeroDocumento = $numeroDocumento;
    $this->telefono = $telefono;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  public function getApellido() {
    return $this->apellido;
  }

  public function setApellido($apellido) {
    $this->apellido = $apellido;
  }

  public function getNumeroDocumento() {
    return $this->numeroDocumento;
  }

  public function setNumeroDocumento($numeroDocumento) {
    $this->numeroDocumento = $numeroDocumento;
  }

  public function getTelefono() {
    return $this->telefono;
  }

  public function setTelefono($telefono) {
    $this->telefono = $telefono;
  }
}

class ResponsableV {
  private $numeroEmpleado;
  private $numeroLicencia;
  private $nombre;
  private $apellido;

  public function __construct($numeroEmpleado, $numeroLicencia, $nombre, $apellido) {
    $this->numeroEmpleado = $numeroEmpleado;
    $this->numeroLicencia = $numeroLicencia;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
  }

  public function getNumeroEmpleado() {
    return $this->numeroEmpleado;
  }

  public function setNumeroEmpleado($numeroEmpleado) {
    $this->numeroEmpleado = $numeroEmpleado;
  }

  public function getNumeroLicencia() {
    return $this->numeroLicencia;
  }

  public function setNumeroLicencia($numeroLicencia) {
    $this->numeroLicencia = $numeroLicencia;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  public function getApellido() {
    return $this->apellido;
  }

  public function setApellido($apellido) {
    $this->apellido = $apellido;
  }
}

class Viaje2 {
  private $codigo;
  private $destino;
  private $cantidadMaximaPasajeros;
  private $pasajeros = [];
  private $responsable;

  public function __construct($codigo, $destino, $cantidadMaximaPasajeros, $responsable) {
    $this->codigo = $codigo;
    $this->destino = $destino;
    $this->cantidadMaximaPasajeros = $cantidadMaximaPasajeros;
    $this->pasajeros = array();
    $this->responsable = $responsable;
    
}
public function getCodigo() {
    return $this->codigo;
  }

  public function setCodigo($codigo) {
    $this->codigo = $codigo;
  }

  public function getDestino() {
    return $this->destino;
  }

  public function setDestino($destino) {
    $this->destino = $destino;
  }

  public function getCantidadMaximaPasajeros() {
    return $this->cantidadMaximaPasajeros;
  }

  public function setCantidadMaximaPasajeros($cantidadMaximaPasajeros) {
    $this->cantidadMaximaPasajeros = $cantidadMaximaPasajeros;
  }

  public function getPasajeros() {
    return $this->pasajeros;
  }

  public function agregarPasajero($pasajero) {
    // Verificamos si el pasajero ya está cargado en el viaje
    foreach ($this->pasajeros as $p) {
      if ($p->getNumeroDocumento() == $pasajero->getNumeroDocumento()) {
        echo "El pasajero ya está cargado en el viaje.";
        return;
      }
    }

    // Verificamos si hay lugar disponible
    if (count($this->pasajeros) >= $this->cantidadMaximaPasajeros) {
      echo "No hay lugar disponible para el pasajero.";
      return;
    }

    // Agregamos el pasajero al viaje
    $this->pasajeros[] = $pasajero;
  }

  public function buscarPasajeroPorDocumento($numeroDocumento) {
    foreach ($this->pasajeros as $p) {
      if ($p->getNumeroDocumento() == $numeroDocumento) {
        return $p;
      }
    }

    return null;
  }

  public function modificarNombrePasajero($numeroDocumento, $nombre) {
    $pasajero = $this->buscarPasajeroPorDocumento($numeroDocumento);

    if ($pasajero) {
      $pasajero->setNombre($nombre);
    } else {
      echo "No se encontró un pasajero con el número de documento especificado.";
    }
  }

  public function modificarApellidoPasajero($numeroDocumento, $apellido) {
    $pasajero = $this->buscarPasajeroPorDocumento($numeroDocumento);

    if ($pasajero) {
      $pasajero->setApellido($apellido);
    } else {
      echo "No se encontró un pasajero con el número de documento especificado.";
    }
  }

  public function modificarTelefonoPasajero($numeroDocumento, $telefono) {
    $pasajero = $this->buscarPasajeroPorDocumento($numeroDocumento);

    if ($pasajero) {
      $pasajero->setTelefono($telefono);
    } else {
      echo "No se encontró un pasajero con el número de documento especificado.";
    }
  }

  public function getResponsable() {
    return $this->responsable;
  }

  public function setResponsable($responsable) {
    $this->responsable = $responsable;
  }
}
