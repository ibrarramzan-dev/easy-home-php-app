<?php
  session_start();
  include('../includes/db.php');

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $subject = $_POST['subject'];
  $description = $_POST['description'];

  $insert_contact_query = "insert into queries (name, email, phone, subject, description) values ('$name', '$email', '$phone', '$subject', '$description')";
  mysqli_query($conn, $insert_contact_query);

  $_SESSION['contact_query_inserted'] = TRUE;

  $referring_link = $_SERVER['HTTP_REFERER'];
  header("Location:$referring_link");
?>