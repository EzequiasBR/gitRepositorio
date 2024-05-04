<?php
if (isset($_GET['cor'])) {
   $link = $_GET['cor'];
   setcookie('tema', ($link.'.php'), time() + (1 * 365 * 24 * 60 * 60));
}
header("Location: index.php");