<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Criar cliente</title>
</head>
<body>
   <form action="http://localhost/API/aula3/add_clientes.php" method="post">
      <labe>
         Nome:
        <input type="text" name="nome_cliente" require> 
      </labe><br>
      <label>
         Email:
       <input type="email" name="email_cliente" require>  
      </label><br> 
      <label>
         Telefone:
       <input type="text" name="telefone_cliente" require>
      </label><br>  
      <label>
         Senha:
       <input type="password" name="senha_cliente" require>
      </label><br>  
      <button type="submit">Enviar</button>
   </form>
</body>
</html> 