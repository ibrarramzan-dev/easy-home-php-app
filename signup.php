<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    include("./views/head.php")
  ?>

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="./fonts/icomoon/style.css">

  <link rel="stylesheet" href="./styles/owl.carousel.min.css">

  <link rel="stylesheet" href="./styles/signup.css">

  <script src="js/jquery-3.3.1.min.js" defer></script>
  <script src="js/popper.min.js" defer></script>
  <script src="js/bootstrap.min.js" defer></script>
  <script src="js/main.js" defer></script>


  <title>Signup | Easy Home</title>
</head>

<body>
  <!-- header -->
  <?php
    include("./views/header.php")
  ?>
  <!-- ------ -->


  <!-- Page Content -->

  <div class="signup-page-container d-lg-flex half">
    <div class="bg order-1 order-md-2">
      <img src="./images/login-bg.jpg" width="100%" height="910px" alt="" />
    </div>
    <div class="contents order-2 order-md-1" style="min-height: 909px;">

      <div class="container" style="margin-top: 100px;">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3 style="margin-top: -33px;">Signup to <strong>Easy Home</strong></h3>
            <br />

            <?php
                if(isset($_SESSION['signup_error'])) {
                  echo "<p class='error-text'>" . $_SESSION['signup_error'] . "</p>";
                }
            ?>

            <form action="./process/process_signup.php" method="post">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="Your Username" id="username" name="username"
                  value="<?php if(isset($_SESSION['password_not_match'])) { echo $_SESSION['signup_username']; } else { echo ''; } ?>"
                  pattern="[A-Za-z0-9\-_\.]{6,20}"
                  title="Minimum 6 and maximum 20 characters, should contain alphabets, (-)(_)(.)" required>
              </div>

              <div class="form-group" id="c_signup_email_wrapper">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="your-email@gmail.com" id="email" name="email"
                  value="<?php if(isset($_SESSION['password_not_match'])) { echo $_SESSION['signup_email']; } else { echo ''; } ?>"
                  required>
              </div>

              <div class=" form-group">
                <label for="city">City</label>
                <select class="form-control" placeholder="Select City" id="city" name="city" required></select>
              </div>

              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Your Password" id="password" name="password"
                  pattern="^(?=.*[\w])(?=.*[\W])[\w\W]{8,}$"
                  title="At least one lowercase, one uppercase, one digit, one special character and 8 characters long"
                  required>
              </div>

              <div class="form-group last mb-3">
                <label for="password2">Confirm Password</label>
                <input type="password" class="form-control" placeholder="Your Password" id="password2" name="password2"
                  required>
              </div>

              <input type="submit" value="Signup" class="btn btn-block btn-primary">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- End of Page Content -->

  <br /><br /><br /><br /><br /><br /><br />

  <!-- footer -->
  <?php
    include("./views/footer.php")
  ?>
  <!-- ------ -->

  <script src="./scripts/signup.js"></script>
</body>

</html>