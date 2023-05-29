<?php
  session_start();
  include('../includes/db.php');

  $client_username_or_email = $_POST['usernameOrEmail'];
  $client_password = $_POST['password'];

  $select_client_query = "select * from clients where (username='$client_username_or_email' OR email='$client_username_or_email') AND password='$client_password'";

  $results = mysqli_query($conn, $select_client_query);

  if(mysqli_num_rows($results) > 0) {
    $_SESSION['client_username'] = $client_username_or_email;

    if(isset($_SESSION['WRONG_CLIENT_CREDENTIALS'])) {
      unset($_SESSION['WRONG_CLIENT_CREDENTIALS']);
    }
    

    echo "<script>window.open('../', '_self')</script>";
  } else {
    $_SESSION['WRONG_CLIENT_CREDENTIALS'] = TRUE;
    echo "<script>window.open('../login.php', '_self')</script>";

  }

?>