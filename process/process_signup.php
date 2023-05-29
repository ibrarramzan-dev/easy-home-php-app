<?php
  include('../includes/db.php');

  $client_username = $_POST['username'];
  $client_email = $_POST['email'];
  $client_password = $_POST['password'];
  $client_password2 = $_POST['password2'];

  $insert_client_query = "insert into clients (username, email, password) values ('$client_username', '$client_email', '$client_password')";

  $results = mysqli_query($conn, $insert_client_query);
  
  echo "<script>window.open('../login.php', '_self')</script>";

?>