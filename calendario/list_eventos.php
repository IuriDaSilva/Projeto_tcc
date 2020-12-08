<?php
/**
 * @author Cesar Szpak - Celke - cesar@celke.com.br
 * @pagina desenvolvida usando FullCalendar e Bootstrap 4,
 * o código é aberto e o uso é free,
 * porém lembre-se de conceder os créditos ao desenvolvedor.
 */
include 'conexao.php';

$query_events = "SELECT reservas.*, salas.nome FROM reservas 
    INNER JOIN salas ON reservas.id_sala = salas.id_sala";

$resultado_events = $conn->prepare($query_events);
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