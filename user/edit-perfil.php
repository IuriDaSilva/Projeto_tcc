<?php
session_start();
?>
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
						<i class="fas fa-sync-alt fa-fw"></i> &nbsp; ALTERAR PERFIL
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
				<?php
                    //Receber o Id da URL
                    $id = $_SESSION['usuarioId'];
					

					//Verificar se o ID possui valor
					if (!empty($id)) {
						//Incluir os arquivos
						require '../classes/Conexao.php';
						require '../classes/Usuario.php';
						//Instanciar a classe e criar o objeto
						$visUsuario = new Usuario();

						//Receber os dados do formulário
						$formDados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
					
						//Verificar se o usuário clicou no botão e a posição SendEditUsuario possui valor
						if (!empty($formDados['SendEditUsuario'])) {
							$editUsuario = new Usuario();

							//Enviar os dados para o atributo formdados da classe ContasPagar
							$editUsuario->formDados = $formDados;

							//Instanciar o metodo editar
							$valor = $editUsuario->editar();


							if ($valor) {
								echo "<div class='alert alert-success' role='alert'>Usuário editado com sucesso!</div>";
								//$_SESSION['msg'] = "<p style='color: green;'>Conta a pagar editada com sucesso!</p>";
								//header("Location: user-update.php");
							} else {
								echo "<div class='alert alert-danger' role='alert'>Usuário não editado!</div>";
								//$_SESSION['msg'] = "<p style='color: #ff0000;'>Erro: Conta a pagar não editada</p>";
								//header("Location: user-update.php");
							}
						}

						//Enviar o ID par ao atributo da classe ContaPagar
						$visUsuario->id = $id;

						//Instaciar o método visualizar
						$result_vis_usuario = $visUsuario->visualizar();

						extract($result_vis_usuario);
					
				?>
				<div class="container-fluid">
					<form method="POST" action="" name="EditUsuario" class="form-neon" autocomplete="off">
					<input type="hidden" name="id" value="<?php echo $id_usuario ?>">
						<fieldset>
							<legend><i class="far fa-address-card"></i> &nbsp; Preencha os dados do seu perfil</legend>
							<div class="container-fluid">
								<div class="row">
									<div class="col-12 col-md-4">
										<div class="form-group">
											<label for="usuario_mat" class="bmd-label-floating">Matrícula</label>
											<input type="text" class="form-control" name="usuario_mat" id="usuario_mat" value="<?php echo $matricula ?>">
										</div>
									</div>
									
									<div class="col-12 col-md-4">
										<div class="form-group">
											<label for="usuario_nome" class="bmd-label-floating">Nome</label>
											<input type="text" class="form-control" name="usuario_nome" id="usuario_nome" value="<?php echo $nome ?>">
										</div>
									</div>
									<div class="col-12 col-md-4">
										<div class="form-group">
											<label for="usuario_cpf" class="bmd-label-floating">CPF</label>
											<input type="text" class="form-control" name="usuario_cpf" id="usuario_cpf" value="<?php echo $cpf ?>">
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label for="usuario_telefone" class="bmd-label-floating">Telefone</label>
											<input type="text" class="form-control" name="usuario_telefone" id="usuario_telefone" value="<?php echo $telefone ?>">
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label for="usuario_endereco" class="bmd-label-floating">Endereço</label>
											<input type="text" class="form-control" name="usuario_endereco" id="usuario_endereco" value="<?php echo $endereco ?>">
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
											<input type="text" class="form-control" name="usuario_usuario" id="usuario_usuario" value="<?php echo $nome_usuario ?>">
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label for="usuario_email" class="bmd-label-floating">Email</label>
											<input type="email" class="form-control" name="usuario_email" id="usuario_email" value="<?php echo $email ?>">
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label for="usuario_senha_1" class="bmd-label-floating">Senha</label>
											<input type="password" class="form-control" name="usuario_senha_1" id="usuario_senha_1" value="<?php echo $senha ?>">
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label for="usuario_senha_2" class="bmd-label-floating">Repetir senha</label>
											<input type="password" class="form-control" name="usuario_senha_2" id="usuario_senha_2" >
										</div>
									</div>
								</div>
							</div>
						</fieldset>
						<br><br><br>
						<fieldset>
							<!--<legend><i class="fas fa-medal"></i> &nbsp; Cargo</legend>
							<div class="container-fluid">
								<div class="row">
									<div class="col-12">
										<p><span class="badge badge-info">Coordenador</span> Permissão total de acesso ao sistema.</p>
										<p><span class="badge badge-success">Professor</span> Permissão para alocar e atualizar reservas.</p>
										
										<div class="form-group">
											<select class="form-control" name="usuario_cargo" value="<?php echo $cargo ?>">
												<option value="" selected="" disabled="">Selecione uma opção</option>
												<option value="Coordenador">Coordenador</option>
												<option value="Professor">Professor</option>
											</select>
										</div>
									</div>
								</div>
							</div>-->
						</fieldset>
						
						
						<p class="text-center" style="margin-top: 40px;">
							<button type="submit" class="btn btn-raised btn-success btn-sm" value="Editar" name="SendEditUsuario"><i class="fas fa-sync-alt"></i> &nbsp; ATUALIZAR</button>
						</p>
						<?php
						}else{
							echo "<div class='alert alert-danger' role='alert'>Usuário não editado!</div>";
						}
						?>
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