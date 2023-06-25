<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="css/lib/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <title>Login | Admin</title>
</head>

<body class="bg-primary">
  <div class="unix-login">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="login-content">
            <div class="login-logo">
              <a href="index.html"><span>Easy Home</span></a>
            </div>
            <div class="login-form">
              <h4>Administrator Login</h4>
              <?php
                if(isset($_SESSION['WRONG_ADMIN_CREDENTIALS'])) {
                  echo "<p class='error-text' style='margin-top: -20px'>Wrong credentials provided, please try again</p>";
                }
              ?>

              <form action="./process/process_login.php" method="POST">
                <div class="form-group">
                  <label style="text-transform: none;">Username</label>
                  <input type="text" class="form-control" name="username" placeholder="Enter username" maxlength="20"
                    required />
                </div>

                <div class="form-group">
                  <label style="text-transform: none;">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Enter password"
                    maxlength="32" required />
                </div>
                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>