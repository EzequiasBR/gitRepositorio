<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   if ($_POST['formulario'] == 'novo_Usuario') {
      $erro = "";
      $sucesso = "";
      $email = $_POST['email_usuario'];
      
      include 'gestor.php';

      $gestor = new Gestor();

      $params = array(
         ':usuario' => $_POST['nome_usuario'],
         ':passwrd'   => password_hash($_POST['password_usuario'], PASSWORD_DEFAULT),
         ':email'   => $email
      );

      //FERIFICAR SE O E-MAIL JÁ EXISTE NA BASE DE DADOS
      $resultado = $gestor->EXE_QUERY("SELECT email FROM usuarios WHERE email = :email", array(':email' => $email));
      if (count($resultado) != 0) {
         //email já está registrado
         $erro = "Usuário já se encontra cadastrado.";
      } else {
         //INSERIR NOVO E-MAIL
         $gestor->EXE_NON_QUERY("INSERT INTO usuarios(usuario,passwrd,email,created_at) VALUES(:usuario,:passwrd,:email,NOW())", $params);
         $sucesso = "Usuário Cadastrado com Sucesso.";
      }
   }
  
}
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="bootstrap.min.css">
   <link rel="stylesheet" href="Style.module.css">
   <script src="jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   <title>Adicionar Usuário</title>
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
      <div class="alert alert-success p-2 text-center fw-bold" id="sucesso">
        <?php echo $sucesso ?>
      </div>
    <?php endif; ?>
  </div>
</div>
   <form action="formulario_novo_usuario.php" method="post" class="border p-4 rounded">
      <input type="hidden" name="formulario" value="novo_Usuario">
      <div class="d-flex m-0">
         <h3 class="w-50 pt-2 mb-0">Cadastrar Usuário</h3>
         <p class="mb-0 pt-3 text-left w-50 text-end"><a href="index.php" class="link mb-0 px-3 fw-bold">Voltar</a></p>
      </div>
      <hr class="mb-5 mt-0">
      <div class="form-group">
         <label for="nome_usuario" class="form-label mt-3 mb-0">Nome do Usuário:</label>
         <input type="text" class="form-control" name="nome_usuario" placeholder="Nome do Usuário" required>
      </div>
      <div class="form-group">
         <label for="email_usuario" class="form-label mt-3 mb-0">Email do Usuário:</label>
         <input type="email" class="form-control" name="email_usuario" placeholder="Email do Usuário" required>
      </div>
      <div class="form-group mb-3">
         <label for="password_usuario" class="form-label mt-3 mb-0">Senha do Usuário:</label>
         <input type="password" class="form-control" name="password_usuario" placeholder="Senha do Usuário" required>
      </div>
      <div class="text-center">
         <input type="submit" value="Registrar" class="btn btn-info p-2 px-5 mt-3 fw-bold">
      </div>
   </form>
   <script>
      $('#erro').delay(3000).fadeOut('slow');
      $('#sucesso').delay(3000).fadeOut('slow');
   </script>
</body>

</html>