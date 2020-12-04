
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

	<link rel="https://cdn.datatables.net/1.10.22/css/dataTables.material.min.css">
	<link rel="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.min.css">


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
							<a href="../home.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Início</a>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Usuários <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="user-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Novo usuário</a>
								</li>
								<li>
									<a href="user-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de usuários</a>
								</li>
								<li>
									<a href="user-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar usuário</a>
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
							<a href="company.php"><i class="fas fa-info-circle"></i> &nbsp; Informações</a>
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
					<i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUÁRIO
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
						<a href="user-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUÁRIOS</a>
					</li>
					<li>
						<a class="active" href="user-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUÁRIOS</a>
					</li>
				</ul>	
			</div>
			
			<!-- Content -->
			<div class="container-fluid">
				<form class="form-neon" method="POST"  action="user-search.php">
					<div class="container-fluid">
						<div class="row justify-content-md-center">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="inputSearch" class="bmd-label-floating">O que você deseja buscar ?</label>
									<input type="text" class="form-control" name="busca" id="inputSearch" maxlength="30">
								</div>
							</div>
							<div class="col-12">
								<p class="text-center" style="margin-top: 40px;">
									<button type="submit" name="txt_pesquser" value="Pesquisar" class="btn btn-raised btn-info"><i class="fas fa-search"></i> &nbsp; BUSCAR</button>
								</p>
							</div>
						</div>
					</div>
				</form>
			</div>			
				<div class="container-fluid">
					<div class="table-responsive">
						<table class="table table-dark table-sm">
							<thead>
								<tr class="text-center roboto-medium">
									<th class="th-sm">ID</th>
									<th class="th-sm">MATRÍCULA</th>
									<th class="th-sm">NOME</th>
									<th class="th-sm">CPF</th>
									<th class="th-sm">TELEFONE</th>
									<th class="th-sm">ENDEREÇO</th>
									<th class="th-sm">EMAIL</th>
									<th class="th-sm">EDITAR</th>
									<th class="th-sm">EXCLUIR</th>
								</tr>
							</thead>
							<tbody>
							<?php
								include_once "../classes/Conexao.php";
								$txt_pesquser = (isset($_POST["txt_pesquser"]))?$_POST["txt_pesquser"]:"";

								$sql = "SELECT id_usuario, matricula, nome, cpf, telefone, email, endereco
								 FROM usuarios WHERE matricula = '{$txt_pesquser}' OR nome LIKE '%{$txt_pesquser}%' 
								 ORDER BY id_usuario ASC
								 LIMIT 5";

								$rs = mysqli_query($conn, $sql);
								while($dados = mysqli_fetch_assoc($rs)){
											
									?>
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
											<?php echo "<a class='btn btn-warning btn-delete-usuario' href='user-delete.php?id=". $id_usuario ."'data-confirm='Tem certeza de que deseja excluir o item selecionado?'>
												<i class='far fa-trash-alt'></i>
											</a>"?>
										</td>
									</tr> 
										<?php }?>
							</tbody>
						</table>
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
	<script type="text/javascript" src="../js/personalizado.js"></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js" ></script>

	<!-- Bootstrap Material Design V4.0 -->
	<script src="../js/bootstrap-material-design.min.js" ></script>
	<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

	<script src="../js/main.js" ></script>

	<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
	<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" ></script>
	<script src="https://cdn.datatables.net/1.10.22/js/dataTables.material.min.js" ></script>
</body>
</html>