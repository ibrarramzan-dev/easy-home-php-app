<?php
  session_start();
  include('../includes/db.php');

  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

  $username = $_SESSION['my_account_info']['username'];

  if(trim($email) == "" || trim($phone) == "" || trim($address) == "") {
    echo "<script>window.open('../my_account.php', '_self')</script>";
  } else {
    $update_client_query = "update clients set phone = '$phone', address = '$address', extra_info = '1' where username = '$username'";
    $results = mysqli_query($conn, $update_client_query);
  
    $_SESSION['my_account_info']['phone'] = $phone;
    $_SESSION['my_account_info']['address'] = $address;
    $_SESSION['my_account_info']['extra_info'] = 1;

    $_SESSION['extra_account_info_added'] = TRUE;
    
    echo "<script>window.open('../', '_self')</script>";
  }



?>