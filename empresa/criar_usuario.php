<?php 

include 'gestor.php';

$gestor = new Gestor();

$usuaria = 'Ezequias';
$senha = 'abc123';
$email = 'ezequiashunk@gmail.com';

$params = array(
   ':usuario' => $usuaria,
   ':senha'   => password_hash($senha, PASSWORD_DEFAULT),
   ':email'   => $email
);

$gestor ->EXE_NON_QUERY('INSERT INTO user VALUES(0,:usuario,:senha,:email)', $params);


