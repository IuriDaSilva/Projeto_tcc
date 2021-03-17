<?php
	session_start();
	
?>
<!DOCTYPE php>
<php lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>LABSERV</title>

    <!-- Normalize V8.0.1 -->
    <link rel="stylesheet" href="./css/normalize.css">

    <!-- Bootstrap V4.3 -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!-- Bootstrap Material Design V4.0 -->
    <link rel="stylesheet" href="./css/bootstrap-material-design.min.css">

    <!-- Font Awesome V5.9.0 -->
    <link rel="stylesheet" href="./css/all.css">

    <!-- Sweet Alerts V8.13.0 CSS file -->
    <link rel="stylesheet" href="./css/sweetalert2.min.css">

    <!-- Sweet Alert V8.13.0 JS file-->
    <script src="./js/sweetalert2.min.js"></script>

    <!-- jQuery Custom Content Scroller V3.1.5 -->
    <link rel="stylesheet" href="./css/jquery.mCustomScrollbar.css">

    <!-- General Styles -->
    <link rel="stylesheet" href="./css/style.css">


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
                   <img src="./assets/avatar/Avatar.png" class="img-fluid" alt="Avatar">
                   <figcaption class="roboto-medium text-center">
                   <br><?php echo "". $_SESSION['usuarioNome'];?></br> <br><small><?php echo "". $_SESSION['usuarioCargo'];?></small></br>
                   </figcaption>
               </figure>
               <div class="full-box nav-lateral-bar"></div>
               <nav class="full-box nav-lateral-menu">
                   <ul>
                       <li>
                           <a href="home.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Início</a>
                       </li>

                       <li>
                           <a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Usuarios <i class="fas fa-chevron-down"></i></a>
                           <ul>
                               <li>
                                   <a href="user/user-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Novo usuario</a>
                               </li>
                               <li>
                                   <a href="user/user-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de usuarios</a>
                               </li>
                               <li>
                                   <a href="user/user-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar usuario</a>
                               </li>
                           </ul>
                       </li>

                       <li>
                           <a href="#" class="nav-btn-submenu"><i class="fas fa-store-alt fa-fw"></i> &nbsp; Salas <i class="fas fa-chevron-down"></i></a>
                           <ul>
                               <li>
                                   <a href="sala/sala-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nova sala</a>
                               </li>
                               <li>
                                   <a href="sala/sala-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de salas</a>
                               </li>
                               <li>
                                   <a href="sala/sala-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar salas</a>
                               </li>
                           </ul>
                       </li>

                       <li>
								<a href="#" class="nav-btn-submenu"><i class="far fa-address-card fa-fw"></i> &nbsp; Reservas <i class="fas fa-chevron-down"></i></a>
								<ul>
								<li>
									<a href="reserva/reserva-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nova reserva</a>
								</li>
								<li>
									<a href="reserva/reserva-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Histórico de reservas</a>
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
        
      <section class="full-box page-content">
            <nav class="full-box navbar-info">
                <a href="#" class="float-left show-nav-lateral">
                    <i class="fas fa-exchange-alt"></i>
                </a>
                <a href="user/edit-perfil.php">
                    <i class="fas fa-user-cog"></i>
                </a>
                <a href="#" class="btn-exit-system">
                    <i class="fas fa-power-off"></i>
                </a>
            </nav>
            <!-- Page header -->
            <div class="full-box page-header">
                <h3 class="text-left">
                    <i class="fas fa-info-circle"></i> &nbsp; ENTRE EM CONTATO CONOSCO
                </h3>
                <p class="text-justify">
                </p>
            </div>

            <!--CONTENT-->
            <div class="container-fluid">
                <form action="" class="form-neon" autocomplete="off">
                    <fieldset>
                        <legend><i class="far fa-building"></i> &nbsp; Você pode informar um problema ou dar uma sugestão de melhoria.</legend>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="info_nome" class="bmd-label-floating">Seu nome</label>
                                        <input type="text" class="form-control" name="empresa_nombre" id="empresa_nombre" maxlength="70">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="info_email" class="bmd-label-floating">Email</label>
                                        <input type="email" class="form-control" name="empresa_email" id="empresa_email" maxlength="70">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="info_telefone" class="bmd-label-floating">Telefone</label>
                                        <input type="text" class="form-control" name="empresa_telefono" id="empresa_telefono" maxlength="20">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="info_descricao" class="bmd-label-floating">Descrição do problema ou melhoria</label>
                                        <input type="text" class="form-control" name="empresa_direccion" id="empresa_direccion" maxlength="250">
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="info_mensagem" class="bmd-label-floating">Mensagem</label>
                                        <input type="text" class="form-control" name="empresa_direccion" id="empresa_direccion" maxlength="250">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <br><br><br>
                    <p class="text-center" style="margin-top: 40px;">
                        <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; APAGAR</button>
                        &nbsp; &nbsp;
                        <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-share-square"></i> &nbsp; ENVIAR</button>
                    </p>
                </form>
            </div>
        </section>
    </main>


    <!--=============================================
	=            Include JavaScript files           =
	==============================================-->
    <!-- jQuery V3.4.1 -->
    <script src="./js/jquery-3.4.1.min.js"></script>

    <!-- popper -->
    <script src="./js/popper.min.js"></script>

    <!-- Bootstrap V4.3 -->
    <script src="./js/bootstrap.min.js"></script>

    <!-- jQuery Custom Content Scroller V3.1.5 -->
    <script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Bootstrap Material Design V4.0 -->
    <script src="./js/bootstrap-material-design.min.js"></script>
    <script>
        $(document).ready(function() {
            $('body').bootstrapMaterialDesign();
        });
    </script>

    <script src="./js/main.js"></script>
</body></php>