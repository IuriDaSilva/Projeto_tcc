<?php
	//Incluir a conexão com banco de dados
	include_once('../classes/Conexao.php');
	
	//Recuperar o valor da palavra
	$cursos = $_POST['palavra'];
	
	//Pesquisar no banco de dados nome do curso referente a palavra digitada pelo usuário
	$cursos = "SELECT * FROM usuarios WHERE nome LIKE '%$cursos%'";
	$resultado_cursos = mysqli_query($conn, $cursos);
	
    if(mysqli_num_rows($resultado_cursos) <= 0){?>
    
       
                    <?php
        echo "Nenhum usuário encontrado...";
	}else{
		while($rows = mysqli_fetch_assoc($resultado_cursos)){?>
			 <div class="container-fluid">
			<div class="table-responsive">
			<table class="table table-dark table-sm" id="example">
				<thead>
					<tr class="text-center roboto-medium">
						<th>ID</th>
						<th>MATRÍCULA</th>
						<th>NOME</th>
						<th>CPF</th>
						<th>TELEFONE</th>
						<th>ENDEREÇO</th>
						<th>EMAIL</th>
						<th>EDITAR</th>
						<th>EXCLUIR</th>
					</tr>
				</thead>
				<tbody>
            <tr class="text-center" >
				<th><?php echo $rows['id_usuario']; ?></th>
				<td><?php echo $rows['matricula']; ?></td>
				<td><?php echo $rows['nome']; ?></td>
				<td><?php echo $rows['cpf']; ?></td>
				<td><?php echo $rows['telefone']; ?></td>
				<td><?php echo $rows['endereco']; ?></td>
				<td><?php echo $rows['email']; ?></td>
				<td>
					<?php echo "<a class='btn btn-success' href='user-update.php?id=". $rows['id_usuario'] . "'>
					<i class='fas fa-sync-alt'></i>	
					</a>"?>
				</td>
				<td>
					<?php echo "<a class='btn btn-warning btn-delete-usuario' href='user-delete.php?id=". $rows['id_usuario'] ."'data-confirm='Tem certeza de que deseja excluir o item selecionado?'>
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
