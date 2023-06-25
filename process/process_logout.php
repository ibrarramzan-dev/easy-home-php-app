<?php
  session_start();

  if(isset($_SESSION['my_account_info'])) {
    unset($_SESSION['my_account_info']);
  }

  if(isset($_SESSION['my_account_upload_img_error'])) {
    unset($_SESSION['my_account_upload_img_error']);
  }

  if(isset($_COOKIE['my_account_info'])) {
    unset($_COOKIE['my_account_info']);
    setcookie("my_account_info", "", time() - 300, "/");
  }

  echo "<script>window.open('../', '_self')</script>";

?>