<?php
  session_start();

  if(isset($_SESSION['my_account_info'])) {
    unset($_SESSION['my_account_info']);
  }

  if(isset($_SESSION['my_account_upload_img_error'])) {
    unset($_SESSION['my_account_upload_img_error']);
  }

  echo "<script>window.open('../', '_self')</script>";

?>