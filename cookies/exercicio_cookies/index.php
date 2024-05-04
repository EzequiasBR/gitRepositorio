<?php

if (!isset($_COOKIE['nome'])) {
   if ($_SERVER['REQUEST_METHOD'] != 'POST') {
      include 'formulario.php';
   }else{
      setcookie('nome',$_POST['text-nome'], time()+5);
   }
}else{
   echo 'Seja bem Vindo '. $_COOKIE['nome'] . ' de volta';
}

echo ' Terminado.';