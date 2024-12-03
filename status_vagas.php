<?php
// Configura o cabeçalho para retornar JSON
header('Content-Type: application/json');

// Recebe os dados enviados pelo Arduino
$vaga = isset($_GET['vaga1']) ? intval($_GET['vaga1']) : 0;  // Se o valor for 1, a vaga está ocupada, se for 0, a vaga está livre.

// Cria um array com o status da vaga
$vagas = [
    "vaga1" => $vaga ? "ocupada" : "livre",  // Vaga 1 (não há mais vaga 2)
];

// Caminho para o arquivo vagas.json
$jsonFile = 'vagas.json';

// Atualiza o arquivo vagas.json
if (file_put_contents($jsonFile, json_encode($vagas, JSON_PRETTY_PRINT))) {
    echo json_encode(["status" => "success", "message" => "Vaga atualizada."]);
} else {
    echo json_encode(["status" => "error", "message" => "Falha ao atualizar vaga."]);
}
?>
