<?php
  session_start();
  include('../includes/db.php');

  $e_first_name = $_POST['first_name'];
  $e_last_name = $_POST['last_name'];
  $e_email = $_POST['email'];
  $e_password = $_POST['password'];
  $e_password2 = $_POST['password2'];
  $e_phone = $_POST['phone'];
  $product_id = $_POST['service'];

  if($e_password === $e_password2) {
    $insert_e_query = "insert into employees (first_name, last_name, full_name, email, password, phone, product_id) values ('$e_first_name', '$e_last_name', '$e_first_name $e_last_name', '$e_email', '$e_password', '$e_phone', '$product_id')";

    try {
    $results = mysqli_query($conn, $insert_e_query);

    $_SESSION['e_account_created'] = TRUE;

    if(isset($_SESSION['e_signup_pwd_not_match'])) {
      unset($_SESSION['e_signup_error']);
      unset($_SESSION['e_signup_pwd_not_match']);
      unset($_SESSION['e_signup_first_name']);
      unset($_SESSION['e_signup_last_name']);
      unset($_SESSION['e_signup_email']);
      unset($_SESSION['e_signup_phone']);
      unset($_SESSION['e_signup_service']);
    } else {
      if(isset($_SESSION['e_signup_error'])) {
        unset($_SESSION['e_signup_error']);
      }
    }

    echo "<script>window.open('../login.php', '_self')</script>";
    } catch (Exception $e) {
      $_SESSION['e_signup_error'] = str_replace('key', '', $e->getMessage());
      echo "<script>window.open('../signup.php', '_self')</script>";
    }
  } else {
    $_SESSION['e_signup_error'] = "Sorry, passwords did not match";
    $_SESSION['e_signup_pwd_not_match'] = TRUE;
    $_SESSION['e_signup_first_name'] = $e_first_name;
    $_SESSION['e_signup_last_name'] = $e_last_name;
    $_SESSION['e_signup_email'] = $e_email;
    $_SESSION['e_signup_phone'] = $e_phone;
    $_SESSION['e_signup_service'] = $product_id;
    echo "<script>window.open('../signup.php', '_self')</script>";
  }

?>