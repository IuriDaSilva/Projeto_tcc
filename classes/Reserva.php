<?php
		
	date_default_timezone_set('UTC');

	class Reserva extends Conexao{

		public int $id;
		public object $conn;
		public array $formReserva;
		public int $id_usuario;

		

		public function listar() {
			
			$this->conn = $this->connect();
			$query_events = "SELECT reservas.*, salas.nome FROM reservas 
   			 INNER JOIN salas ON reservas.id_sala = salas.id_sala";

			$resultado_events = $this->conn->prepare($query_events);
			$resultado_events->execute();

			$eventos = [];

			while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
				$id = $row_events['id'];
				$title = $row_events['title'];
				$details = $row_events['details'];
				$color = $row_events['id_sala'];
				$nome = $row_events['nome'];
				$start = $row_events['start'];
				$end = $row_events['end'];
				
				$eventos[] = [
					'id' => $id, 
					'title' => $title, 
					'details' => $details,
					'id_sala' => $color, 
					'nome' => $nome,
					'start' => $start, 
					'end' => $end, 
					];
			}

			echo json_encode($eventos);
		 
		}

	
		public function cadastrar() {
		$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

		//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
		$data_start = str_replace('/', '-', $dados['start']);
		$data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));

		$data_end = str_replace('/', '-', $dados['end']);
		$data_end_conv = date("Y-m-d H:i:s", strtotime($data_end));

		$query_event =  "INSERT INTO reservas (title, details, start, end, id_sala) VALUES (:title, :details, :start, :end, :sala)";
				
		$insert_event =$this->conn->prepare($query_event);
		$insert_event->bindParam(':title', $dados['title']);
		$insert_event->bindParam(':details', $dados['details']);
		$insert_event->bindParam(':start', $data_start_conv);
		$insert_event->bindParam(':end', $data_end_conv);
		$insert_event->bindParam(':sala', $dados['sala']);

		if ($insert_event->execute()) {
			$retorna = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Evento cadastrado com sucesso!</div>'];
			$_SESSION['msg'] = '<div class="alert alert-success" role="alert">Evento cadastrado com sucesso!</div>';
		} else {
			$retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Evento não foi cadastrado com sucesso!</div>'];
		}


		header('Content-Type: application/json');
		echo json_encode($retorna);
		}
		public function editar()  {
			$this->conn = $this->connect();
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
			$data_start = str_replace('/', '-', $dados['start']);
			$data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));
			
			$data_end = str_replace('/', '-', $dados['end']);
			$data_end_conv = date("Y-m-d H:i:s", strtotime($data_end));
			
			$query_event = "UPDATE reservas SET title=:title, details=:details, start=:start, end=:end 
				WHERE id=:id";
			
			$update_event =$this->conn->prepare($query_event);
			$update_event->bindParam(':title', $dados['title']);
			$update_event->bindParam(':details', $dados['details']);
			$update_event->bindParam(':start', $data_start_conv);
			$update_event->bindParam(':end', $data_end_conv);
			//$update_event->bindParam(':sala', $dados['sala_ed']);
			$update_event->bindParam(':id', $dados['id']);
			
			if ($update_event->execute()) {
			
				$retorna = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Evento editado com sucesso!</div>'];
				$_SESSION['msg'] = '<div class="alert alert-success" role="alert">Evento editado com sucesso!</div>';
			} else {
				$retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Evento não foi editado com sucesso!</div>'];
			}
			
			
			header('Content-Type: application/json');
			echo json_encode($retorna);
			
		}
		public function apagar() {
			$this->conn = $this->connect();
			$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

			if (!empty($id)) {
				$query_event = "DELETE FROM reservas WHERE id=:id";
				$delete_event =$this->conn->prepare($query_event);
				
				$delete_event->bindParam("id", $id);
				
				if($delete_event->execute()){
					$_SESSION['msg'] = '<div class="alert alert-success" role="alert">O evento foi apagado com sucesso!</div>';
					header("Location: index.php");
				}else{
					$_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Erro: O evento não foi apagado com sucesso!</div>';
					header("Location: index.php");
				}
			} else {
				$_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Erro: O evento não foi apagado com sucesso!</div>';
				header("Location: index.php");
			}
       
		}
		
		

		
}


	
?>