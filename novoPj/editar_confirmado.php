<?php
session_start();
include 'criptos.php';

$dados = $_SESSION['cripto']['idCripto'];
$iv = $_SESSION['cripto']['iv'];
$id = descriptografar($dados,$iv);

if ($id == false) {
   
   header("Location: index.php");
}

$usuario = $_POST['nome_usuario'];
$email = $_POST['email_usuario'];

//abrir a ligação a bd
include 'gestor.php';
$gestor = new Gestor();

//verificar se já existe outro   usuário
$params = array(
   'id' => $id,
   'usuario' => $usuario,
   'email'  => $email
);

//SE NÃO EXISTE ATUALIZAR O USUÁRIO
$resultado = $gestor->EXE_QUERY("SELECT * FROM usuarios WHERE (usuario = :usuario OR email= :email) AND id <> :id", $params);
$usuarioExiste = $gestor->EXE_QUERY("SELECT * FROM usuarios WHERE (email = :email AND usuario = :usuario) AND id = :id", $params);

// se usuário já existe, apresentar mensagem de erro
if (count($resultado) != 0) {
   if ($email == $resultado[0]['email']) {
      $_SESSION['cripto'];
      header("Location: editar_registro.php?erro=Erro! Existe outro usuário com mesmo Email");
      exit();
   } elseif ($usuario == $resultado[0]['usuario']) {
      $_SESSION['cripto'];
      header("Location: editar_registro.php?erro=Erro! Existe outro usuário com mesmo Nome.");
      exit();
   }
}

//SE NÃO EXISTE ATUALIZAR OS DADOS ALTERADOS
if (count($usuarioExiste) != 0) {
   $_SESSION['cripto'];
   header("Location: editar_registro.php?erro=Erro! O usuário não foi alterado.");
   exit();
} else {
   $_SESSION['cripto'];
   $gestor->EXE_NON_QUERY("UPDATE usuarios SET usuario = :usuario,email = :email,updated_at = NOW() WHERE id = :id", $params);
   header("location: editar_registro.php?sucesso=O usuário foi alterado com sucesso");
}
