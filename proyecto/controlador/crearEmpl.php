<?php
if (isset($_POST["DNIempleado"]) && !empty($_POST["DNIempleado"])
&& isset($_POST["nombre"]) && !empty($_POST["nombre"]) 
&&
isset($_POST["apellido"]) && !empty($_POST["apellido"]) &&
isset($_POST["password"]) && !empty($_POST["password"]) && 
isset($_POST["tipo_documento_idtipo_documento"]) && !empty($_POST["tipo_documento_idtipo_documento"])
){
	require_once '../modelo/mysql.php'; 
$mysql = new MySQL();
$mysql->conectar();
$DNIadministrativo =$_POST['DNIempleado'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$password=$_POST['password'];
$documento=$_POST['tipo_documento_idtipo_documento'];

$mysql->efectuarConsulta("INSERT INTO recepcion.administrativo VALUES ('".$DNIadministrativo . "','".$nombre. "','".$apellido ."','".$password. "','".$documento."')");

$mysql->desconectar();
}

 ?>

 <!--<?php
     /* incluide("mysql.php");
      $programa="SELECT * FROM programas";
      $resultado=mysql_query($conexion,$libros);
      while($valores = mysql_fetch_array($resultado)){
      	echo '<option value ="'.$valores[nombre_programa].'">'.$valores[nombre_programa].'</option>';
      }

    */?>-->

 <head>
    <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../inicioAdmon.php">
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.css">
    <center>
        <div class="alert alert-success"><b>Administrativo creado correctamente!</b> Serás redirigido automáticamente.</div>
    </center>
</head>
<?php
        }
        else{
            echo "ecurrio un error";
        }