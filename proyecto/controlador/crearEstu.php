<?php
if (isset($_POST["DNIestudiante"]) && !empty($_POST["DNIestudiante"])
&& isset($_POST["nombre"]) && !empty($_POST["nombre"]) 
&&
isset($_POST["apellido"]) && !empty($_POST["apellido"]) &&
isset($_POST["password"]) && !empty($_POST["password"])&&
isset($_POST["programas_idprogramas"]) && !empty($_POST["programas_idprogramas"])
 && isset($_POST["tipo_documento_idtipo_documento"]) && !empty($_POST["tipo_documento_idtipo_documento"])
){
	require_once '../modelo/mysql.php'; 
$mysql = new MySQL();
$mysql->conectar();
$DNIestu =$_POST['DNIestudiante'];
$nombreEs=$_POST['nombre'];
$apellidoEs=$_POST['apellido'];
$passwordEs=$_POST['password'];
$programasEs=$_POST['programas_idprogramas'];
$documentoEs=$_POST['tipo_documento_idtipo_documento'];

$mysql->efectuarConsulta("INSERT INTO recepcion.estudiante VALUES ('".$DNIestu . "','".$nombreEs. "','".$apellidoEs ."','".$passwordEs. "','".$programasEs."','".$documentoEs."')");

$mysql->desconectar();
}

 ?>

 <head>
    <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../inicioAdmon.php">
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.css">
    <center>
        <div class="alert alert-success"><b>Estudiante creado correctamente!</b> Serás redirigido automáticamente.</div>
    </center>
</head>
<?php
        }
        else{
            echo "ecurrio un error";
        }