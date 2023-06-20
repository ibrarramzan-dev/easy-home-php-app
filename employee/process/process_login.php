<?php
  session_start();
  include('../includes/db.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  $select_admin_query = "select * from admins where username='$username' AND password='$password'";

  $results = mysqli_query($conn, $select_admin_query);

  if(mysqli_num_rows($results) > 0) {
    if(isset($_SESSION['WRONG_ADMIN_CREDENTIALS'])) {
      unset($_SESSION['WRONG_ADMIN_CREDENTIALS']);
    }
    
    $row = mysqli_fetch_array($results);

    $_SESSION['admin_info'] = array("admin_id" => $row['admin_id'], "username" => $row['username']);

    echo "<script>window.open('../', '_self')</script>";
  } else {
    $_SESSION['WRONG_ADMIN_CREDENTIALS'] = TRUE;
    echo "<script>window.open('../login.php', '_self')</script>";

  }

?>