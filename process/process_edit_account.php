<?php
  session_start();
  include('../includes/db.php');

  $fName = $_POST['fName'];
  $lName = $_POST['lName'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $state = $_POST['state'];

  $profile_picture_name = '';
  $username = $_SESSION['my_account_info']['username'];

  if(!$_FILES["profile_picture"]["error"] == 4) {
    $profile_picture_file_size = $_FILES["profile_picture"]["size"] / 1024; // KBs
    $profile_picture_file_type = $_FILES["profile_picture"]["type"];

    $allowed_img_ext = ["image/jpeg", "image/jpg", "image/png"];

    if ($profile_picture_file_size > 2000) {
      $_SESSION['my_account_error'] = "Profile Picture File Size should be less than 2MB";

      echo "<script>window.open('../my_account.php', '_self')</script>";
    }

    if(!in_array($profile_picture_file_type, $allowed_img_ext)) {
      $_SESSION['my_account_error'] = "Sorry, profile picture allowed extensions are jpg, jpeg, png. Please try a different image.";

      echo "<script>window.open('../my_account.php', '_self')</script>";
    }

    $profile_picture_name = str_replace(' ', '_', $_FILES['profile_picture']['name']);
    $profile_picture_tmp = $_FILES['profile_picture']['tmp_name'];

    if(!is_dir("../images/client_profile_pictures/$username")) {
      mkdir("../images/client_profile_pictures/$username");
    } else {
      if(!$_FILES["profile_picture"]["error"] == 4) {
        unlink("../images/client_profile_pictures/$username/" . $_SESSION['my_account_info']['profile_picture']);
      }
    }

    $uploaded = move_uploaded_file($profile_picture_tmp, "../images/client_profile_pictures/$username/$profile_picture_name");

    if (!$uploaded) {
      $_SESSION['my_account_error'] = "Sorry, failed to upload profile picture. Please try again.";

      echo "<script>window.open('../my_account.php', '_self')</script>";
    }
  }

  try {
    $update_client_query = "";
    if($profile_picture_name === '') {
      $update_client_query = "update clients set first_name = '$fName', last_name = '$lName', phone = '$phone', address = '$address', state = '$state', extra_info = '1' where username = '$username'";
    } else {
      $update_client_query = "update clients set first_name = '$fName', last_name = '$lName', phone = '$phone', address = '$address', state = '$state', profile_picture = '$profile_picture_name', extra_info = '1' where username = '$username'";
    }

    
    $results = mysqli_query($conn, $update_client_query);

    $_SESSION['my_account_info']['first_name'] = $fName;
    $_SESSION['my_account_info']['last_name'] = $lName;
    $_SESSION['my_account_info']['phone'] = $phone;
    $_SESSION['my_account_info']['address'] = $address;
    $_SESSION['my_account_info']['state'] = $state;
    $_SESSION['my_account_info']['profile_picture'] = $profile_picture_name;
    $_SESSION['my_account_info']['extra_info'] = 1;

    $_SESSION['extra_account_info_added'] = TRUE;

    // removing image upload error
    if(isset($_SESSION['my_account_upload_img_failed'])) {
      unset($_SESSION['my_account_upload_img_failed']);
    }

    if(isset($_SESSION['my_account_error'])) {
      unset($_SESSION['my_account_error']);
    }
  
    echo "<script>window.open('../', '_self')</script>";
  } catch (Exception $e) {
    $_SESSION['my_account_error'] = str_replace('key', '', $e->getMessage());
    echo "<script>window.open('../my_account.php', '_self')</script>";
  }
  
?>