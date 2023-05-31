<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    include("./views/head.php")
  ?>

  <title>My Account | Easy Home</title>
</head>

<body>
  <!-- header -->

  <?php
    include("./views/header.php")
  ?>

  <!-- ------ -->

  <!-- Page Content -->
  <br /><br />

  <div class="my-account-container">
    <h3>My Account</h3>

    <?php
      if($_SESSION['my_account_info']['extra_info'] == 0) {
        echo "
          <div class='my-account-complete-your-profile-text-wrapper'>
            <p class='my-account-complete-your-profile-text'>Complete your account to access services</p>
          </div>"
          ;
      }
    ?>

    <div class="my-account-content">
      <div class="my-account-pic-col">
        <div class="my-account-pic-wrapper">
          <img src="./images/client_profile_pictures/mike.jpg" alt="Profile Picture of mike" />
        </div>
      </div>

      <div class="my-account-info-col">
        <form action="./process/process_edit_account.php" method="POST" name="c_my_account" class="c-my-account">
          <div class="form-group first">
            <label for="email">Email</label>
            <input type="text" class="form-control" placeholder="your-email@gmail.com" id="email" name="email"
              value="<?php echo $_SESSION['my_account_info']['email'] ?>">
          </div>

          <div class="form-group first">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" placeholder="Your Phone" id="phone" name="phone"
              value="<?php echo $_SESSION['my_account_info']['phone'] ?>">
          </div>

          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" placeholder="Your Address" id="address" name="address"
              value="<?php echo $_SESSION['my_account_info']['address'] ?>">
          </div>

          <br />
          <input type="submit" value="Update" class="btn btn-block btn-primary">
        </form>

      </div>
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