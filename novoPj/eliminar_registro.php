<?php
session_start();
include 'criptos.php';

if (isset($_SESSION['cripto'])) {
   $dados = $_SESSION['cripto']['idCripto'];
   $iv = $_SESSION['cripto']['iv'];
   $id = descriptografar($dados, $iv);
   
   if ($id == false) {
      header("Location: index.php");
   }

   include 'gestor.php';
   $gestor = new Gestor();

   $params = array(
      ':id' => $id
   );

   $usuario = $gestor->EXE_NON_QUERY("DELETE FROM usuarios WHERE id =:id", $params);

   header("Location: index.php");
}
