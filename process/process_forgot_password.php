<?php
  session_start();
  include('../includes/db.php');

  $email = $_POST['email'];



  die($email);

  if(isset($_POST['rememberMe'])) {
    $rememberMe = true;
  }

  $select_client_query = "select * from clients where (username='$username_or_email' OR email='$username_or_email') AND password='$password'";

  $results = mysqli_query($conn, $select_client_query);

  if(mysqli_num_rows($results) > 0) {
    if(isset($_SESSION['WRONG_CLIENT_CREDENTIALS'])) {
      unset($_SESSION['WRONG_CLIENT_CREDENTIALS']);
    }
    
    $row = mysqli_fetch_array($results);

    $my_account_info = array("client_id" => $row['client_id'], "first_name" => $row['first_name'], "last_name" => $row['last_name'], "username" => $row['username'], "email" => $row['email'], "phone" => $row['phone'], "address" => $row['address'], "profile_picture" => $row['profile_picture'], "extra_info" => $row['extra_info']);
    $_SESSION['my_account_info'] = $my_account_info;

    if($rememberMe) {
      setcookie("my_account_info", json_encode($my_account_info), time() + (86400 * 30), "/"); // 86400 = 1 day      
    }

    if($row['extra_info'] == 0) {
      echo "<script>window.open('../my_account.php', '_self')</script>";      
    }
    
    echo "<script>window.open('../', '_self')</script>";
  } else {
    $_SESSION['WRONG_CLIENT_CREDENTIALS'] = TRUE;
    echo "<script>window.open('../login.php', '_self')</script>";

  }

?>