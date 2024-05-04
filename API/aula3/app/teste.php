<?php

$url = 'http://localhost/API/aula3/get_clientePost.php';
$url_2 = 'http://localhost/API/aula3/get_todosClientes.php';

$data = json_decode(file_get_contents('php://input'),true);
require 'api_call.php';

// $dados = api_call($url,'POST',json_encode($data,128));
$dados_2 = api_call($url_2,'POST',json_encode($data,128));

// echo $dados;
echo $dados_2;