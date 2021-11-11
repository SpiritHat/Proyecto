<?php
if (isset($_POST["DNIestudiante"]) && !empty($_POST["DNIestudiante"])
&& isset($_POST["IDequipo"]) && !empty($_POST["IDequipo"]) 
&&
isset($_POST["fecha"]) && !empty($_POST["fecha"]) &&
isset($_POST["hora"]) && !empty($_POST["hora"])
){
require_once '../modelo/mysql.php'; 
$mysql = new MySQL();
$mysql->conectar();
$DNIestudiante =$_POST['DNIestudiante'];
$IDequipo=$_POST['IDequipo'];
$fecha=$_POST['fecha'].' '.$_POST['hora'];
//$hora=$_POST['hora'];
$mysql->efectuarConsulta("INSERT INTO recepcion.prestamo(recepcion.prestamo.Estudiante_CC, recepcion.prestamo.equipo_idequipo, recepcion.prestamo.fecha_recibe) VALUES ('".$DNIestudiante . "','".$IDequipo. "','".$fecha ."')");
$mysql->desconectar();
}

?>

<head>
    <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../inicioEstud.php">
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.css">
    <center>
        <div class="alert alert-success"><b>Estudiante creado correctamente!</b> Serás redirigido automáticamente.</div>
    </center>
</head>
