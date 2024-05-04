<?php
include 'gestor.php';

$gestor = new Gestor();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if (isset($_POST['nome']) && isset($_POST['finalScore'])) {

      $nome = $_POST['nome'];
      $pontuacaoNova =  $_POST['finalScore'] + 0;

      //FERIFICAR AQUANTIDADE DE JOGADORES
      $todosJogadores = $gestor->EXE_QUERY("SELECT COUNT(*) AS total FROM jogadores");

      if ($todosJogadores[0]['total'] >= 10) {
         // Primeiro, obtenha o ID do jogador com a menor pontuação
         $idMenor_pontuacao = $gestor->EXE_QUERY("SELECT id FROM jogadores ORDER BY pontuacao ASC LIMIT 1");
         $pontuacaoJogado = $gestor->EXE_QUERY("SELECT pontuacao FROM jogadores ORDER BY pontuacao ASC LIMIT 1");

         if ($pontuacaoNova > $pontuacaoJogado[0]['pontuacao']) {
            $id_do_jogador = $idMenor_pontuacao[0]['id'];
            //remove esse jogador da tabela
            $params = array(':id' => $id_do_jogador);
            // Definir os parâmetros para a consulta
            $params = array(
               ':id' => $id_do_jogador,
               ':nome' => $nome,
               ':nova_pontuacao' => $pontuacaoNova
            );
            // Execute a consulta
            $gestor->EXE_NON_QUERY("UPDATE jogadores SET nome = :nome, pontuacao = :nova_pontuacao WHERE id = :id", $params);
         }
      } else {
         $params = array(
            ':nome' => $nome,
            ':nova_pontuacao' => $pontuacaoNova
         );

         $todosJogadores = $gestor->EXE_QUERY("SELECT COUNT(*) AS total FROM jogadores");
         $pontuacao_doPlacar_menor = $gestor->EXE_QUERY("SELECT pontuacao FROM jogadores ORDER BY pontuacao ASC LIMIT 1");
         if ($todosJogadores[0]['total'] < 10) {
            if ($pontuacaoNova > $pontuacao_doPlacar_menor[0]['pontuacao']) {
               $gestor->EXE_NON_QUERY(" INSERT INTO jogadores (nome, pontuacao) VALUES (:nome, :nova_pontuacao)", $params);
            } elseif ($pontuacaoNova < $pontuacao_doPlacar_menor) {
            }
         }
      }
   } else {
      echo "Nome não definido!";
   }
} else {
   echo "Método de requisição inválido!";
}
