<?php
   
   $id_cliente = $_GET['id'];
   
   require './app/api_call.php';
   
   $data = array(
      'id_cliente' => $id_cliente
   );

   $cliente = callPost("http://localhost/gitRepositorio/API/aula3/get_clientePost.php", json_encode($data,128));
   $cliente = json_decode($cliente, 128)[0];

   ?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
   </head>
   <body>
      <h3><?php echo $cliente['nome']  ?></h3>
      <h4><?php echo $cliente['email'] ?></h4>
      <h4><?php echo $cliente['telefone'] ?></h4>

      <div><a href="<?php echo './app/index.php' ?>">Voltar</a></div>
   </body>
   </html>
