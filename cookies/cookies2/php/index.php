<?php

$tema =  '';
if (isset($_COOKIE['tema'])) {
   $tema = $_COOKIE['tema'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="<?php echo $tema;?>">
   <title></title>
</head>

<body>
   <h1>Mude o Tema da tela</h1>
   <a href="resposta.php?cor=light">Branco</a> || <a href="resposta.php?cor=dark">Preto</a>
</body>

</html>