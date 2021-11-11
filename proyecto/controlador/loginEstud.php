<?php
if(isset($_POST['DNI']) && !empty($_POST['DNI']) && isset($_POST['password']) && !empty($_POST['password'])){
    require_once '../modelo/mysql.php';
    $DNI=$_POST['DNI'];
    $password=$_POST['password'];
    $mysql=new mysql();
    $mysql->conectar();
    $consulta=$mysql->efectuarconsulta("SELECT recepcion.estudiante.DNIestudiante,recepcion.estudiante.password, recepcion.estudiante.nombre, recepcion.estudiante.apellido FROM recepcion.estudiante WHERE recepcion.estudiante.DNIestudiante='".$DNI."'&& recepcion.estudiante.password='".$password."'");
    
    $mysql->desconectar();
}
if (mysqli_num_rows($consulta) > 0){
     //llamar el modelo de consulta
     require_once '../Modelo/usuarios.php';
       //inicia sesion
        session_start();
      //linstanciar la clase
        $usuario = new Usuario();
        


         //recorrame los datos de la consulta
       while ($resultado= mysqli_fetch_assoc($consulta)){
       $nombre= $resultado["nombre"];
      $DNI= $resultado["DNIestudiante"];
      $apellido=$resultado["apellido"];


    // setters del modelo consulta - agregar al modelo consulta los datos que necesito
             $usuario->setNombre($nombre);
             $usuario->setDNI($DNI);
             $usuario->setApellido($apellido);
             
       }

       //parametros de inicio de sesión
        $_SESSION['usuario'] = $usuario;
        $_SESSION['acceso'] = true;
        
        //re dirige a la pagina principal
        
    header("Location: ../inicioEstud.php");
       
    }
    else{

      //me mantiene en la misma pagina
     header("Location: ../loginEstud.html");
    }

?>