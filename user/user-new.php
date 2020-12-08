<?php
	session_start();
	
?>
<br>

<!DOCTYPE HTML>
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
						<br><?php echo "". $_SESSION['usuarioNome'];?></br> <br><small><?php echo "". $_SESSION['usuarioCargo'];?></small></br>
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
										<a href="user-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar usuários</a>
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
									<a href="../reserva/reserva-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nova reserva</a>
								</li>
								<li>
									<a href="../reserva/reserva-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Histórico de reservas</a>
								</li>
								<!--<li>
									<a href="../reserva/reserva-search.php"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; Buscar reservas</a>
								</li>
								<li>
									<a href="../reserva/reserva-pend.php"><i class="fas fa-hand-holding-usd fa-fw"></i> &nbsp; Reservas pendentes</a>
								</li>-->
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
					<a href="edit-perfil.php">
						<i class="fas fa-user-cog"></i>
					</a>
					<a href="#" class="btn-exit-system">
						<i class="fas fa-power-off"></i>
					</a>
				</nav>

				<!-- Page header -->
				<div class="full-box page-header">
					<h3 class="text-left">
						<i class="fas fa-plus fa-fw"></i> &nbsp; NOVO USUÁRIO
					</h3>
					<p class="text-justify">
						
					</p>
				</div>
				
				<div class="container-fluid">
					<ul class="full-box list-unstyled page-nav-tabs">
						<li>
							<a class="active" href="user-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; NOVO USUÁRIO</a>
						</li>
						<li>
							<a href="user-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUÁRIOS</a>
						</li>
						<li>
							<a href="user-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUÁRIOS</a>
						</li>
					</ul>	
				</div>
		
				<!-- Content -->
				<?php
					require '../classes/Conexao.php';
					require '../classes/Usuario.php';

					$formDados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
					//var_dump($formDados);

					if (!empty($formDados['NewUsuario'])) {
						$cadUsuario = new Usuario();
						$cadUsuario->formDados = $formDados;
						$valor = $cadUsuario->cadastrar();
						//var_dump($valor);
						if ($valor) {
							?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								Usuário cadastrado com sucesso!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							</div>
							<?php
						} else {
							?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								Usuário não cadastrado com sucesso!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							</div>
							<?php
						}
					}
				?>
				<div class="container-fluid">
					<form method="POST" action="" name="NewUsuario"class="form-neon" autocomplete="off">
					
						<fieldset>
							<legend><i class="far fa-address-card"></i> &nbsp; Preencha os dados do usuário</legend>
							<div class="container-fluid">
								<div class="row">
									<div class="col-12 col-md-4">
										<div class="form-group">
											<label for="usuario_mat" class="bmd-label-floating">Matrícula</label>
											<input type="text" class="form-control" name="usuario_mat" id="usuario_mat" maxlength="20">
										</div>
									</div>
									
									<div class="col-12 col-md-4">
										<div class="form-group">
											<label for="usuario_nome" class="bmd-label-floating">Nome</label>
											<input type="text" class="form-control" name="usuario_nome" id="usuario_nome" maxlength="35">
										</div>
									</div>
									<div class="col-12 col-md-4">
										<div class="form-group">
											<label for="usuario_cpf" class="bmd-label-floating">CPF</label>
											<input type="text" class="form-control" name="usuario_cpf" id="usuario_cpf" maxlength="35">
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label for="usuario_telefone" class="bmd-label-floating">Telefone</label>
											<input type="text" class="form-control" name="usuario_telefone" id="usuario_telefone" maxlength="20">
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label for="usuario_endereco" class="bmd-label-floating">Endereço</label>
											<input type="text" class="form-control" name="usuario_endereco" id="usuario_endereco" maxlength="190">
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
											<input type="text" class="form-control" name="usuario_usuario" id="usuario_usuario" maxlength="35">
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
											<label for="usuario_senha_1" class="bmd-label-floating">Senha</label>
											<input type="password" class="form-control" name="usuario_senha_1" id="usuario_senha_1" maxlength="200">
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label for="usuario_senha_2" class="bmd-label-floating">Repetir senha</label>
											<input type="password" class="form-control" name="usuario_senha_2" id="usuario_senha_2" maxlength="200">
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
											<select class="form-control" name="usuario_cargo">
												<option value="" selected="" disabled="">Selecione uma opção</option>
												<?php
													$result_niveis_acessos = "SELECT * FROM cargos";
													$resultado_niveis_acesso = mysqli_query($conn, $result_niveis_acessos);
													while($row_niveis_acessos = mysqli_fetch_assoc($resultado_niveis_acesso)){ ?>
														<option value="<?php echo $row_niveis_acessos['id']; ?>"><?php echo $row_niveis_acessos['nome']; ?></option> <?php
													}
												?>
											</select>
										</div>
									</div>
								</div>
							</div>
						</fieldset>
						<p class="text-center" style="margin-top: 40px;">
							<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; APAGAR</button>
							&nbsp; &nbsp;
							<button type="submit" class="btn btn-raised btn-info btn-sm" value="Cadastrar" name="NewUsuario"><i class="far fa-save"></i> &nbsp; SALVAR</button>
						</p>
					</form>
				</div>
				

			</section>
		</main>
	</body>	
	
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

</html>