<?php
session_start();
include('layout/html_head.php');
include('layout/nav.php');
include('layout/user.php');

$pag = 'inicio';
if (isset($_GET['p'])) {
   $pag = $_GET['p'];
}

//Rotas - Roteamento
switch ($pag) {

   case 'logout';
      session_destroy();
      Header('Location: '.$_SERVER['PHP_SELF']);
      return;
      break;
   case 'inicio':
      include('inicio.php');
      break;
   case 'servicos':
      include('servicos.php');
      break;
   case 'empresa':
      include('empresa.php');
      break;
   case 'contato':
      include('contato.php');
      break;
   case 'area_reservada':
      //verifica se houve submissão do formulário
      $erro = null;
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(verificarLogin()){
               //login Válido
               include('layout/user.php');
            }
            else
            {  
               //login Inválido
               $erro = "Erro, Login Inválido!";
            }
      }
      include('area_reservada.php');
      break;
   default:
      include('inicio.php');
      break;
}

include('layout/footer.php');
include('layout/html_footer.php');

function verificarLogin()
{
   $user = 'ezequiashunk@gmail.com';
   $nome = "Ezequias";
   $pass = 'abc123';

   $email = trim($_POST['text_usuario']);
   $senha   = trim($_POST['text_senha']);

   include 'gestor.php';
   $gestor = new Gestor();

   $params = array(
      ':email' => $email
   );

   $resultado = $gestor->EXE_QUERY("SELECT * FROM user WHERE email = :email",$params);

   if($resultado == 0){
      //login Inválido (Usuário não existe na bd)
      return false;
   }
   else
   {
      // Usuário Existe
      $senhabd =  $resultado[0]['senha'];
      $usuariobd =$resultado[0]['usuario']; 
      $emailbd =$resultado[0]['email']; 
      
      if(password_verify($senha,$senhabd) && $email == $emailbd ){
        $_SESSION['user'] = $resultado[0]['usuario'];
        return true;
      }
      else
      {
         return false;
      }
   }


   // VERIFICAR SE OS DADOS DO POST CORRESPONTE
 
}
