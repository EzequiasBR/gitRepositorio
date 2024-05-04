<?php
require 'gestor.php';

$gestor = new Gestor();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   if (isset($_POST['nome_cliente']) && isset($_POST['email_cliente']) && isset($_POST['telefone_cliente'])) {
      
      $nome_cliente = $_POST['nome_cliente'];
      $email_cliente = $_POST['email_cliente'];
      $telefone_cliente = $_POST['telefone_cliente'];
      $senha = $_POST['senha_cliente'];

      $params = array(
         ':nome' => $nome_cliente,
         ':email' => $email_cliente,
         ':telefone' => $telefone_cliente,
         ':senha'   => password_hash($senha, PASSWORD_DEFAULT)
      );

      $gestor->EXE_NON_QUERY("INSERT INTO clientes VALUES(0,:nome,:email,:telefone,:senha) ", $params);
   }
}

header("Location: form_cliente.php");