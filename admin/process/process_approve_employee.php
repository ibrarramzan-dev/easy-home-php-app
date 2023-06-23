<?php
  session_start();
  include('../includes/db.php');

  $employee_id = $_GET['employee_id'];

  $update_employee_query = "update employees set is_active = 1 WHERE employee_id = '$employee_id'";

  mysqli_query($conn, $update_employee_query);

  $referring_link = $_SERVER['HTTP_REFERER'];
  header("Location:$referring_link");
?>