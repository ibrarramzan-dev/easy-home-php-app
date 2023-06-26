<?php
  session_start();
  include('../includes/db.php');

  $email = $_GET['email'];
  $password = $_POST['password'];

  $update_client_query = "update clients set password = '$password', recovery_token = '', recovery_token_timestamp = NULL where email = '$email'";
  mysqli_query($conn, $update_client_query);

  $_SESSION['password_changed'] = TRUE;
  header("Location:../login.php");
?>