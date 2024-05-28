<?php
include 'gestor.php';
$gestor = new Gestor();

$cursos = $gestor->EXE_QUERY("SELECT * FROM  cursos");

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
      <p><a href="add_curso.php">Adicionar Curso</a></p>
      <hr>
      <table id="tabela" class="table table-bordered text-center">
         <thead class="thead-dark">
            <tr>
               <th>ID</th>
               <th>Nome do curso</th>
               <th>Link do curso</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($cursos as $curso) : ?>
               <tr>
                  <th><?php echo $curso['id_curso'] ?></th>
                  <th class="text-center"><?php echo $curso['nome_curso'] ?></th>
                  <th><a href="<?php echo $curso['link_curso'] ?>" target="_blank">Ir para o curso</a></th>
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