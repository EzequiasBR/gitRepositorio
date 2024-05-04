<?php
 require 'gestor.php';

 $bd = new Gestor();

 $dados = $bd-> EXE_QUERY("SELECT * FROM  clientes");

echo json_encode($dados,128);