<?php


require 'modelo/mysql.php';
$mysql = new Mysql();
require 'modelo/usuarios.php';
$user = new Usuario();
 


session_start();
     $usuario = $_SESSION['usuario'];
    $acceso = $_SESSION['acceso'];
    if($usuario == '' && $usuario == null &&
       $acceso == '' && $acceso == null){
        header("Location: index.html");
    } 


$mysql = new MySQL;

$mysql->conectar();

$consulta = $mysql->efectuarConsulta("SELECT * FROM recepcion.equipo");
$consulta2 = $mysql->efectuarConsulta("SELECT SUM(recepcion.equipo.cantidad)AS total FROM recepcion.equipo");
$consulta3 = $mysql->efectuarConsulta("SELECT COUNT(recepcion.estudiante.DNIestudiante)AS totalEstu FROM recepcion.estudiante");

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

	<title>Inicio | Administrador</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper" >
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="inicioAdmon.html">
          <span class="align-middle">Panel de control</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Paginas
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="inicioAdmon.html">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Panel de control</span>
            </a>
					</li>


					<li class="sidebar-item">
						<a class="sidebar-link" href="crearEmple.php">
              <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Crear Administrados</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="crearEstud.php">
              <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Crear Estudiante</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="eliminarUsuario.php">
              <i class="align-middle" data-feather="user-minus"></i> <span class="align-middle">Eliminar Estudiante</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="eliminarEmple.php">
              <i class="align-middle" data-feather="user-minus"></i> <span class="align-middle">Eliminar Administrativo</span>
            </a>
					</li>

					<li class="sidebar-header">
						Tools & Components
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-buttons.html">
              <i class="align-middle" data-feather="square"></i> <span class="align-middle">Buttons</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-forms.html">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Forms</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-cards.html">
              <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Cards</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-typography.html">
              <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Typography</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="icons-feather.html">
              <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Icons</span>
            </a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="img/avatars/Iconocotecnova.png" class="avatar img-fluid rounded me-1"/> <span class="text-dark"><?php

echo $usuario -> getNombre();
echo " ";
echo $usuario -> getApellido();

 

                ?>
                </span>
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

					<h1 class="h3 mb-3"><strong>ESTADISTICAS</strong> - Panel de control</h1>

					<div class="row">
						<div class="col-xl-6 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Estudiantes</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">
													<?php while ($row = mysqli_fetch_array($consulta3)) { ?>
                    						<?php echo $row['totalEstu'] ?>	
                						<?php } ?>
												</h1>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Prestamos</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="check-square"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">"Prestamos Realizados"</h1>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Total equipos</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="monitor"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">
													<?php while ($row = mysqli_fetch_array($consulta2)) { ?>
                    						<?php echo $row['total'] ?>	
                						<?php } ?>
												</h1>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Equipos disponibles</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="monitor"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">"Equipo que no estan prestados"</h1>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-xxl-7">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Prestamos recientes</h5>
								</div>
								<div class="card-body py-3">
									<div class="chart chart-sm">
										<canvas id="chartjs-dashboard-line"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-lg-8 col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Equipos de computo</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>ID</th>
											<th class="d-none d-xl-table-cell">Nombre</th>
											<th>Disponibles</th>
											<th>Prestados</th>										
										</tr>
									</thead>
									<tbody>
										<?php while ($row = mysqli_fetch_array($consulta)) { ?>
                  						<tr>
                    						<td><?php echo $row['idequipo'] ?></td>
                    						<td><?php echo $row['nombre'] ?></td>
                    						<td><?php echo $row['cantidad'] ?></td>
                    						<td><?php echo $row['cantidad_prestados'] ?></td>
                   							</tr>
                						<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Calendario</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="chart">
											<div id="datetimepicker-dashboard"></div>
										</div>
									</div>
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

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(147, 237, 147, 0.8)");
			gradient.addColorStop(1, "rgba(147, 237, 147, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
					datasets: [{
						label: "Prestamos",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.success,
						data: [
							4,
							3,
							2,
							5,
							6,
							10
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
			var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
				defaultDate: defaultDate
			});
		});
	</script>

</body>

</html>