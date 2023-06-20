<?php
  session_start();

  if(isset($_SESSION['admin_info'])) {
    unset($_SESSION['admin_info']);
  }

  echo "<script>window.open('../login.php', '_self')</script>";
?>