<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    include("./views/head.php")
  ?>

  <title>Forgot Password</title>
</head>

<body>
  <!-- header -->
  <?php
    include("./views/header.php")
  ?>
  <!-- ------ -->


  <!-- Page Content -->

  <br /><br />

  <div id="forgot-password-page-container">
    <h2>Forgot Password</h2>
    <?php
      if(isset($_SESSION['forgot_password_error'])) {
        $error = $_SESSION['forgot_password_error'];
        unset($_SESSION['forgot_password_error']);
        echo "<p style='text-align: center; margin-top: 22px; margin-bottom: -7px; color: red;'>$error</p>";
      }
    ?>

    <div id="forgot-password-page-content-wrapper">
      <form action="./process/process_forgot_password.php" method="POST" id="forgot-password-form">
        <div class="form-group" id="forgot-password-email-input-wrapper">
          <label for="email">Email</label>
          <input type="email" class="form-control" placeholder="Enter your email" name="email" maxlength="255"
            required />
        </div>
        <div id="forgot-password-form-reset-btn-wrapper">
          <input type="submit" class="form-control btn btn-primary" value="Reset" />
        </div>
      </form>
    </div>
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