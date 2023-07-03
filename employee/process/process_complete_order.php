<?php
  session_start();
  include('../includes/db.php');

  $order_id = $_GET['order_id'];
  $employee_id = $_SESSION['e_info']['employee_id'];
  $product_id = $_SESSION['e_info']['service'];

  $date = date("m-d-Y");
  $year = date("Y");

  $update_order_query = "update orders set is_completed = 1, date_completed = '$date', year = '$year' WHERE order_id = '$order_id'";
  mysqli_query($conn, $update_order_query);

  $update_product_query = "update products set used = used + 1 WHERE product_id = $product_id";
  mysqli_query($conn, $update_product_query);

  $_SESSION['e_order_completed'] = TRUE;
  $referring_link = $_SERVER['HTTP_REFERER'];
  header("Location:$referring_link"); 
?>