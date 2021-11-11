<?php
if(isset($_POST['DNI']) && !empty($_POST['DNI']) && isset($_POST['password']) && !empty($_POST['password'])){
    require_once '../modelo/mysql.php';
    $DNI=$_POST['DNI'];
    $password=$_POST['password'];
    $mysql=new mysql();
    $mysql->conectar();
    $consulta=$mysql->efectuarconsulta("SELECT recepcion.administrativo.DNIadministrativo,recepcion.administrativo.password, recepcion.administrativo.nombre, recepcion.administrativo.apellido FROM recepcion.administrativo WHERE recepcion.administrativo.DNIadministrativo='".$DNI."'&& recepcion.administrativo.password='".$password."'");
    
    
    $mysql->desconectar();
}


if (mysqli_num_rows($consulta) > 0){
     //llamar el modelo de consulta
     require_once '../Modelo/usuarios.php';
       //inicia sesion
        session_start();
      //linstanciar la clase
        $usuario = new Usuario();
        


       while ($resultado= mysqli_fetch_assoc($consulta)){
       $nombre= $resultado["nombre"];
      $DNI= $resultado["DNIadministrativo"];
      $apellido=$resultado["apellido"];


             $usuario->setNombre($nombre);
             $usuario->setDNI($DNI);
             $usuario->setApellido($apellido);
             
       }

        $_SESSION['usuario'] = $usuario;
        $_SESSION['acceso'] = true;
    header("Location: ../inicioAdmon.php");
    }
    else{
     header("Location: ../loginAdmon.html");
    }


?>