<?php
  session_start();

  if(isset($_SESSION['client_username'])) {
    unset($_SESSION['client_username']);
  }

  echo "<script>window.open('../', '_self')</script>";

?>