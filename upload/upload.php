<?php
//finalizar o upload do ficheiro
// print_r($_FILES);

$file_name = $_FILES['ficheiro']['name'];
$file_type = $_FILES['ficheiro']['type'];
$file_tmp = $_FILES['ficheiro']['tmp_name'];
$file_size = $_FILES['ficheiro']['size'];
$tmp = explode('.',$_FILES['ficheiro']['name']);
$file_extension = $tmp[count($tmp)-1];

$extensions = array('pdf','jpeg','jpg');

if(!in_array($file_extension,$extensions)){
   die('A extensão do Ficheiro é Inválida.');
}

if($file_size > 150000){
   die('O tamanho do ficheiro é maior que o permitido.');
};

$file = uniqid().'.'.$file_name;

move_uploaded_file($_FILES['ficheiro']['tmp_name'], 'uploads/'.$file);

echo $file_extension,'<br>';

echo 'está terminado.';