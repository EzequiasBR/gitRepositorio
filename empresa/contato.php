<?php
//VALIDAÇÃO DO FORMULÁRIO


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if ($_POST['formulario'] == 'email') {
    $erro = '';
    $sucesso = '';
    //FERIFICAÇÃO SE TEM TODOS OS CAMPOS
    if (
      !isset($_POST['text_email']) ||
      !isset($_POST['text_assunto']) ||
      !isset($_POST['text_mensagem']) ||
      !isset($_POST['text_nome'])
    ) {
      $erro = "Pelo menos um dos campos não existe.";
    }


    $email = $_POST['text_email'];
    $assunto = $_POST['text_assunto'];
    $mensagem = $_POST['text_mensagem'];
    $nome = $_POST['text_nome'];

    if (empty($erro)) {
      // VER SE O EMAIL É VALIDO
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "Endereço Email é Inválido.";
      }
    }

    if (empty($erro)) {
      include('enviar_email.php');
      $sucesso = "O email foi enviado com Sucesso.";
    }
  }

  if ($_POST['formulario'] == 'newsletter') {
    $erroNewletter = '';
    $sucessoNewletter = '';
    $email = $_POST['text_email'];
    include 'gestor.php';

    $gestor = new Gestor();

    $params = array(
      ':e' => $email
    );

    //FERIFICAR SE O E-MAIL JÁ EXISTE NA BASE DE DADOS
    $resultado = $gestor->EXE_QUERY("SELECT email FROM emails WHERE email = :e", $params);
    if (count($resultado) != 0) {
      //email já está registrado

      $erroNewletter = "O Email já está registrado.";
    } else {
      //INSERIR NOVO E-MAIL
      $gestor->EXE_NON_QUERY('INSERT INTO emails(email) VALUES(:e)', $params);
      $sucessoNewletter = "Obrigado por ter registrado o seu email.";
    }
  }
}

?>


<!-- 
  // VER SER OS CAMPOS FORAM PREENCHIDOS
  // ENVIA O EMAIL -->

<div class="container">
  <div class="row text-center">
    <div class="offset-3 position-relative mt-5 col-6 text-center">
      <?php if (!empty($erro)) : ?>
        <<div class="alert alert-danger p-0 m-0 text-center fw-bold">
          <?php echo $erro ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($sucesso)) : ?>
    <div class="alert alert-success p-0 m-0 text-center fw-bold">
      <?php echo $sucesso ?>
    </div>
  <?php endif; ?>
  </div>
</div>
<div class="row">
  <form class="offset-3 col-6 border-top mt-5 text-dark" action="?p=contato" method="post">
    <h1 class="m-4 text-center">Formulário de Contato</h1>
    <div>
      <input type="hidden" name="formulario" value="email">
      <div class="form-group mt-5 mb-3">
        <label for="text_nome" class="m-1 fs-5">Seu Nome Completo</label>
        <input type="text" name="text_nome" class="form-control" placeholder="Nome Completo" required>
      </div>
      <div class="form-group mb-3">
        <label for="text_email" class="m-1 fs-5">Digite Seu Email</label>
        <input type="email" name="text_email" class="form-control" placeholder="Email" required>
      </div>
      <div class="form-group mb-3">
        <label for="text_assunto" class="m-1 fs-5">Digite o Assunto</label>
        <input type="text" name="text_assunto" class="form-control" placeholder="Digite o Assunto" required>
      </div>
      <div class="form-group mb-3">
        <label for="text_mensagem" class="m-1 fs-5">Digite Sua Mensagem</label>
        <textarea name="text_mensagem" class="form-control" cols="20" rows="5"></textarea>
      </div>
      <div class="text-end mb-4">
        <input type="submit" value="Enviar mensagem" class="btn btn-info" required>
      </div>
    </div>
  </form>
</div>

<div class="row text-center">
  <div class="offset-3 position-relative  col-6 text-center">
    <?php if (!empty($erroNewletter)) : ?>
      <div class="alert alert-danger p-0 text-center fw-bold" id="erro">
        <?php echo $erroNewletter ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($sucessoNewletter)) : ?>
      <div class="alert alert-success p-0 text-center fw-bold" id="sucesso">
        <?php echo $sucessoNewletter ?>
      </div>
    <?php endif; ?>
  </div>
</div>

<div class="row">
  <form class="offset-3 col-6 border-top my-5 text-dark" action="?p=contato" method="post">
    <h1 class="m-2 text-center">Newsletter</h1>
    <div>
      <input type="hidden" name="formulario" value="newsletter">
      <div class="form-group mt-2 mb-3">
        <label for="text_email" class="m-1 fs-5">Digite Seu Email</label>
        <input type="email" name="text_email" class="form-control" placeholder="Digite Seu Email" required>
      </div>
      <div class="text-end mb-4">
        <input type="submit" value="Receber newsletter" class="btn btn-info" required>
      </div>
    </div>
  </form>
  <script>
      $('#erro').delay(3000).fadeOut('slow');
      $('#sucesso').delay(3000).fadeOut('slow');
   </script>
</div>
</div>