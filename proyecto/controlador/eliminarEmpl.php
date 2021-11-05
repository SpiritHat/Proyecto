<?php
if (isset($_POST["DNIadministrativo"]) && !empty($_POST["DNIadministrativo"])
){
	require_once '../modelo/mysql.php'; 
$mysql = new MySQL();
$mysql->conectar();
$DNIadministrativo =$_POST['DNIadministrativo'];

$mysql->efectuarConsulta("DELETE FROM recepcion.administrativo WHERE recepcion.administrativo.DNIadministrativo = $DNIadministrativo");
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
        <div class="alert alert-success"><b>Administrativo eliminado correctamente!</b> Serás redirigido automáticamente.</div>
    </center>
</head>
<?php
        }
        else{
            echo "ecurrio un error";
        }