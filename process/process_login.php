<?php
  session_start();
  include('../includes/db.php');

  $username_or_email = $_POST['usernameOrEmail'];
  $password = $_POST['password'];

  $select_client_query = "select * from clients where (username='$username_or_email' OR email='$username_or_email') AND password='$password'";

  $results = mysqli_query($conn, $select_client_query);

  if(mysqli_num_rows($results) > 0) {
    if(isset($_SESSION['WRONG_CLIENT_CREDENTIALS'])) {
      unset($_SESSION['WRONG_CLIENT_CREDENTIALS']);
    }
    
    $row = mysqli_fetch_array($results);

    if($row['extra_info'] == 0) {
      echo "<script>window.open('../my_account.php', '_self')</script>";      
    }
    
    $_SESSION['my_account_info'] = array("username"=>$row['username'], "email" => $row['email'], "phone" => $row['phone'], "address" => $row['address'], "extra_info" => $row['extra_info']);

    echo "<script>window.open('../', '_self')</script>";
  } else {
    $_SESSION['WRONG_CLIENT_CREDENTIALS'] = TRUE;
    echo "<script>window.open('../login.php', '_self')</script>";

  }

?>