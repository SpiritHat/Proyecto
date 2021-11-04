<?php
//se llama la clase
require_once 'modelo/mysql.php';
//se intancia la clase
$mysql = new MySQL;
//se utiliza el metodo conectar
$mysql->conectar();
//se ejcucta y guarda la consulta en la variable llamada consulta
$consulta = $mysql->efectuarConsulta("SELECT * FROM recepcion.tipo_documento");
$mysql->desconectar();
  ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/Iconocotecnova.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-up.html" />

	<title>Crear Estudiante</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Crear administrativo</h1>
							<p class="lead">
								Complete los siguiente datos para crear un nuevo administrativo
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form action="controlador/crearEmpl.php" method="POST"s>
										<div class="mb-3">
											<label class="form-label">Numero de documento</label>
											<input class="form-control form-control-lg" type="text" name="DNIempleado" id="DNIempleado" placeholder="Ingrese su numero de documento"/>
										</div>
										<div class="mb-3">
											<label class="form-label">Nombre</label>
											<input class="form-control form-control-lg" type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre"/>
										</div>
										<div class="mb-3">
											<label class="form-label">Apellido</label>
											<input class="form-control form-control-lg"  type="text" name="apellido" id="apellido" placeholder="Ingrese su apellido"/>
										</div>
										<div class="mb-3">
											<label class="form-label">Contraseña</label>
											<input class="form-control form-control-lg" type="password" name="password" id="password" placeholder="Ingrese su contraseña"/>
										</div>
										<div class="mb-3">
											<label class="form-label">Tipo de documento</label>
											<select name ="tipo_documento_idtipo_documento" class="form-select" aria-label="Default select example">

                      <?php 
                       while ($row = mysqli_fetch_array($consulta)) {
                       $id_docu =  $row["idtipo_documento"]; 
                       $documento = $row["nombre"]; 
                      ?>
                      <option value="<?php echo $id_docu; ?>"><?php  echo $documento;  ?></option>
                        <?php }?>
    										</select>
										</div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-success">Registrar datos</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>                                
</body>
</html>
