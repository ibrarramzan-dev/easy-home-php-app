<?php
  session_start();
  include('../includes/db.php');

  $service_name = $_POST['service_name'];
  $service_description = $_POST['service_description'];

  $thumbnail_name = '';
  
  $referring_link = $_SERVER['HTTP_REFERER'];

  if(!$_FILES["thumbnail"]["error"] == 4) {
    $thumbnail_file_size = $_FILES["thumbnail"]["size"] / 1024; // KBs
    $thumbnail_file_type = $_FILES["thumbnail"]["type"];

    $allowed_img_ext = ["image/jpeg", "image/jpg", "image/png"];

    if ($thumbnail_file_size > 2000) {
      $_SESSION['add_service_error'] = "Thumbnail File Size should be less than 2MB";

      header("Location:$referring_link");
    }

    if(!in_array($thumbnail_file_type, $allowed_img_ext)) {
      $_SESSION['add_service_error'] = "Sorry, thumbnail allowed extensions are jpg, jpeg, png. Please try a different image.";

      header("Location:$referring_link");
    }

    $thumbnail_name = str_replace(' ', '_', $_FILES['thumbnail']['name']);
    $thumbnail_tmp = $_FILES['thumbnail']['tmp_name'];

    if(!is_dir("../../images/products")) {
      mkdir("../../images/products");
    } 

    $uploaded = move_uploaded_file($thumbnail_tmp, "../../images/products/$thumbnail_name");

    if (!$uploaded) {
      $_SESSION['add_service_error'] = "Sorry, failed to upload thumbnail. Please try again.";

      header("Location:$referring_link");
    }
  }

  try {
    $insert_product_query = "insert into products (product_name, description, product_img) values ('$service_name', '$service_description', '$thumbnail_name')";
    
    mysqli_query($conn, $insert_product_query);

    $_SESSION['service_added'] = TRUE;

    if(isset($_SESSION['add_service_error'])) {
      unset($_SESSION['add_service_error']);
    }
  
    header("Location:$referring_link");
  } catch (Exception $e) {
    $_SESSION['add_service_error'] = str_replace('key', '', $e->getMessage());
    header("Location:$referring_link");
  }
  
?>