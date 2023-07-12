<?php
  session_start();
  include('../includes/db.php');

  $order_id = $_GET['order_id'];

  $date = date("d-m-Y");

  $cancel_order_query = "update orders set is_cancelled = 1, date_cancelled = '$date' WHERE order_id = '$order_id'";

  mysqli_query($conn, $cancel_order_query);

  $referring_link = $_SERVER['HTTP_REFERER'];
  header("Location:$referring_link");
?>