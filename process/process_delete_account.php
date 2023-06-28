<?php
  session_start();
  include('../includes/db.php');
  
  $client_id = $_GET['client_id'];

  $delete_client_query = "update clients set is_deleted = 1 where client_id = '$client_id'";

  mysqli_query($conn, $delete_client_query);

  if(isset($_SESSION['my_account_info'])) {
    unset($_SESSION['my_account_info']);
  }

  if(isset($_COOKIE['my_account_info'])) {
    unset($_COOKIE['my_account_info']);
    setcookie("my_account_info", "", time() - 300, "/");
  }

  $_SESSION['account_deleted'] = TRUE;
  header("Location:../");
?>