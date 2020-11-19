<?php
session_start();
?>
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
									<a href="../reserva/reserva-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de reservas</a>
								</li>
								<li>
									<a href="../reserva/reserva-search.php"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; Buscar reservas</a>
								</li>
								<li>
									<a href="../reserva/reserva-pend.php"><i class="fas fa-hand-holding-usd fa-fw"></i> &nbsp; Reservas pendentes</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="../company.php"><i class="fas fa-info-circle"></i> &nbsp; Contato</a>
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
                <a href="user/user-update.php">
                    <i class="fas fa-user-cog"></i>
                </a>
                <a href="#" class="btn-exit-system">
                    <i class="fas fa-power-off"></i>
                </a>
            </nav>
             <!-- Abas de decrição -->
            <div class="full-box page-header">
                <h3 class="text-left">
                    <i class="fas fa-plus fa-fw"></i> &nbsp; NOVA SALA
                </h3>
                <p class="text-justify">
                
                </p>
            </div>
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a class="active" href="sala-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; NOVA SALA</a>
                    </li>
                    <li>
                        <a href="sala-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE SALAS</a>
                    </li>
                    <li>
                        <a href="sala-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR SALAS</a>
                    </li>
                </ul>
            </div>
            
			<!--Conteúdo principal-->
			<?php
					require '../classes/Conexao.php';
					require '../classes/Sala.php';

					$formDados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
					//var_dump($formDados);

					if (!empty($formDados['NewSala'])) {
						$cadSala = new Sala();
						$cadSala->formDados = $formDados;
						$valor = $cadSala->cadastrar();
						var_dump($valor);
						if ($valor) {
							echo 'Usuário cadastrado com sucesso!';
							//$_SESSION['msg'] = "<p style='color: green;'> Conta a pagar cadastrada com sucesso! </p>";
							//header("../user/user-new.php");
						} else {
							echo 'Usuário não cadastrado com sucesso!';
							//$_SESSION['msg'] = "<p style='color: #ff0000;'> Erro: Conta a pagar não cadastrada com sucesso! </p>";
							//header("../user/user-new.php");
						}
					}
				?>
            <div class="container-fluid">
				<form method="POST" action="" class="form-neon" autocomplete="off">
					<fieldset>
						<legend><i class="far fa-plus-square"></i> &nbsp; Informação da sala</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="sala_codigo" class="bmd-label-floating">Códido</label>
										<input type="text"  class="form-control" name="sala_codigo" id="sala_codigo" maxlength="45">
									</div>
								</div>
								
								<div class="col-24 col-md-6">
									<div class="form-group">
										<label for="sala_nome" class="bmd-label-floating">Nome</label>
										<input type="text"  class="form-control" name="sala_nome" id="sala_nome" maxlength="140">
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
										<label for="sala_descricao" class="bmd-label-floating">Descrição</label>
										<input type="text"  class="form-control" name="sala_descricao" id="sala_descricao" maxlength="190">
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<br><br><br>
					<p class="text-center" style="margin-top: 40px;">
						<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; APAGAR</button>
						&nbsp; &nbsp;
						<button type="submit" class="btn btn-raised btn-info btn-sm" value="Cadastrar" name="NewSala"><i class="far fa-save"></i> &nbsp; SALVAR</button>
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
</html>