<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="../assets/jquery-3.7.1.min.js"></script>
   <title>Document</title>
</head>

<body>
   <label for="operacao">Subtrair</label>
   <input type="radio" name="operacao" value="-">
   <label for="operacao">|Adição</label>
   <input type="radio" name="operacao" value="+">
   <label for="operacao">|Multiplicação</label>
   <input type="radio" name="operacao" value="*">
   <label for="operacao">|Divisão</label>
   <input type="radio" name="operacao" value="/"><br>
   <input type="number" id="num1"><br>
   <input type="number" id="num2">
   <button onclick="alterar()">Soma</button><br>
   Resultado: <i id="resp"></i>

   <script>
      function alterar() {
         $.ajax({
            type: 'POST',
            url: 'resposta.php',
            data: {
               num1: $('#num1').val(),
               num2: $('#num2').val(),
               opera: $('input[name="operacao"]:checked').val()
            },
            success: function(dados) {
               let res = JSON.parse(dados);
               console.log(res)
               $('#resp').text(res);
            },
            error: function() {
               console.log('error.')
            }
         });
      }
   </script>
</body>

</html>