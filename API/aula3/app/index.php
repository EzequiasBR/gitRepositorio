<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <?php 
     require 'api_call.php';

   $clientes = callGet("http://localhost/gitRepositorio/API/aula3/get_todosClientes.php");
   $clientes = json_decode($clientes, 128);
   ?>
   
   <table>
      <thead>
         <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach($clientes as $cliente): ?>
         <tr>
            <td><?php echo $cliente['id_cliente'] ?></td>
            <td><?php echo $cliente['nome'] ?></td>
            <td><?php echo $cliente['email'] ?></td>
            <td><?php echo $cliente['telefone'] ?></td>
            <td><a href="<?php echo '../cliente_detalhe.php?id='. $cliente['id_cliente']  ?>">Detalhe</a></td>
         </tr>
         <?php endforeach; ?>
      </tbody>
   </table>

</body>
</html>