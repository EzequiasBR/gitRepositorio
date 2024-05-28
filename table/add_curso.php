<?php

include 'gestor.php';
$gestor = new Gestor();

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

   if(isset($_POST['iCurso']) && isset($_POST['iLink'])){
 
      $nome = $_POST['iCurso'];
      $link = $_POST['iLink'];

      $params = array(
         ':nome_curso' => $nome,
         ':link_curso'   => $link,
      );

      $gestor->EXE_NON_QUERY("INSERT INTO cursos VALUES(0,:nome_curso,:link_curso)", $params);

   }

}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <title>Document</title>
</head>

<body>
   <form action="add_curso.php" method="post" class="offset-3 mb-3 col-6 mt-5 text-dark">
      <h1 class="m-4 text-center">Adicionar Curso</h1>
      <hr>
      <div class="form-group mt-5 mb-3">
         <label for="iCurso" class="form-label mt-2">Nome do Curso</label>
         <input type="text" id="iCurso" name="iCurso" class="form-control">
         <label for="iLink" class="form-label mt-2">Link do curso</label>
         <input type="text" id="iLink" name="iLink" class="form-control">
      </div>
      <div class="text-end mb-4">
         <input type="submit" value="Gravar" class="btn btn-info" required>
         <button class="btn btn-info"><a href="index.php">Voltar</a></button>
      </div>
   </form>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>