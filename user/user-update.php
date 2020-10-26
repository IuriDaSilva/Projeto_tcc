<!DOCTYPE php>
<php lang="pt-br">
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
									<a href="../sala/sala-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nova sala</a>
								</li>
								<li>
									<a href="../sala/sala-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de salas</a>
								</li>
								<li>
									<a href="../sala/sala-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar salas</a>
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
					<i class="fas fa-sync-alt fa-fw"></i> &nbsp; ALTERAR USUÁRIO
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
						<a href="user-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUÁRIO</a>
					</li>
				</ul>	
			</div>
			

			<!-- Content -->
			<div class="container-fluid">
				<form action="" class="form-neon" autocomplete="off">
					<fieldset>
						<legend><i class="far fa-address-card"></i> &nbsp; Preencha os dados do usuário</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="usuario_dni" class="bmd-label-floating">Matrícula</label>
										<input type="text" pattern="[0-9-]{1,20}" class="form-control" name="usuario_dni" id="usuario_dni" maxlength="20">
									</div>
								</div>
								
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="usuario_nombre" class="bmd-label-floating">Nome</label>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="usuario_nombre" id="usuario_nombre" maxlength="35">
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="usuario_apellido" class="bmd-label-floating">CPF</label>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="usuario_apellido" id="usuario_apellido" maxlength="35">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_telefono" class="bmd-label-floating">Telefone</label>
										<input type="text" pattern="[0-9()+]{1,20}" class="form-control" name="usuario_telefono" id="usuario_telefono" maxlength="20">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_direccion" class="bmd-label-floating">Endereço</label>
										<input type="text" pattern="[a-zA-Z0-99áéíóúÁÉÍÓÚñÑ()# ]{1,190}" class="form-control" name="usuario_direccion" id="usuario_direccion" maxlength="190">
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<br><br><br>
					<fieldset>
						<legend><i class="fas fa-user-lock"></i> &nbsp; Dados da Conta</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_usuario" class="bmd-label-floating">Nome de usuário</label>
										<input type="text" pattern="[a-zA-Z0-9]{1,35}" class="form-control" name="usuario_usuario" id="usuario_usuario" maxlength="35">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_email" class="bmd-label-floating">Email</label>
										<input type="email" class="form-control" name="usuario_email" id="usuario_email" maxlength="70">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_clave_1" class="bmd-label-floating">Senha</label>
										<input type="password" class="form-control" name="usuario_clave_1" id="usuario_clave_1" maxlength="200">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_clave_2" class="bmd-label-floating">Repetir senha</label>
										<input type="password" class="form-control" name="usuario_clave_2" id="usuario_clave_2" maxlength="200">
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<br><br><br>
					<fieldset>
						<legend><i class="fas fa-medal"></i> &nbsp; Cargo</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12">
									<p><span class="badge badge-info">Coordenador</span> Permissão total de acesso ao sistema.</p>
									<p><span class="badge badge-success">Professor</span> Permissão para alocar e atualizar reservas.</p>
									
									<div class="form-group">
										<select class="form-control" name="usuario_privilegio">
											<option value="" selected="" disabled="">Selecione uma opção</option>
											<option value="1">Coordenador</option>
											<option value="2">Professor</option>
											
										</select>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<br><br><br>
					<fieldset>
						<p class="text-center">Para alterar os dados de um usuário é necessário entrar com seu usuário e senha.</p>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_admin" class="bmd-label-floating">Nome de usuário</label>
										<input type="text" pattern="[a-zA-Z0-9]{1,35}" class="form-control" name="usuario_admin" id="usuario_admin" maxlength="35">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="clave_admin" class="bmd-label-floating">Senha</label>
										<input type="password" class="form-control" name="clave_admin" id="clave_admin" maxlength="200">
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<p class="text-center" style="margin-top: 40px;">
						<button type="submit" class="btn btn-raised btn-success btn-sm"><i class="fas fa-sync-alt"></i> &nbsp; ATUALIZAR</button>
					</p>
				</form>
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
</php>