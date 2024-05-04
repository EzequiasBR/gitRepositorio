<?php
include 'gestor.php';

$gestor = new Gestor();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if (isset($_POST['nome'])) {

      $nome_jogador = $_POST['nome'];
      
      $params = array(
         ':nome' => $nome_jogador
      );

      // VERIFICAR SE O NOME JÁ EXISTE
      $verificar_nome = $gestor->EXE_QUERY("SELECT * FROM jogadores WHERE nome = :nome", $params);

      echo json_encode($verificar_nome);
   }
}
