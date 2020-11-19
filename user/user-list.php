
<!DOCTYPE html>
<html lang="pt-br">
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>LABSERV</title>

	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="../css/normalize.css">

	<!-- Bootstrap V4.3 -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">

	<!-- Bootstrap Material Design V4.0 -->
	<link rel="stylesheet" href="../css/bootstrap-material-design.min.css">

	<!-- Font Awesome V5.9.0 -->
	<link rel="stylesheet" href="../css/all.css">

	<!-- Sweet Alerts V8.13.0 CSS file -->
	<link rel="stylesheet" href="../css/sweetalert2.min.css">

	<!-- Sweet Alert V8.13.0 JS file-->
	<script src="../js/sweetalert2.min.js" ></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
	
	<!-- General Styles -->
	<link rel="stylesheet" href="../css/style.css">
</head>
	<body>
		<!-- Main container -->
		<main class="full-box main-container">
		<!-- Main container -->
		<main class="full-box main-container">
			<!-- Nav lateral -->
			<section class="full-box nav-lateral">
				<div class="full-box nav-lateral-bg show-nav-lateral"></div>
				<div class="full-box nav-lateral-content">
					<figure class="full-box nav-lateral-avatar">
						<i class="far fa-times-circle show-nav-lateral"></i>
						<img src="../assets/avatar/Avatar.png" class="img-fluid" alt="Avatar">
						<figcaption class="roboto-medium text-center">
							Admin <br><small class="roboto-condensed-light">Coordenador</small>
						</figcaption>
					</figure>
					<div class="full-box nav-lateral-bar"></div>
					<nav class="full-box nav-lateral-menu">
						<ul>
							<li>
								<a href="../home.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Iníco</a>
							</li>

							<li>
								<a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Usuarios <i class="fas fa-chevron-down"></i></a>
								<ul>
									<li>
										<a href="user-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Novo usuario</a>
									</li>
									<li>
										<a href="user-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de usuarios</a>
									</li>
									<li>
										<a href="user-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar usuario</a>
									</li>
								</ul>
							</li>

							<li>
								<a href="#" class="nav-btn-submenu"><i class="fas fa-store-alt fa-fw"></i> &nbsp; Salas <i class="fas fa-chevron-down"></i></a>
								<ul>
									<li>
										<a href="item-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nova sala</a>
									</li>
									<li>
										<a href="item-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de salas</a>
									</li>
									<li>
										<a href="item-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar salas</a>
									</li>
								</ul>
							</li>

							<li>
								<a href="#" class="nav-btn-submenu"><i class="far fa-address-card fa-fw"></i> &nbsp; Reservas <i class="fas fa-chevron-down"></i></a>
								<ul>
									<li>
										<a href="reservation-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nova reserva</a>
									</li>
									<li>
										<a href="reservation-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de reservas</a>
									</li>
									<li>
										<a href="reservation-search.php"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; Buscar reservas</a>
									</li>
									<li>
										<a href="reservation-pending.php"><i class="far fa-id-card"></i> &nbsp; Reservas pendentes</a>
									</li>
								</ul>
							</li>

							<li>
								<a href="company.php"><i class="fas fa-info-circle"></i> &nbsp; Contato</a>
							</li>
						</ul>
					</nav>
				</div>
			</section>
			<!-- Page content -->
			<section class="full-box page-content">
				<nav class="full-box navbar-info">
					<a href="#" class="float-left show-nav-lateral">
						<i class="fas fa-exchange-alt"></i>
					</a>
					<a href="user-update.php">
						<i class="fas fa-user-cog"></i>
					</a>
					<a href="#" class="btn-exit-system">
						<i class="fas fa-power-off"></i>
					</a>
				</nav>

				<!-- Page header -->
				<div class="full-box page-header">
					<h3 class="text-left">
						<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUÁRIOS
					</h3>
					<p class="text-justify">
						
					</p>
				</div>
				
				<div class="container-fluid">
					<ul class="full-box list-unstyled page-nav-tabs">
						<li>
							<a href="user-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; NOVO USUÁRIO</a>
						</li>
						<li>
							<a class="active" href="user-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUÁRIOS</a>
						</li>
						<li>
							<a href="user-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUÁRIOS</a>
						</li>
					</ul>	
				</div>
				
				
				<!-- Lista -->
				
				<div class="container-fluid">
					<div class="table-responsive">
						<table class="table table-dark table-sm">
							<thead>
								<tr class="text-center roboto-medium">
									<th>ID</th>
									<th>MATRÍCULA</th>
									<th>NOME</th>
									<th>CPF</th>
									<th>TELEFONE</th>
									<th>ENDEREÇO</th>
									<th>EMAIL</th>
									<th>EDITAR</th>
									<th>EXCLUIR</th>
								</tr>
							</thead>
							<tbody>
							<?php
								require '../classes/Conexao.php';
								require '../classes/Usuario.php';
								$listUsuario = new Usuario();
								$list_usuario_pgs = $listUsuario->listar();
								//var_dump($list_contas_pgs);
							
								foreach ($list_usuario_pgs as $row_usuario) {
									extract($row_usuario);?>
									<tr class="text-center" >
									<th><?php echo $row_usuario['id_usuario']; ?></th>
									<td><?php echo $row_usuario['matricula']; ?></td>
									<td><?php echo $row_usuario['nome']; ?></td>
									<td><?php echo $row_usuario['cpf']; ?></td>
									<td><?php echo $row_usuario['telefone']; ?></td>
									<td><?php echo $row_usuario['endereco']; ?></td>
									<td><?php echo $row_usuario['email']; ?></td>
										<td>
											<?php echo "<a class='btn btn-success' href='user-update.php?id=". $id_usuario . "'>
												<i class='fas fa-sync-alt'></i>	
											</a>"?>
										</td>
										<td>
												<?php echo "<a class='btn btn-warning btn-delete-usuario''data-confirm='Tem certeza que quer excluir o usuário!'' href='user-delete.php?id=". $id_usuario . "' >
													<i class='far fa-trash-alt'></i>
													</a>"?>
										</td>
									</tr> 
										<?php }?>
							</tbody>
						</table>
					</div>

					<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item disabled">
							<a class="page-link" href="#" tabindex="-1">Anterior</a>
						</li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
							<a class="page-link" href="#">Proximo</a>
						</li>
					</ul>
				</nav>
				</div>
				
			</section>
		</main>
		
		<!--=============================================
		=            Include JavaScript files           =
		==============================================-->
		<!-- jQuery V3.4.1 -->
		<script src="../js/jquery-3.4.1.min.js" ></script>

		<!-- popper -->
		<script src="../js/popper.min.js" ></script>

		<!-- Bootstrap V4.3 -->
		<script src="../js/bootstrap.min.js" ></script>

		<!-- jQuery Custom Content Scroller V3.1.5 -->
		<script src="../js/jquery.mCustomScrollbar.concat.min.js" ></script>

		<!-- Bootstrap Material Design V4.0 -->
		<script src="../js/bootstrap-material-design.min.js" ></script>
		<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

		<script src="../js/main.js" ></script>
	</body>
</html>	