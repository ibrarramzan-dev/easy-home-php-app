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
        <form action="./process/process_edit_account.php" method="POST" id="c_my_account" name="c_my_account"
          class="c-my-account">
          <div class="form-group">
            <label for="fName">First Name</label>
            <input type="text" class="form-control" placeholder="Your First Name" id="fName" name="fName"
              pattern="[a-zA-Z]{3,20}" title="No space and letters allowed" required>
          </div>

          <div class="form-group">
            <label for="lName">Last Name</label>
            <input type="text" class="form-control" placeholder="Your Last Name" id="lName" name="lName"
              pattern="[a-zA-Z]{3,20}" title="No space and letters allowed" required>
          </div>

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="usernameOrEmail" name="usernameOrEmail"
              value="<?php echo $_SESSION['my_account_info']['username'] ?>" disabled>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email"
              value="<?php echo $_SESSION['my_account_info']['email'] ?>" disabled>
          </div>

          <div class="form-group" style="position: relative;">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" placeholder="Your Phone Number" id="phone" name="phone"
              value="<?php echo $_SESSION['my_account_info']['phone'] ?>" pattern="\d{12}"
              title="Only 12 digits number allowed" style="padding-left: 23.5px;" required>
            <span style="position: absolute; top: 43px; left: 10px; font-size: 17px">+</span>
          </div>

          <div class="form-group" id="c_my_account_address_wrapper">
            <label for="address">Address</label>
            <input type="text" class="form-control" placeholder="Your Address" id="address" name="address"
              value="<?php echo $_SESSION['my_account_info']['address'] ?>"
              pattern="^([A-Za-z_\d][A-Za-z\d_ .#\/',]*){10,}$"
              title="Allowed alphanumeric, spaces and characters (,)(.)(#)(/)('). Minimum 10 and maximum 69 characters"
              maxlength="69" required>
          </div>

          <div class="form-group">
            <label for="city">City</label>
            <select class="form-control" placeholder="Select City" id="city" name="city" required></select>
          </div>

          <div class="form-group">
            <label for="state">State</label>
            <input type="text" class="form-control" placeholder="Your State" id="state" name="state" required>
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

  <script src="./scripts/my_account.js"></script>
</body>

</html>