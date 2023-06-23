<?php
  session_start();
  include('../includes/db.php');

  $service_id = $_GET['service_id'];
  $service_name = $_POST['service_name'];
  $description = $_POST['description'];

  $thumbnail_name = '';
  $referring_link = $_SERVER['HTTP_REFERER'];

  if(!$_FILES["thumbnail"]["error"] == 4) {
    $thumbnail_file_size = $_FILES["thumbnail"]["size"] / 1024; // KBs
    $thumbnail_file_type = $_FILES["thumbnail"]["type"];

    $allowed_img_ext = ["image/jpeg", "image/jpg", "image/png"];

    if ($profile_picture_file_size > 2000) {
      $_SESSION['edit_service_error'] = "Thumbnail File Size should be less than 2MB";

      header("Location:$referring_link");
    }

    if(!in_array($profile_picture_file_type, $allowed_img_ext)) {
      $_SESSION['edit_service_error'] = "Sorry, thumbnail allowed extensions are jpg, jpeg, png. Please try a different image.";

      header("Location:$referring_link");
    }

    $thumbnail_name = str_replace(' ', '_', $_FILES['thumbnail']['name']);
    $thumbnail_tmp = $_FILES['thumbnail']['tmp_name'];


    unlink("../../images/products/" . $_SESSION['service_thumbnail_name']);

    $uploaded = move_uploaded_file($thumbnail_tmp, "../../images/products/$thumbnail_name");

    if (!$uploaded) {
      $_SESSION['edit_service_error'] = "Sorry, failed to upload profile picture. Please try again.";

      header("Location:$referring_link");
    }
  }

  try {
    $update_product_query = "";
    if($thumbnail_name === '') {
      $update_product_query = "update products set product_name = '$service_name', description = '$description' WHERE product_id = '$service_id'";
    } else {
      $update_product_query = "update products set product_name = '$service_name', description = '$description', product_img = '$thumbnail_name' WHERE product_id = '$service_id'";
    }
    
    $results = mysqli_query($conn, $update_product_query);

    $_SESSION['service_updated'] = TRUE;

    if(isset($_SESSION['edit_service_error'])) {
      unset($_SESSION['edit_service_error']);
    }
  
    header("Location:$referring_link");
  } catch (Exception $e) {
    $_SESSION['edit_service_error'] = str_replace('key', '', $e->getMessage());
    header("Location:$referring_link");
  }
  
?>