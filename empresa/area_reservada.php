<?php if (isset($_SESSION['user'])) : ?>
   <h1>Área Reservada</h1>
<?php else : ?>
   <section class="container">
      <div class="row justify-content-center align-items-center d-flex w-100 h-100 ">
         <form id="login" class="col-5 w-20 rounded-5 p-4 my-5 border text-dark" action="?p=area_reservada" method="post">
            <h1 class="text-center text-dark my-2">Login</h1>
            <div class="form-group my-3">
               <label for="email" class="form-label fs-5"><i class="fa fa-user mx-2"></i>Digite Seu Email</label>
               <input type="email" name="text_usuario" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group my-3">
               <label for="senha" class="form-label fs-5"><i class="fa fa-lock mx-2"></i>Digite Sua Senha</label>
               <input type="password" name="text_senha" class="form-control" placeholder="Senha" required>
            </div>
            <small>
               <input type="checkbox" class="form ms-1 mt-2 link-dark">
               <a href="#" style="color: black; text-decoration: none;">Lembre de mim</a>
            </small>
            <div class="form-group text-center mt-3">
               <input type="submit" value="Login" class="btn btn-info text-center fw-bold px-5">
            </div>
            <small>
               <p class="text-center pt-2 mt-3"><a href="#" style="color: black; text-decoration: none;">Esqueceu sua senha?</a></p>
            </small>
         </form>
         <div class="row text-center">
            <div class="offset-3 position-relative  col-6 text-center">
               <?php if (!empty($erro)) : ?>
                  <div class="alert alert-danger p-0 text-center fw-bold" id="erro">
                     <?php echo $erro ?>
                  </div>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </section>
<?php endif; ?>

<script>
   $('#erro').delay(3000).fadeOut('slow');
</script>