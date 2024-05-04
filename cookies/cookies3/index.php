<?php

// // $dados = array(
// //    'nome' => 'Ezequias',
// //    'sobrenome' => 'Santos',
// //    'idade' => '29'
// // );
   
// setcookie('dados',json_encode($dados),time() + 1000);


$dados = json_decode($_COOKIE['dados'] , 128);

echo "<pre>";

echo "olá ". $dados['nome'] .' '. $dados['sobrenome'] . " a sua Idade é ". $dados['idade'] . ' anos';