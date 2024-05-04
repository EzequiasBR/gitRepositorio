<?php
 require 'gestor.php';
 $bd = new Gestor();

 $data = json_decode(file_get_contents('php://input'),true);

 $id = $data;

 $params = array(
   ':id_cliente' => $id['id_cliente']
 );

 $dados = $bd-> EXE_QUERY("SELECT * FROM  clientes WHERE id_cliente = :id_cliente",$params);

echo json_encode($dados,128);