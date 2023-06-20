<?php
  session_start();

  if(isset($_SESSION['e_info'])) {
    unset($_SESSION['e_info']);
  }

  echo "<script>window.open('../login.php', '_self')</script>";
?>