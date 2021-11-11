<?php
require_once 'modelo/mysql.php';
$mysql = new MySQL;
require 'modelo/usuarios.php';
$user = new Usuario();

session_start();
     $usuario = $_SESSION['usuario'];
    $acceso = $_SESSION['acceso'];
    if($usuario == '' && $usuario == null &&
       $acceso == '' && $acceso == null){
        header("Location: index.html");
    } 

$mysql->conectar();
$consulta = $mysql->efectuarConsulta("SELECT SUM(recepcion.equipo.cantidad)AS total FROM recepcion.equipo");

$consultaEquipo = $mysql->efectuarConsulta("SELECT * FROM recepcion.equipo");

$consultaMouse = $mysql->efectuarConsulta("SELECT recepcion.equipo.cantidad AS totalM FROM recepcion.equipo WHERE recepcion.equipo.nombre='mouse';");
$consultaTeclado = $mysql->efectuarConsulta("SELECT recepcion.equipo.cantidad AS totalT FROM recepcion.equipo WHERE recepcion.equipo.nombre='teclado';");

$consultaVideo = $mysql->efectuarConsulta("SELECT recepcion.equipo.cantidad AS totalV FROM recepcion.equipo WHERE recepcion.equipo.nombre='videobeam';");

$consultaPC = $mysql->efectuarConsulta("SELECT recepcion.equipo.cantidad AS totalPC FROM recepcion.equipo WHERE recepcion.equipo.nombre='computadores';");

$consultaExten = $mysql->efectuarConsulta("SELECT recepcion.equipo.cantidad AS totalE FROM recepcion.equipo WHERE recepcion.equipo.nombre='extension';");

$consultaSonido = $mysql->efectuarConsulta("SELECT recepcion.equipo.cantidad AS totalS FROM recepcion.equipo WHERE recepcion.equipo.nombre='equipo de sonido';");
$mysql->desconectar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/Iconocotecnova.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>Inicio | Estudiante</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		
		<div class="main">
			
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<img class="bi me-2" width="40" height="40" src="img/avatars/Iconocotecnova.png">Estudiante</img>
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						
						
						<li class="nav-item dropdown">
						

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                 <span class="text-dark"><?php

echo $usuario -> getNombre();
echo " ";
echo $usuario -> getApellido();

 

                ?></span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">							<a class="dropdown-item" href="http://www.sqr.appcotecnova.es"><i class="align-middle me-1" data-feather="help-circle"></i> Ayuda</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="controlador/loginOut.php">Cerrar sesion</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Equipos disponibles</h1>

					<div class="row">
						<div class="col-xl-6 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Teclado</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="grid"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">
													<?php while ($row = mysqli_fetch_array($consultaTeclado)) { ?>
                    						<?php echo $row['totalT'] ?>	
                						<?php } ?>
												</h1>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Videobeam</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="video"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php while ($row = mysqli_fetch_array($consultaVideo)) { ?>
                    						<?php echo $row['totalV'] ?>	
                						<?php } ?></h1>
												
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Equipos de sonido</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="speaker"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php while ($row = mysqli_fetch_array($consultaSonido)) { ?>
                    						<?php echo $row['totalS'] ?>	
                						<?php } ?></h1>
												
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Mouse</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="navigation"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php while ($row = mysqli_fetch_array($consultaMouse)) { ?>
                    						<?php echo $row['totalM'] ?>	
                						<?php } ?></h1>
												
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Computadores</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="monitor"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php while ($row = mysqli_fetch_array($consultaPC)) { ?>
                    						<?php echo $row['totalPC'] ?>	
                						<?php } ?></h1>
												
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Extension</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="zap"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php while ($row = mysqli_fetch_array($consultaExten)) { ?>
                    						<?php echo $row['totalE'] ?>	
                						<?php } ?></h1>
												
											</div>
										</div>
										
									</div>
								</div>
							</div>

						</div>
							<div class="col-xl-6 col-xxl-7">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title text-center">Realizar reserva</h5>
								</div>
								<div class="card-body py-3">
									<form action="controlador/crearReserva.php" method="POST">
										<div class="mb-3">
											<label class="form-label">Numero de documento</label>
											<input class="form-control form-control-lg" type="text" name="DNIestudiante" id="DNIestudiante" placeholder="Ingrese el numero de documento" />
										</div>
										<div class="mb-3">
											<label class="form-label">Equipo</label>
											<select name ="IDequipo" class="form-select" aria-label="Default select example">
											<option>Equipo a reservar</option>
       										<?php 
         									while ($row = mysqli_fetch_array($consultaEquipo)) {
 											$id =  $row["idequipo"]; 
             								$nombre = $row["nombre"]; 
											?>
											<option value="<?php echo $id; ?>"><?php  echo $nombre;  ?></option>
  											<?php } ?>
    										</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Fecha</label>
											<input class="form-control form-control-lg" type="date" name="fecha" id="fecha"/>
										</div>
										<div class="mb-3">
											<label class="form-label">Hora</label>
											<input class="form-control form-control-lg" type="time" name="hora" id="hora"/>
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
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>COTECNOVA</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://www.cotecnova.edu.co" target="_blank">Cotecnova</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="http://www.avaco.appcotecnova.es" target="_blank">Avaco</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://www.cotecnova.edu.co/index.php/library/" target="_blank">Biblioteca</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://www.cotecnova.edu.co/index.php/contactenos/" target="_blank">Contáctenos</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>

</body>

</html>