<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="../assets/jquery-3.7.1.min.js"></script>
   <title>Clientes</title>
</head>

<body>
   <h3>Clientes</h3>
   <hr>
   <div id="detalhe_cliente">
      <small>Não existe cliente selecionado.</small>
   </div>
   <hr>
   <div id="lista_clientes">
   </div>
   <button onclick="listaClientes()">Atualizar</button>
   <script>
      $(document).ready(function() {
         listaClientes();
      });



      function listaClientes() {
         $.ajax({
            type: 'GET',
            url: 'todos_clientes.php',
            success: function(dados) {
               let clientes = JSON.parse(dados);
               let html = '<ul>';
               clientes.forEach(c => {
                  html += "<li onclick=detalhe_cliente("+c['id_cliente']+")>"+ c['nome'] + "</li>";
               });
               html += '</ul>';
               $('#lista_clientes').html(html);
            },
            error: function() {
               console.log('Error');
            }
         });
      }
// ================================================
      function detalhe_cliente(id_cliente) {
          $.ajax({
            type: 'POST',
            url:'detalhe_cliente.php',
            data:{id_cliente: id_cliente},
            success:function(dados){
              let detalhes = JSON.parse(dados);
              let html = "<small>";
              detalhes.forEach(i =>{
               html +='Nome: '+i['nome']+', Email: '+i['email']+', telefone: '+i['telefone'];
              });
              html += '</small>';    
              $('#detalhe_cliente').html(html);
            },
            error: function(){

            }
          })
      }
   </script>
</body>

</html>