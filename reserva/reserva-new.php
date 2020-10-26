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
							<a href="../company.php"><i class="fas fa-info-circle"></i> &nbsp; Informações</a>
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
            
            <!--CONTENT-->
            <div class="container-fluid">
            	<div class="container-fluid form-neon">
                    <form action="" autocomplete="off">
						<fieldset>
							<legend><i class="far fa-plus-square"></i> &nbsp; Dados da reserva</legend>
							<div class="container-fluid">
								<div class="row">
									<div class="col-12 col-md-6">
	                                    <div class="form-group">
	                                        <label for="tipo_sala" class="bmd-label-floating">Tipo de sala</label>
	                                        <select class="form-control" name="tipo_sala" id="tipo_sala">
	                                            <option value="" selected="" disabled="">Selecione uma opção</option>
	                                            <option value="Auditorio">Auditório</option>
	                                            <option value="Laboratorio">Laboratório</option>
	                                        </select>
	                                    </div>
	                                </div>
                                    <div class="col-12 col-md-6">
	                                    <div class="form-group">
	                                        <label for="nome_sala" class="bmd-label-floating">Selecione a sala</label>
	                                        <select class="form-control" name="nome_sala" id="nome_sala">
	                                            <option value="" selected="" disabled="">Selecione uma opção</option>
                                                <option value="Auditorio">Audi 1</option>
                                                <option value="Auditorio">Audi 2</option>
                                                <option value="Laboratorio">Lab 1</option>
                                                <option value="Laboratorio">Lab 2</option>
	                                        </select>
	                                    </div>
	                                </div>
									<div class="col-12 col-md-4">
										<div class="form-group">
											<label for="data_reserva">Data da reserva</label>
											<input type="date" class="form-control" name="data_reserva" id="data_reserva">
										</div>
									</div>
									
									<div class="col-12 col-md-4">
										<div class="form-group">
                                            <label for="hora_reserva">Hora da reserva</label>
                                            <select class="form-control" name="hora_reserva" id="hora_reserva">
	                                            <option value="" selected="" disabled="">Selecione uma opção</option>
	                                            <option value="">10:00</option>
	                                            <option value="">11:00</option>
	                                            <option value="">12:00</option>
	                                        </select>
										</div>
									</div>
									<div class="col-12 col-md-4">
	                                    <div class="form-group">
	                                        <label for="hora_entrega" >Hora de entrega</label>
	                                        <select class="form-control" name="hora_entrega" id="hora_entrega">
	                                            <option value="" selected="" disabled="">Selecione uma opção</option>
	                                            <option value="">12:00</option>
	                                            <option value="">14:00</option>
	                                            <option value="">16:00</option>
	                                        </select>
	                                    </div>
                                    </div>
                                    
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label for="evento_nome" class="bmd-label-floating">Nome do evento</label>
											<input type="text"  class="form-control" name="evento_nome" id="evento_nome" maxlength="100">
										</div>
									</div>
	                                <div class="col-12 col-md-6">
	                                    <div class="form-group">
	                                        <label for="responsavel_nome" class="bmd-label-floating">Nome do responsável</label>
	                                        <input type="text"  class="form-control" name="responsavel_nome" id="responsavel_nome" maxlength="100">
	                                    </div>
	                                </div>
	                                <div class="col-12">
	                                    <div class="form-group">
	                                        <label for="reserva_descricao" class="bmd-label-floating">Descrição</label>
	                                        <input type="text" class="form-control" name="reserva_descricao" id="reserva_descricao" maxlength="400">
	                                    </div>
	                                </div>
								</div>
							</div>
						</fieldset>
						<br><br><br>
						<p class="text-center" style="margin-top: 40px;">
							<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; APAGAR</button>
							&nbsp; &nbsp;
							<button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; SALVAR</button>
						</p>
					</form> 
            	</div>
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