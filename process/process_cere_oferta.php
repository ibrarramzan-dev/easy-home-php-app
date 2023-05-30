<?php
  session_start();
  include('../includes/db.php');

  $notes = $_POST['problem'];
  $schedule_date = $_POST['schedule_date'];

  $product_id = $_GET['product_id'];
  $client_id = $_SESSION['my_account_info']['client_id'];

  $insert_order_query = "insert into orders (client_id, product_id, notes, schedule) values ('$client_id', '$product_id', '$notes', '$schedule_date')";

  $results = mysqli_query($conn, $insert_order_query);

  $_SESSION['service_request_submitted'] = TRUE;

  echo "<script>window.open('../', '_self')</script>";

?>