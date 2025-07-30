<?php

// Este é um exemplo minimalista para o Lambda PHP FPM
// Ele espera o JSON de entrada no stdin, processa e envia a saída para stdout

// Apenas para depuração, você pode ver isso nos logs do CloudWatch
error_log('Lambda function starting up.');

// Lê o corpo da requisição (se houver)
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Prepara uma resposta simples
$response = [
    'statusCode' => 200,
    'headers' => [
        'Content-Type' => 'application/json',
    ],
    'body' => json_encode(['message' => 'Hello from minimal PHP Lambda!', 'received' => $data]),
];

// Imprime a resposta para stdout, que o Lambda captura e usa como retorno da função
echo json_encode($response);

error_log('Lambda function finished processing.');

?>
