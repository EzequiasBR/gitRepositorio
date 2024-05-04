<?php

//CRIE TABELA DE CLIENTES  

$num_clientes = 200;
$dominios = array('@gmail.com', '@hotmail.com', '@yahoo.com');
$paises = array('Portugal', 'Brasil', 'Angola', 'Canadá', 'França');

$dados = array();
for ($i = 0; $i < $num_clientes; $i++) {
   $clientes = array(
      'nome' => 'Cliente' . $i,
      'telemovel' => rand(100000000, 999999999),
      'email' => 'cliente' . $i . $dominios[rand(0, count($dominios) - 1)],
      'nacionalidade' => $paises[rand(0, count($paises) - 1)]
   );
   array_push($dados, $clientes);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="inc/datatables.min.css" rel="stylesheet">
   <title>Document</title>
</head>

<body>

   <div class="container mb-5">
      <h1>CLIENTES</h1>
      <hr>
      <table id="tabela" class="table table-bordered text-center">
         <thead class="thead-dark">
            <tr>
               <th>Nome do cliente</th>
               <th>Telemovel</th>
               <th>Email</th>
               <th>Nacionalidade</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($dados as $clientes) : ?>
               <tr>
                  <th><?php echo $clientes['nome'] ?></th>
                  <th class="text-center"><?php echo $clientes['telemovel'] ?></th>
                  <th><?php echo $clientes['email'] ?></th>
                  <th><?php echo $clientes['nacionalidade'] ?></th>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
   </div>
   <script src="inc/datatables.min.js"></script>
   <script>
      $(document).ready(function() {
         let table = new DataTable('#tabela', {
            language: {
               info: 'Mostrando a página _PAGE_ de _PAGES_',
               infoEmpty: 'Não há Registros',
               infoFiltered: '(Filtrado de _MAX_ registros)',
               lengthMenu: 'Total de  _MENU_ Linhas',
               zeroRecords: 'Não há Registros',
               search:  "Buscar:",
            }
         });
      });
   </script>
</body>

</html>