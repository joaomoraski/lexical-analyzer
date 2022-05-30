<?php
error_reporting(E_ERROR | E_PARSE);
include("Estados.php");

$token = new Token();
$estados = new Estados();
// Meu arquivo
$arquivo = 'entrada.txt';

// Verifica se o arquivo existe
if ( file_exists( $arquivo ) ) {

    // Envia cada linha do array para um índice de um array
    $handle = file( $arquivo );

    // Faz o laço
    foreach ($handle as $linha) {
        // Lê uma linha do arquivo (se existir)
        $linhaAtual = $linha;
        $estados->setVariaveis(trim(strtolower($linhaAtual)), 0);
        $token->tokens = $estados->verificarTokensDaLinha();
    }
}

var_dump($token->tokens);