<?php
    class mysql{
        private $ipservidor="localhost";
        private $usuariobase='root';
        private $contraseña='';
        
        private $conexion;
        
        public function conectar() {
            $this->conexion= mysqli_connect($this->ipservidor, $this->usuariobase, $this->contraseña);
        }
        
        public function desconectar() {
            mysqli_close($this->conexion);            
        }
        public function efectuarconsulta($consulta) {
            mysqli_query($this->conexion,"SET lc_time_names = 'es_ES' ");
            mysqli_query($this->conexion, "SET NAMES 'utf8' ");
            mysqli_query($this->conexion, "SET CHARACTER 'utf8' ");
            
            $this->resultadoconsulta= mysqli_query($this->conexion,$consulta);
            return $this->resultadoconsulta;
        }
    }
?>