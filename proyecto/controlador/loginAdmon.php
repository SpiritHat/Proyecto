<?php
if(isset($_POST['DNI']) && !empty($_POST['DNI'])&& isset($_POST['password']) && !empty($_POST['password'])){
    require_once '../modelo/mysql.php';
    $DNI=$_POST['DNI'];
    $password=$_POST['password'];
    $mysql=new mysql();
    $mysql->conectar();
    $consulta=$mysql->efectuarconsulta("SELECT recepcion.administrativo.DNIadministrativo,recepcion.administrativo.password FROM recepcion.administrativo WHERE recepcion.administrativo.DNIadministrativo='".$DNI."'&& recepcion.administrativo.password='".$password."'");
    
    
    $mysql->desconectar();
}
if (mysqli_num_rows($consulta)>0){
    header("location: ../inicioAdmon.html");
}
else {
  header("location: ../loginAdmon.html");
}
?>