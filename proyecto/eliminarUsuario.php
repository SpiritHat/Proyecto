<?php
//se llama la clase
require_once 'modelo/mysql.php';
//se intancia la clase
$mysql = new MySQL;
//se utiliza el metodo conectar
$mysql->conectar();
//se ejcucta y guarda la consulta en la variable llamada consulta
$consulta = $mysql->efectuarConsulta("SELECT * FROM recepcion.estudiante");
$mysql->desconectar();
  ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="controlador/eliminarUsua.php" method="POST">
  <div class="mb-3">
    <h4>Seleccione el DNI del Estudiante a eliminar</h4>

    <select name ="DNIestudiante" class="form-controls">

        <?php 
           while ($row = mysqli_fetch_array($consulta)) {
 
             $DNIestudiante= $row["DNIestudiante"];
             $nombre=$row["nombre"];
             $apellido=$row["apellido"];
             $password=$row["password"];

        ?>

        <option value="<?php echo $DNIestudiante; ?>"><?php  echo $DNIestudiante;  ?></option>
  
       <?php }
       ?>
    </select> <br>
    <br>

  </div>
  <button type="submit" class="btn btn-primary">Eliminar</button>
</form>
</body>
</html>
