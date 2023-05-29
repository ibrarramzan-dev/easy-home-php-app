<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    include("./views/head.php")
  ?>

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="./fonts/icomoon/style.css">

  <link rel="stylesheet" href="./styles/owl.carousel.min.css">

  <!-- Bootstrap CSS
  <link rel="stylesheet" href="css/bootstrap.min.css"> -->

  <link rel="stylesheet" href="./styles/login.css">

  <script src="js/jquery-3.3.1.min.js" defer></script>
  <script src="js/popper.min.js" defer></script>
  <script src="js/bootstrap.min.js" defer></script>
  <script src="js/main.js" defer></script>


  <title>Login | Easy Home</title>
</head>

<body>
  <!-- header -->

  <?php
    include("./views/header.php")
  ?>

  <!-- ------ -->


  <!-- page content -->

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/login-bg.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3 style="margin-top: -33px;">Login to <strong>Easy Home</strong></h3>
            <br />

            <?php
                if(isset($_SESSION['WRONG_CLIENT_CREDENTIALS'])) {
                  echo "<p class='error-text'>Sorry, wrong credentials provided!</p>";
                }
            ?>

            <form action="./process/process_login.php" method="POST" name="c_login">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="your-email@gmail.com" id="usernameOrEmail"
                  name="usernameOrEmail">
              </div>
              <div class=" form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Your Password" id="password" name="password">
              </div>

              <div class=" d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked" name="rememberMe" />
                  <div class=" control__indicator">
                  </div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary" style="margin-top: -25px;">

            </form>
          </div>
        </div>
      </div>
    </div>


  </div>

  <!-- ------------ -->


  <!-- footer -->

  <?php
    include("./views/footer.php")
  ?>

  <!-- ------ -->

</body>

</html>