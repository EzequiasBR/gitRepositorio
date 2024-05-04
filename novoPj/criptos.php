<?php
function criptografar($dados)
{  
   $fraseSecreta = 'não olher';
   $chave = hash('sha256', $fraseSecreta);
   // Método de criptografia
   $metodo = 'AES-256-CBC';
   // Cria um vetor de inicialização não nulo
   $tamanho_iv = openssl_cipher_iv_length($metodo);
   $iv = openssl_random_pseudo_bytes($tamanho_iv);
   $idCripto = openssl_encrypt($dados, $metodo, $chave, OPENSSL_RAW_DATA, $iv);
   return array('idCripto' => $idCripto,'iv' => $iv);
}

function descriptografar($dados, $iv){
    // Chave de criptografia - deve ser a mesma usada para criptografia
    $fraseSecreta = 'não olher';
    $chave = hash('sha256', $fraseSecreta);
    // Método de criptografia
    $metodo = 'AES-256-CBC';
    // Descriptografa os dados
    $idDescripto = openssl_decrypt($dados, $metodo, $chave, OPENSSL_RAW_DATA, $iv);
    // Retorna os dados descriptografados
    $inteiro = intval($idDescripto);
    return $inteiro;
}