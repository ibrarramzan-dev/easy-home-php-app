<?php
  session_start();
  include('../includes/db.php');

  $email = $_POST['email'];
  $password = $_POST['password'];

  $select_e_query = "select * from employees where email='$email' AND password='$password'";

  $results = mysqli_query($conn, $select_e_query);

  if(mysqli_num_rows($results) > 0) {
    if(isset($_SESSION['WRONG_E_CREDENTIALS'])) {
      unset($_SESSION['WRONG_E_CREDENTIALS']);
    }
    try {
      $row = mysqli_fetch_array($results);

      if($row["is_active"] == 0) {
        throw new Exception("Account pending activation");
      }
      
      $_SESSION['e_info'] = array("employee_id" => $row['employee_id'], "first_name" => $row['first_name'], "last_name" => $row['last_name'], "email" => $row['email'], "service" => $row['product_id']);

      if(isset($_SESSION['e_login_error'])) {
        unset($_SESSION['e_login_error']);
      }
      echo "<script>window.open('../', '_self')</script>";
  } catch (Exception $e) {
      $msg = $e->getMessage();
      $_SESSION['e_login_error'] = $msg;
      echo "<script>window.open('../login.php', '_self')</script>";
    }
  } else {
    $_SESSION['WRONG_E_CREDENTIALS'] = TRUE;
    echo "<script>window.open('../login.php', '_self')</script>";
  }
?>