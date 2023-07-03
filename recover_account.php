<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    include("./views/head.php");
    include("./includes/db.php");
  ?>

  <title>Account Recovery | Easy Home</title>
</head>

<body>
  <!-- header -->
  <?php
    include("./views/header.php")
  ?>
  <!-- ------ -->


  <!-- Page Content -->

  <br /><br />

  <div id="recover-account-container">

    <?php
      if (isset($_GET['email']) && isset($_GET['recovery_token'])) {
        $email = $_GET['email'];
        $recovery_token = $_GET['recovery_token'];

        $select_client_query = "select * from clients where email = '$email' AND recovery_token = '$recovery_token'";
        $results = mysqli_query($conn, $select_client_query);

        if(mysqli_num_rows($results) > 0) {
          $row = mysqli_fetch_assoc($results);
          $recovery_token_expiry = $row['recovery_token_expiry'];
          
          $current_time = time();

          if($current_time < $recovery_token_expiry) {
          echo "<h2>New Password</h2>

    <div id='recover-account-page-content-wrapper'>
      <form action='./process/process_recover_account.php?email=$email' method='POST'
        id='recover-account-form'>
        <div class='form-group' id='recover-account-email-input-wrapper'>
          <label for='password'>New Password</label>
          <input type='password' class='form-control' placeholder='Your New Password' id='password' name='password'
            pattern='^(?=.*[\w])(?=.*[\W])[\w\W]{8,}$'
            title='At least one lowercase, one uppercase, one special character and 8 characters long'
            maxlength='32' required />
        </div>
        <div id='recover-account-form-reset-btn-wrapper'>
          <input type='submit' class='form-control btn btn-primary' value='Reset Password' />
        </div>
      </form>
    </div>";     
          } else {
            echo "<p>Token expired</p>";
          }

             
        } else {
          echo "<p>Invalid or expired recovery link</p>";
        }
      } else {
        echo "<p>Link broken</p>";
      }
    ?>


  </div>

  <br /><br /><br />

  <!-- End of Page Content -->


  <!-- footer -->
  <?php
    include("./views/footer.php")
  ?>
  <!-- ------ -->
</body>

</html>