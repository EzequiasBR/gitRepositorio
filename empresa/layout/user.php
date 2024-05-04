<?php
if(!isset($_SESSION['user'])){
   return;
}
?>
<div class="text-end bg-dark text-white fs-5 pe-3 py-2">
   <?php echo $_SESSION['user']?> | <a href="?p=logout">logout</a>
</div>