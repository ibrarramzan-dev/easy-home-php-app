<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="css/lib/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <title>Login | Employee</title>
</head>

<body class="bg-primary">
  <!-- Toasts -->

  <?php
    if(isset($_SESSION['e_account_created'])) {
      unset($_SESSION['e_account_created']);

      echo "
        <div class='toast-alert'>
          <p class='toast-alert-header'>Success</p> 
          <p class='toast-alert-body'>Account created, pending for approval</p>
        </div>
        ";
    }
  ?>
  <!-- End of Toasts -->

  <div class="unix-login">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="login-content">
            <div class="login-logo">
              <a href="index.html"><span>Easy Home</span></a>
            </div>
            <div class="login-form">
              <h4>Employee Login</h4>
              <?php
                if(isset($_SESSION['WRONG_E_CREDENTIALS'])) {
                  echo "<p class='error-text'>Wrong credentials provided, please try again</p>";
                } else if(isset($_SESSION['e_login_error'])) {
                  $msg = $_SESSION['e_login_error'];
                  echo "<p class='error-text'>$msg</p>";
                }
              ?>

              <form action="./process/process_login.php" method="POST">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" placeholder="your-email@gmail.com" id="email" name="email"
                    maxlength="255" required />
                </div>

                <div class="form-group">
                  <label style="text-transform: none;">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Enter password"
                    maxlength="32" required />
                </div>

                <input type="submit" value="Sign in" class="btn btn-primary btn-flat m-b-30 m-t-30" />
              </form>
            </div>
            <div class="employee-portal-account-nav-links-wrapper">
              <p><a href="./signup.php">Create an account</a></p>
              <p class="employee-portal-account-nav-links-margin employee-portal-account-nav-links-separator">|</p>
              <p class="employee-portal-account-nav-links-margin"><a href="../">Home</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- bootstrap -->
  <script src="js/lib/bootstrap.min.js"></script>
</body>

</html>