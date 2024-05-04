<?php

$nome = 'meu_cookies';
$valor = rand(0,1000);

if(!isset($_COOKIE[$nome])){
   setcookie($nome, strval($valor), time() + 5);
}

echo 'Terminado';