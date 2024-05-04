<?php
session_start();
include 'gestor.php';
include 'criptos.php';
$gestor = new Gestor();
$usuarios = $gestor->EXE_QUERY("SELECT * FROM usuarios");


if (isset($_POST['id'])) {
   $nome = $_POST['id'];
   $params = array (
      ':nome' => $nome
   );
   $id_usuario = $gestor->EXE_QUERY("SELECT * FROM usuarios WHERE usuario = :nome", $params);
   $id = $id_usuario[0]['id'];

   
   $cripto = criptografar($id);
  
   if (count($id_usuario) != 0) {
      $user = $id_usuario[0]['usuario'];
   }

   if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // Agora você pode usar a variável $id em seu código
      if ($_POST['action'] == 'Editar') {
         $_SESSION['cripto'] = $cripto;
         header("Location: editar_registro.php");
      } elseif ($_POST['action'] == 'Eliminar') {
         $_SESSION['cripto'] = $cripto;
         $mensagem = 'Voçê tem certeza que quer eliminar o usuario: ';
         $link = 'eliminar_registro.php';
      }
   }
}




?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="bootstrap.min.css">
   <link rel="stylesheet" href="style.module.css">
   <script src="jquery-3.7.1.min.js"></script>
   <title>Gestão de Usuario</title>
</head>

<body>
   <div class="caixa">
      <?php if (!empty($user)) : ?>
         <div class="d-flex align-items-center justify-content-center position-absolute flex fw-bold">
            <div class="alerta bg-info">
               <p class="mt-2" id="textoAlerta"><?php echo $mensagem, $user ?></p>
               <a id="link-alerta" href="<?php echo $link ?>" class="fw-bold px-4 rounded btn btn-dark">Sim</a>
               <a class="fw-bold px-4 rounded btn btn-dark" href="index.php">Não</a>
            </div>
         </div>
      <?php endif; ?>
   </div>
   <h1 class="text-center pt-3 pb-0 border-bottom border-3 border-dark">GESTÃO DE USUÁRIOS</h1>
   <div class="row">
      <div class="ms-4 mt-2 d-flex align-items-center justify-content-between col-8 px-2 fw-bold">
         <a href="formulario_novo_usuario.php" class="link p-1">Add Novo Usuário</a>
         <p class="m-0 d-flex align-items-center justify-content-end me-3 p-1 rounded bg-info">Resultados: <?php echo count($usuarios); ?></p>
      </div>
   </div>
   <div class="row">
      <div class="col">
         <table class="table table-dark table-bordered border-white">
            <thead>
               <tr>
                  <th class='text-center'>Posição</th>
                  <th class='text-center'>Usuário</th>
                  <th class='text-center'>Email</th>
                  <th class='text-center'>Criado em</th>
                  <th class='text-center'>Açôes</th>
               </tr>
            </thead>
            <tbody>
               <?php $contador = 1;
               $i = 0;
               foreach ($usuarios as $usuario) : ?>
                  <tr>
                     <th class="text-center"><?php echo $contador ?></td>
                     <th><?php echo $usuario['usuario'] ?></th>
                     <th><?php echo $usuario['email'] ?></th>
                     <th><?php echo $usuario['created_at'] ?></th>
                     <th class="text-center btn-alerta px-0">
                        <form action="index.php" method="post">
                           <input type="hidden" name="id" value="<?php echo $usuario['usuario']; ?>">
                           <input type="submit" name="action" value="Editar" class="link-table me-2">|
                           <input type="submit" name="action" value="Eliminar" class="link-table ms-2">
                        </form>
                     </th>
                  </tr>
               <?php $contador++;
               endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
   <script>

   </script>
</body>

</html>