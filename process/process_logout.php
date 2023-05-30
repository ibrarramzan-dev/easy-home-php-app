<?php
  session_start();

  if(isset($_SESSION['my_account_info'])) {
    unset($_SESSION['my_account_info']);
  }

  echo "<script>window.open('../', '_self')</script>";

?>