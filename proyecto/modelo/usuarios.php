<?php

class Usuario {
    
    private $nombre;
    private $DNI;
    private $apellido;



    public function __construct(){}
    
    //recibame el nombre del usuario
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    //recibame el numero de documento
    public function setDNI($DNI){
        $this->DNI = $DNI;
    }  
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getDNI(){
        return $this->DNI;
    }
    public function getApellido(){
        return $this->apellido;
    }
}
?>
