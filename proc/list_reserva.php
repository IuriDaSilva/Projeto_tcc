<?php
/**
 * @author Cesar Szpak - Celke - cesar@celke.com.br
 * @pagina desenvolvida usando FullCalendar e Bootstrap 4,
 * o código é aberto e o uso é free,
 * porém lembre-se de conceder os créditos ao desenvolvedor.
 */
include '../classes/Conexao.php';

$query_events = "SELECT id_reserva,	nome_reserva, descricao, data_inicio, data_final FROM reservas";
$resultado_events = $conn->prepare($query_events);
$resultado_events->execute();

$eventos = [];
//var_dump($resultado_events);
while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
   // var_dump($row_events);
    $id = $row_events['id_reserva'];
    $nome_reserva = $row_events['title'];
    //$nome_resp = $row_events['nome_resp'];
    $descricao = $row_events['reserva_descricao'];
    $data_inicio = $row_events['data_inicio'];
    $data_final = $row_events['data_final'];
    
    $eventos[] = [
        'id_reserva' => $id, 
        'nome_reserva' => $nome_reserva, 
        //'nome_resp' => $nome_resp, 
        'descricao' => $descricao, 
        'data_inicio' => $data_inicio,
        'data_final' => $data_final,
        ];
}

echo json_encode($eventos);