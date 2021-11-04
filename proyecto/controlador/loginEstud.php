<?php
if(isset($_POST['DNI']) && !empty($_POST['DNI']) && isset($_POST['password']) && !empty($_POST['password'])){
    require_once '../modelo/mysql.php';
    $DNI=$_POST['DNI'];
    $password=$_POST['password'];
    $mysql=new mysql();
    $mysql->conectar();
    $consulta=$mysql->efectuarconsulta("SELECT recepcion.estudiante.DNIestudiante,recepcion.estudiante.password FROM recepcion.estudiante WHERE recepcion.estudiante.DNIestudiante='".$DNI."'&& recepcion.estudiante.password='".$password."'");


    
    
    $mysql->desconectar();
}
if (mysqli_num_rows($consulta)>0){
   header("location: ../inicioEstud.php");
}
else {
  header("location: ../loginEstud.html");
}
?>