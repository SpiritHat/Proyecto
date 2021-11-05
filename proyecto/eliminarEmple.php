<?php
//se llama la clase
require_once 'modelo/mysql.php';
//se intancia la clase
$mysql = new MySQL;
//se utiliza el metodo conectar
$mysql->conectar();
//se ejcucta y guarda la consulta en la variable llamada consulta
$consulta = $mysql->efectuarConsulta("SELECT * FROM recepcion.administrativo");
$mysql->desconectar();
  ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="controlador/eliminarEmpl.php" method="POST">
  <div class="mb-3">
    <h4>Seleccione el DNI del empleado a eliminar</h4>

    <select name ="DNIadministrativo" class="form-controls">

        <?php 
           while ($row = mysqli_fetch_array($consulta)) {
 
             $DNIadministrativo= $row["DNIadministrativo"];
             $nombre=$row["nombre"];
             $apellido=$row["apellido"];
             $password=$row["password"];

        ?>

        <option value="<?php echo $DNIadministrativo; ?>"><?php  echo $DNIadministrativo;  ?></option>
  
       <?php }
       ?>
    </select> <br>
    <br>

  </div>
  <button type="submit" class="btn btn-primary">Eliminar</button>
</form>
</body>
</html>
