<?php
	session_start();
	
?>
<br>

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
    <script src="../js/sweetalert2.min.js"></script>

    <!-- jQuery Custom Content Scroller V3.1.5 -->
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">

    <!-- General Styles -->
    <link rel="stylesheet" href="../css/style.css">


</head>


<body>
    <!-- Main container -->
    <main class="full-box main-container">
        <!--Barra lateral -->
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
									<a href="../user/user-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Novo usuario</a>
								</li>
								<li>
									<a href="../user/user-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de usuarios</a>
								</li>
								<li>
									<a href="../user/user-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar usuario</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-store-alt fa-fw"></i> &nbsp; Salas <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="sala-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nova sala</a>
								</li>
								<li>
									<a href="sala-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de salas</a>
								</li>
								<li>
									<a href="sala-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar salas</a>
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
							<a href="../company.php"><i class="fas fa-info-circle"></i> &nbsp; Informações</a>
						</li>
					</ul>
				</nav>
			</div>
        </section>
        <!--Botões superiores-->
        <section class="full-box page-content">
            <nav class="full-box navbar-info">
                <a href="#" class="float-left show-nav-lateral">
                    <i class="fas fa-exchange-alt"></i>
                </a>
                <a href="../user/edit-perfil.php">
                    <i class="fas fa-user-cog"></i>
                </a>
                <a href="#" class="btn-exit-system">
                    <i class="fas fa-power-off"></i>
                </a>
            </nav>

            <!-- Abas de decrição -->
            <div class="full-box page-header">
                <h3 class="text-left">
                    <i class="fas fa-sync-alt fa-fw"></i> &nbsp; ALTERAR SALA
                </h3>
                <p class="text-justify">
                </p>
            </div>
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a href="sala-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; NOVA SALA</a>
                    </li>
                    <li>
                        <a href="sala-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE SALAS</a>
                    </li>
                    <li>
                        <a href="sala-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR SALA</a>
                    </li>
                </ul>
            </div>
			
			<?php
					//Receber o Id da URL
					$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

					//Verificar se o ID possui valor
					if (!empty($id)) {
						//Incluir os arquivos
						require '../classes/Conexao.php';
						require '../classes/Sala.php';
						//Instanciar a classe e criar o objeto
						$visSala = new Sala();

						//Receber os dados do formulário
						$formDados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
					
						//Verificar se o usuário clicou no botão e a posição SendEditUsuario possui valor
						if (!empty($formDados['SendEditSala'])) {
							$editSala = new Sala();

							//Enviar os dados para o atributo formdados da classe ContasPagar
							$editSala->formDados = $formDados;

							//Instanciar o metodo editar
							$valor = $editSala->editar();


							if ($valor) {
								echo "<div class='alert alert-success' role='alert'>Sala editada com sucesso!</div>";
								//$_SESSION['msg'] = "<p style='color: green;'>Conta a pagar editada com sucesso!</p>";
								//header("Location: user-update.php");
							} else {
								echo "<div class='alert alert-danger' role='alert'>Sala não editada!</div>";
								//$_SESSION['msg'] = "<p style='color: #ff0000;'>Erro: Conta a pagar não editada</p>";
								//header("Location: user-update.php");
							}
						}

						//Enviar o ID par ao atributo da classe ContaPagar
						$visSala->id = $id;

						//Instaciar o método visualizar
						$result_vis_sala = $visSala->visualizar();

						extract($result_vis_sala);
					
				?>

            <!--Conteúdo principal-->
            <div class="container-fluid">
				<form  method="POST" action="" class="form-neon" autocomplete="off">
				<input type="hidden" name="id" value="<?php echo $id ?>">
					<fieldset>
						<legend><i class="far fa-plus-square"></i> &nbsp; Informação da sala</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="sala_codigo" class="bmd-label-floating">Códido</label>
										<input type="text"  class="form-control" name="sala_codigo" id="sala_codigo" value="<?php echo $codigo ?>">
									</div>
								</div>
								
								<div class="col-24 col-md-6">
									<div class="form-group">
										<label for="sala_nome" class="bmd-label-floating">Nome</label>
										<input type="text"  class="form-control" name="sala_nome" id="sala_nome" value="<?php echo $nome ?>">
										</div>
									</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="sala_tipo" class="bmd-label-floating">Tipo</label>
										<select class="form-control" name="sala_tipo" id="sala_tipo">
											<option value="" selected="" disabled="">Selecione uma opção</option>
											<option value="Laboratório">Laboratório</option>
											<option value="Auditório">Auditório</option>
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="sal_desc" class="bmd-label-floating">Descrição</label>
										<input type="text"  class="form-control" name="sal_desc" id="sal_desc" value="<?php echo $descricao ?>">
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<br><br><br>
					<p class="text-center" style="margin-top: 40px;">
						<button type="submit" class="btn btn-raised btn-success btn-sm" value="Atualizar" name="SendEditSala"><i class="fas fa-sync-alt"></i> &nbsp; ATUALIZAR</button>
					</p>
					<?php
						}else{
							echo "<div class='alert alert-danger' role='alert'>Sala não editada!</div>";
							//$_SESSION['msg'] = "<p style='color: #ff0000;'>Erro: Conta a pagar não encontrada!</p>";
							//header("Location: user-update.php");
						}
						?>
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