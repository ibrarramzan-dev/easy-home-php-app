<?php

  include('../includes/db.php');

  $client_username_or_email = $_POST['usernameOrEmail'];
  $client_password = $_POST['password'];

  $select_client_query = "select * from clients where (username='$client_username_or_email' OR email='$client_username_or_email') AND password='$client_password'";

  $run_client = mysqli_query($conn, $select_client_query);

  if(mysqli_num_rows($run_client) > 0) {
    $_SESSION['client_email'] = $client_username_or_email;

    echo "<script>window.open('../', '_self')</script>";
  } else {
    echo "<script>alert('Email or Password is wrong, please try again!')</script>";
    echo "<script>window.open('../login.php', '_self')</script>";
    // $_SESSION['WRONG_CLIENT_CREDENTIALS'] = TRUE;

  }

  

?>