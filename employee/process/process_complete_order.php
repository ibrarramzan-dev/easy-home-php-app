<?php
  session_start();
  include('../includes/db.php');

  $order_id = $_GET['order_id'];
  $employee_id = $_SESSION['e_info']['employee_id'];

  $date = date("m-d-Y");

  $update_order_query = "update orders set is_completed = 1, date_completed = '$date' WHERE order_id = '$order_id'";

  mysqli_query($conn, $update_order_query);

  $_SESSION['e_order_completed'] = TRUE;
  $referring_link = $_SERVER['HTTP_REFERER'];
  header("Location:$referring_link"); 
?>