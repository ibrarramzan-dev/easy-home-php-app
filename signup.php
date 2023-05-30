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
    <div class="bg order-1 order-md-2" style="background-image: url('images/login-bg.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3 style="margin-top: -33px;">Signup to <strong>Easy Home</strong></h3>
            <br />

            <form action="./process/process_signup.php" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="Your Username" id="username" name="username">
              </div>

              <div class="form-group first">
                <label for="email">Email</label>
                <input type="text" class="form-control" placeholder="your-email@gmail.com" id="email" name="email">
              </div>

              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Your Password" id="password" name="password">
              </div>

              <div class="form-group last mb-3">
                <label for="password2">Confirm Password</label>
                <input type="password" class="form-control" placeholder="Your Password" id="password2" name="password2">
              </div>

              <input type="submit" value="Signup" class="btn btn-block btn-primary">

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- End of Page Content -->


  <!-- footer -->

  <?php
    include("./views/footer.php")
  ?>

  <!-- ------ -->
</body>

</html>