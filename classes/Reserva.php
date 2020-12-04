<?php
		
	date_default_timezone_set('UTC');

	class Reserva extends Conexao{

		public int $id;
		public object $conn;
		public array $formReserva;
		public int $id_usuario;

		 // Tests whether the given ISO8601 string has a time-of-day or not
		 const ALL_DAY_REGEX = '/^\d{4}-\d\d-\d\d$/'; // matches strings like "2013-12-29"

		 public $title;
		 public $allDay; // a boolean
		 public $start; // a DateTime
		 public $end; // a DateTime, or null
		 public $properties = array(); // an array of other misc properties
	
		

		public function listar(): array {
			$this->conn = $this->connect();
			$query_reserva = "SELECT id_reserva, nome_reserva, nome_resp, descricao, data_inicio, data_final
			 FROM reservas
			 ORDER BY id_reserva DESC
			 LIMIT 5";
			$result_reserva = $this->conn->prepare($query_reserva);
			$result_reserva->execute();
			$retorno = $result_reserva->fetchAll();
			return $retorno;
		}

		public function visualizar(): array {
			$this->conn = $this->connect();
			$query_reserva = "SELECT id_reserva, nome_reserva, nome_resp, descricao, data_inicio, data_final
					FROM reservas
					WHERE id_reserva =:id
					LIMIT 1";
			$result_reserva = $this->conn->prepare($query_reserva);
			$result_reserva->bindParam(':id', $this->id, PDO::PARAM_INT);
			$result_reserva->execute();
			$retorno = $result_reserva->fetch();
			return $retorno;
		}

		public function cadastrar(): bool {
			//var_dump($this->formDados);	
			$this->conn = $this->connect();
			$id_usuario = $_SESSION['usuarioId'];
			var_dump($id_usuario);
			$query_cad_reservas = "INSERT INTO reservas 
						(nome_reserva, nome_resp, descricao, data_inicio, data_final, id_sala, id_usuario)
					VALUES (:nome_reserva, :nome_resp, :descricao, :data_inicio, :data_final, :id_sala, :id_usuario)";
			
			$cad_reserva = $this->conn->prepare($query_cad_reservas);
		
			
			$cad_reserva->bindParam(':nome_reserva', $this->formDados['evento_nome']);
			$cad_reserva->bindParam(':nome_resp', $this->formDados['resp_nome']);
			$cad_reserva->bindParam(':descricao', $this->formDados['reserva_descricao']);
			$cad_reserva->bindParam(':data_inicio', $this->formDados['data_inicio']);
			$cad_reserva->bindParam(':data_final', $this->formDados['data_final']);
			$cad_reserva->bindParam(':id_sala', $this->formDados['nome_sala']);
			$cad_reserva->bindParam(':id_usuario', $this->$id_usuario);
		
			$cad_reserva->execute();
			//var_dump($cad_reserva);
			if($cad_reserva->rowCount()){
				return true;
			}else{
				return false;
			}
		}
		public function editar() : bool {
			$this->conn = $this->connect();
			//var_dump($this->formDados);
			$query_edit_reserva = "UPDATE reservas
					SET nome_reserva=:nome_reserva, nome_resp=:nome_resp, descricao=:descricao, hora_inicio=:hora_inicio, hora_final=:hora_final
					WHERE id_reserva=:id";
	
			$edit_reserva = $this->conn->prepare($query_edit_reserva);
			$edit_reserva->bindParam(':nome_reserva', $this->formDados['sala_codigo']);
			$edit_reserva->bindParam(':nome_resp', $this->formDados['sala_nome']);
			$edit_reserva->bindParam(':descricao', $this->formDados['sala_tipo']);
			$edit_reserva->bindParam(':hora_inicio', $this->formDados['sala_descricao']);
			$edit_reserva->bindParam(':hora_final', $this->formDados['sala_descricao']);
			$edit_reserva->execute();
       
			if($edit_reserva->rowCount()){
				return true;
			}else{
				return false;
			}     
		}
		public function apagar(): bool {
			$this->conn = $this->connect();
			$query_reserva_pg = "DELETE FROM reservas WHERE id_reserva=:id";
			$apagar_reserva = $this->conn->prepare($query_reserva_pg);
			$apagar_reserva->bindParam(':id', $this->id, PDO::PARAM_INT);
			$retorno = $apagar_reserva->execute();
			return $retorno;        
		}
		 //Listar usuarios 
		 public function buscar(): array {
			$this->conn = $this->connect();
			$query_reserva= "SELECT  id_reserva , nome_reserva, nome_resp, descricao, hora_inicio, hora_final
					FROM reservas
					WHERE nome_reserva=:nome_reserva
					LIMIT 1";
			$busca_reserva = $this->conn->prepare($query_reserva);
			$busca_reserva->bindParam(':nome_reserva', $this->id, PDO::PARAM_INT);
			$busca_reserva->execute();
			$retorno = $busca_reserva->fetchAll();
			//var_dump($retorno);
			return $retorno;
		 }

		 public function __construct($array, $timeZone=null) {

			$this->title = $array['title'];
		
			if (isset($array['allDay'])) {
			  // allDay has been explicitly specified
			  $this->allDay = (bool)$array['allDay'];
			}
			else {
			  // Guess allDay based off of ISO8601 date strings
			  $this->allDay = preg_match(self::ALL_DAY_REGEX, $array['start']) &&
				(!isset($array['end']) || preg_match(self::ALL_DAY_REGEX, $array['end']));
			}
		
			if ($this->allDay) {
			  // If dates are allDay, we want to parse them in UTC to avoid DST issues.
			  $timeZone = null;
			}
		
			// Parse dates
			$this->start = parseDateTime($array['start'], $timeZone);
			$this->end = isset($array['end']) ? parseDateTime($array['end'], $timeZone) : null;
		
			// Record misc properties
			foreach ($array as $name => $value) {
			  if (!in_array($name, array('title', 'allDay', 'start', 'end'))) {
				$this->properties[$name] = $value;
			  }
			}
		  }
		
		  public function isWithinDayRange($rangeStart, $rangeEnd) {

			// Normalize our event's dates for comparison with the all-day range.
			$eventStart = stripTime($this->start);
		
			if (isset($this->end)) {
			  $eventEnd = stripTime($this->end); // normalize
			}
			else {
			  $eventEnd = $eventStart; // consider this a zero-duration event
			}
		
			// Check if the two whole-day ranges intersect.
			return $eventStart < $rangeEnd && $eventEnd >= $rangeStart;
		  }
		
		   // Converts this Event object back to a plain data array, to be used for generating JSON
  public function toArray() {

    // Start with the misc properties (don't worry, PHP won't affect the original array)
    $array = $this->properties;

    $array['title'] = $this->title;

    // Figure out the date format. This essentially encodes allDay into the date string.
    if ($this->allDay) {
      $format = 'Y-m-d'; // output like "2013-12-29"
    }
    else {
      $format = 'c'; // full ISO8601 output, like "2013-12-29T09:00:00+08:00"
    }

    // Serialize dates into strings
    $array['start'] = $this->start->format($format);
    if (isset($this->end)) {
      $array['end'] = $this->end->format($format);
    }

    return $array;
  }

}


// Date Utilities
//----------------------------------------------------------------------------------------------


// Parses a string into a DateTime object, optionally forced into the given timeZone.
function parseDateTime($string, $timeZone=null) {
  $date = new DateTime(
    $string,
    $timeZone ? $timeZone : new DateTimeZone('UTC')
      // Used only when the string is ambiguous.
      // Ignored if string has a timeZone offset in it.
  );
  if ($timeZone) {
    // If our timeZone was ignored above, force it.
    $date->setTimezone($timeZone);
  }
  return $date;
}


// Takes the year/month/date values of the given DateTime and converts them to a new DateTime,
// but in UTC.
function stripTime($datetime) {
  return new DateTime($datetime->format('Y-m-d'));
}


	
?>