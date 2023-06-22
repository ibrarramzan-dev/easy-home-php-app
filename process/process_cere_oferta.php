<?php
  session_start();
  include('../includes/db.php');

  $notes = $_POST['problem'];
  $schedule_date = '';
  $price = $_POST['price'];
  $address = $_POST['address'];

  if(isset($_POST['schedule_asap_checkbox'])) {  
    $schedule_date = $_POST['schedule_asap_checkbox'];
  } else {
    $schedule_date = $_POST['schedule_date'];
  }

  $supporting_picture_name = '';
  if(!$_FILES["supporting_picture"]["error"] == 4) {
    $supporting_picture_size = $_FILES["supporting_picture"]["size"] / 1024; // KBs
    $supporting_picture_file_type = $_FILES["supporting_picture"]["type"];

    $allowed_img_ext = ["image/jpeg", "image/jpg", "image/png"];

    if ($supporting_picture_size > 2000) {
      $_SESSION['cere_oferta_error'] = "Supporting Picture File Size should be less than 2MB";

      echo "<script>window.open('../cere_oferta.php', '_self')</script>";
    }

    if(!in_array($supporting_picture_file_type, $allowed_img_ext)) {
      $_SESSION['cere_oferta_error'] = "Sorry, supporting picture allowed extensions are jpg, jpeg, png. Please try a different image.";

      $referring_url = $_SERVER['HTTP_REFERER'];
      header("Location:$referring_url");
    }

    $supporting_picture_name = str_replace(' ', '_', $_FILES['supporting_picture']['name']);
    $supporting_picture_tmp = $_FILES['supporting_picture']['tmp_name'];

    $date = date_create();
    $date_timestamp = date_timestamp_get($date);

    $supporting_picture_name = $date_timestamp . "_" . $supporting_picture_name;

    if(!is_dir("../images/cere_oferta")) {
      mkdir("../images/cere_oferta");
    }

    $uploaded = move_uploaded_file($supporting_picture_tmp, "../images/cere_oferta/$supporting_picture_name");

    if (!$uploaded) {
      $_SESSION['cere_oferta_error'] = "Sorry, failed to upload supportin picture. Please try again.";

      echo "<script>window.open('../my_account.php', '_self')</script>";
    }
  }

  $product_id = $_GET['product_id'];
  $client_id = $_SESSION['my_account_info']['client_id'];

  $insert_order_query = "insert into orders (client_id, product_id, notes, schedule_date, price, address, supporting_picture) values ('$client_id', '$product_id', '$notes', '$schedule_date', '$price','$address', '$supporting_picture_name')";

  $results = mysqli_query($conn, $insert_order_query);

  $_SESSION['service_request_submitted'] = TRUE;

  echo "<script>window.open('../', '_self')</script>";

?>