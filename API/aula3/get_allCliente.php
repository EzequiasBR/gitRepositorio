<?php
 require 'gestor.php';

 $bd = new Gestor();
 $id = $_GET['id'];

 $params = array(
   ':id_cliente' => $id
 );

 $dados = $bd-> EXE_QUERY("SELECT * FROM  clientes WHERE id_cliente = :id_cliente",$params);

echo json_encode($dados,128);