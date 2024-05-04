<?php

$resposta = array(
'status' => 'success',
'mensagem' => 'API está a funcionar corretamente',
'data' => array(),
'charset' => 'charset="UTF-8"',
'request_id' => time()
);


echo json_encode($resposta, 128);