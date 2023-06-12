<?php
  session_start();
  include('../includes/db.php');

  $client_username = $_POST['username'];
  $client_email = $_POST['email'];
  $client_password = $_POST['password'];
  $client_password2 = $_POST['password2'];

  if($client_password === $client_password2) {
    $insert_client_query = "insert into clients (username, email, password) values ('$client_username', '$client_email', '$client_password')";

    $results = mysqli_query($conn, $insert_client_query);

    $_SESSION['account_created'] = TRUE;

    if(isset($_SESSION['password_not_match'])) {
      unset($_SESSION['password_not_match']);
      unset($_SESSION['signup_username']);
      unset($_SESSION['signup_email']);
    }
    echo "<script>window.open('../login.php', '_self')</script>";
  } else {
    $_SESSION['password_not_match'] = TRUE;
    $_SESSION['signup_username'] = $client_username;
    $_SESSION['signup_email'] = $client_email;
    echo "<script>window.open('../signup.php', '_self')</script>";
  }


?>