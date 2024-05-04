<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <title>Document</title>
</head>

<body>
   <div class="text-center mt-5">
      <div id="spinner" style="display:none;" disabled>
         <img src="spinner.gif" alt="Loading" style="width:30px;">
      </div>
      <div class="resposta"></div>
      <button onclick="executar_pedido()">Fazer pedido</button>
   </div>

   <script>
      function executar_pedido() {
         $.ajax({
            type: 'GET',
            url: 'resposta.php',
            beforeSend: function() {
               $("#spinner").show();
            },
            success: function(data) {
               $('.resposta').text(data);
            },
            error: function() {
               console.log("error");
            },
            complete: function() {
               $('#spinner').hide();
            }
         })
      }
      </script>
   <script src="js/jquery-3.7.1.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>