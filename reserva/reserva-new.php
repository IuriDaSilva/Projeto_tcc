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
    <script src="../js/sweetalert2.min.js"></script>

    <!-- jQuery Custom Content Scroller V3.1.5 -->
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">

    <!-- General Styles -->
    <link rel="stylesheet" href="../css/style.css">

	<link href='../css/core/main.min.css' rel='stylesheet' />
        <link href='../css/daygrid/main.min.css' rel='stylesheet' />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/personalizado.css">

     
        

</head>
<body>
<?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
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
					<br><?php echo "". $_SESSION['usuarioNome'];?></br><br><small class="roboto-condensed-light">Coordenador</small>
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
									<a href="reserva-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nova reserva</a>
								</li>
								<li>
									<a href="reserva-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de reservas</a>
								</li>
								<li>
									<a href="reserva-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar reservas</a>
								</li>
								<li>
									<a href="reserva-pend.php"><i class="far fa-id-card"></i> &nbsp; Reservas pendentes</a>
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
        <section class="full-box page-content">
				<nav class="full-box navbar-info">
					<a href="#" class="float-left show-nav-lateral">
						<i class="fas fa-exchange-alt"></i>
					</a>
					<a href="../user/user-update.php">
						<i class="fas fa-user-cog"></i>
					</a>
					<a href="#" class="btn-exit-system">
						<i class="fas fa-power-off"></i>
					</a>
				</nav>
				<!-- Page header -->
				<div class="full-box page-header">
					<h3 class="text-left">
						<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; NOVA RESERVA
					</h3>
					<p class="text-justify">
					</p>
				</div>
				<div class="container-fluid">
					<ul class="full-box list-unstyled page-nav-tabs">
						<li>
							<a class="active" href="reserva-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; NOVA RESERVA</a>
						</li>
						<li>
							<a  href="reserva-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE RESERVAS</a>
						</li>
						<li>
							<a href="reserva-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR RESERVA</a>
						</li>
						<li>
							<a href="reserva-pend.php"><i class="far fa-id-card"></i> &nbsp; RESERVAS PENDENTES</a>
						</li>
					</ul>
				</div>
			
				<div class="container-fluid">
					<div class="container-fluid form-neon">
					<legend><i class="far fa-plus-square"></i> &nbsp; Agenda de reservas</legend>
						<object class="container-fluid" type="text/php" data="../calendario/index.php" width="1100" height="800">
					</div>
				</div>
			</section>
	</main>
</body>

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
	
	<!--<script src='../js/jquery.min.js'></script>
	<script src='../js/fullcalendar.min.js'></script>
	<script src='../locale/pt-br.js'></script>-->

</html>