<?php
session_start();
?>
<!--**
 * @author Cesar Szpak - Celke - cesar@celke.com.br
 * @pagina desenvolvida usando FullCalendar e Bootstrap 4,
 * o código é aberto e o uso é free, 
 * porém lembre-se de conceder os créditos ao desenvolvedor.
 *-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' />
        <link href='../css/core/main.min.css' rel='stylesheet' />
        <link href='../css/daygrid/main.min.css' rel='stylesheet' />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/personalizado.css">

        <script src='../js/core/main.min.js'></script>
        <script src='../js/interaction/main.min.js'></script>
        <script src='../js/daygrid/main.min.js'></script>
        <script src='../js/core/locales/pt-br.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="../js/personalizado.js"></script>
    </head>
    <body>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <div id='calendar'></div>
          <!--Visualizar-->
        <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detalhes do Evento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="visevent">
                            <dl class="row">
                                <dt class="col-sm-3">ID do evento</dt>
                                <dd class="col-sm-9" id="id"></dd>

                                <dt class="col-sm-3">Título do evento</dt>
                                <dd class="col-sm-9" id="title"></dd>

                                <dt class="col-sm-3">Descrição do evento</dt>
                                <dd class="col-sm-9" id="details"></dd>

                                <dt class="col-sm-3">Sala do evento</dt>
                                <dd class="col-sm-9" id="sala"></dd>

                                <dt class="col-sm-3">Início do evento</dt>
                                <dd class="col-sm-9" id="start"></dd>

                                <dt class="col-sm-3">Fim do evento</dt>
                                <dd class="col-sm-9" id="end"></dd>
                            </dl>
                            <button class="btn btn-warning btn-canc-vis">Editar</button>
                            <a href="" id="apagar_evento" class="btn btn-danger">Excluir</a>
                        </div>
         <!--Editar-->
                        <div class="formedit">
                            <span id="msg-edit"></span>
                            <form id="editevent" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="id" id="id" >
                            
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Título</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Título do evento">
                                    </div>
                                </div>

                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Descrição</label>
                                <div class="col-sm-10">
                                    <input type="text" name="details" class="form-control" id="details" placeholder="Descrição do evento">
                                </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Salas</label>
                                    <div class="col-sm-10">
                                        <select name="sala_ed" class="form-control" id="sala_ed">
                                            <option value="">Selecione</option>			
                                            <option style="color:#FFD700;" value="1">Audi 1</option>
                                            <option style="color:#0071c5;" value="2">Audi 2</option>
                                            <option style="color:#FF4500;" value="7">Audi 3</option>
                                            <option style="color:#8B4513;" value="3">Lab 1</option>	
                                            <option style="color:#1C1C1C;" value="4">Lab 2</option>
                                            <option style="color:#436EEE;" value="6">Lab 3</option>
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Início do evento</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)">
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Final do evento</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="end" class="form-control" id="end"  onkeypress="DataHora(event, this)">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="button" class="btn btn-primary btn-canc-edit">Cancelar</button>
                                        <button type="submit" name="EditEvent" id="EditEvent" value="EditEvent" class="btn btn-warning">Salvar</button>                                    
                                    </div>
                                </div>

                            </form>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Cadastrar-->
        <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Evento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span id="msg-cad"></span>
                        <form id="addevent" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Título</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Título do evento">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Descrição</label>
                                <div class="col-sm-10">
                                    <input type="text" name="details" class="form-control" id="details" placeholder="Descrição do evento">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Salas</label>
                                <div class="col-sm-10">
                                    <select name="sala" class="form-control" id="sala">
                                    <option value="">Selecione</option>			
                                            <option style="color:#FFD700;" value="1">Audi 1</option>
                                            <option style="color:#0071c5;" value="2">Audi 2</option>
                                            <option style="color:#FF4500;" value="7">Audi 3</option>
                                            <option style="color:#8B4513;" value="3">Lab 1</option>	
                                            <option style="color:#1C1C1C;" value="4">Lab 2</option>
                                            <option style="color:#436EEE;" value="6">Lab 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Início do evento</label>
                                <div class="col-sm-10">
                                    <input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Final do evento</label>
                                <div class="col-sm-10">
                                    <input type="text" name="end" class="form-control" id="end"  onkeypress="DataHora(event, this)">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-success">Cadastrar</button>                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
