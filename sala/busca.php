<?php
	//Incluir a conexão com banco de dados
	include_once('../classes/Conexao.php');
	
	//Recuperar o valor da palavra
	$cursos = $_POST['palavra'];
	
	//Pesquisar no banco de dados nome do curso referente a palavra digitada pelo usuário
	$cursos = "SELECT * FROM salas WHERE nome LIKE '%$cursos%'";
	$resultado_cursos = mysqli_query($conn, $cursos);
	
    if(mysqli_num_rows($resultado_cursos) <= 0){?>
    
       
                    <?php
        echo "Nenhuma sala encontrada...";
	}else{
		while($rows = mysqli_fetch_assoc($resultado_cursos)){?>
			<div class="container-fluid">
			<div class="table-responsive">
			<table class="table table-dark table-sm" id="example">
				<thead>
					<tr class="text-center roboto-medium">
					    <th>ID</th>
						<th>CÓDIGO</th>
						<th>NOME</th>
						<th>TIPO</th>
						<th>EDITAR</th>
						<th>EXCLUIR</th>
					</tr>
				</thead>
				<tbody>
            <tr class="text-center" >
				<th><?php echo $rows['id_sala']; ?></th>
				<td><?php echo $rows['codigo']; ?></td>
				<td><?php echo $rows['nome']; ?></td>
				<td><?php echo $rows['tipo']; ?></td>
				<td>
					<?php echo "<a class='btn btn-success' href='user-update.php?id=". $rows['id_sala'] . "'>
					<i class='fas fa-sync-alt'></i>	
					</a>"?>
				</td>
				<td>
					<?php echo "<a class='btn btn-warning btn-delete-usuario' href='user-delete.php?id=". $rows['id_sala'] ."'data-confirm='Tem certeza de que deseja excluir o item selecionado?'>
					<i class='far fa-trash-alt'></i>
					</a>"?>
				</td>
            </tr> 
    	</tbody>
    </table>
    </div>
        </div>
    
	<?php	}
	}
?>
