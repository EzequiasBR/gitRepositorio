<?php
session_start(); 
include 'criptos.php';

if (isset($_GET['erro'])) {
   $erro = $_GET['erro'];
};
if (isset($_GET['sucesso'])) {
   $sucesso = $_GET['sucesso'];
};

if (isset($_SESSION['cripto'])) {  
$dados = $_SESSION['cripto']['idCripto'];
$iv = $_SESSION['cripto']['iv'];
$id = descriptografar($dados,$iv);

if($id == false){
   header("Location: index.php");
}
   //Buscar o id do usuario
    
//Abrir Ligação a base de Dados
   include 'gestor.php';
   $gestor = new Gestor();

   //buscar os dados dos usuários registrados
   $params = array(
      ':id' => $id
   );
   $usuario = $gestor->EXE_QUERY("SELECT * FROM usuarios WHERE id = :id", $params);

}
 


?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="bootstrap.min.css">
   <link rel="stylesheet" href="Style.module.css">
   <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   <title>Editar Usuário</title>
</head>

<body class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
   <div class="d-flex position-absolute top-0 mt-4 text-center">
      <div class=" text-center">
         <?php if (!empty($erro)) : ?>
            <div class="alert alert-danger p-2 text-center fw-bold" id="erro">
               <?php echo $erro ?>
            </div>
         <?php endif; ?>

         <?php if (!empty($sucesso)) : ?>
            <div class="alert alert-success  text-center fw-bold" id="sucesso">
               <?php echo $sucesso ?>
               <div id="cronometro"></div>
            </div>
         <?php endif; ?>
      </div>
   </div>
   <form action="editar_confirmado.php" method="post" class="border p-4 rounded">
      <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['cripto'] ?>">
      <div class="d-flex m-0">
         <h3 class="w-50 pt-2 mb-0">Editar Usuário</h3>
         <p class="mb-0 pt-3 text-left w-50 text-end"><a href="index.php" class="link mb-0 px-3 fw-bold">Voltar</a></p>
      </div>
      <hr class="mb-5 mt-0">
      <div class="form-group">
         <label for="nome_usuario" class="form-label mt-3 mb-0">Nome do Usuário:</label>
         <input type="text" class="form-control" name="nome_usuario" placeholder="Nome do Usuário" value="<?php echo $usuario[0]['usuario'] ?>" required>
      </div>
      <div class="form-group">
         <label for="email_usuario" class="form-label mt-3 mb-0">Email do Usuário:</label>
         <input type="email" class="form-control" name="email_usuario" placeholder="Email do Usuário" value="<?php echo $usuario[0]['email'] ?>" required>
      </div>
      <div class="text-center">
         <input type="submit" value="Alterar" class="btn btn-info p-2 px-5 mt-3 fw-bold">
      </div>
   </form>
   <script>
      $('#erro').delay(3000).fadeOut('slow');

      $(document).ready(function() {
         var tempoRestante = 3; // tempo em segundos
         var $cronometro = $('#cronometro');

         // Atualiza o cronômetro a cada segundo
         var intervalo = setInterval(function() {
            tempoRestante--;
            $cronometro.text('A página será redirecionada em ' + tempoRestante + ' segundos.');

            if (tempoRestante <= 0) {
               clearInterval(intervalo);
               $cronometro.text('Redirecionando...');
            }
         }, 1000);

         // Redireciona a página após 3 segundos
         $('#sucesso').delay(3000).fadeOut('slow', function() {
            window.location.href = 'index.php';
         });
      });
   </script>
</body>

</html>
