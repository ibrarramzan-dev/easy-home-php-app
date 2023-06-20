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

    <?php
      if(isset($_SESSION['my_account_error'])) {
        echo "<p class='error-text' style='text-align: center;'>" . $_SESSION['my_account_error'] . "</p>";
      }
    ?>

    <div class="my-account-content">
      <div class="my-account-pic-col">
        <div class="my-account-pic-wrapper">
          <img
            src="<?php if($_SESSION['my_account_info']['profile_picture'] === '') { echo "./images/client_profile_pictures/avatar.png"; } else { echo "./images/client_profile_pictures/" . $_SESSION['my_account_info']['username'] . "/" . $_SESSION['my_account_info']['profile_picture']; } ?>"
            title="<?php echo $_SESSION['my_account_info']['username'] ?>" />
        </div>
      </div>

      <div class="my-account-info-col">
        <form action="./process/process_edit_account.php" method="POST" enctype="multipart/form-data" id="c_my_account"
          name="c_my_account" class="c-my-account">
          <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" placeholder="Your First Name" id="first_name" name="first_name"
              pattern="[a-zA-Z]{3,20}" title="Allowed is alphabets and no space"
              value="<?php echo $_SESSION['my_account_info']['first_name'] ?>" required />
          </div>

          <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" placeholder="Your Last Name" id="last_name" name="last_name"
              pattern="[a-zA-Z]{3,20}" title="Allowed is alphabets and no space"
              value="<?php echo $_SESSION['my_account_info']['last_name'] ?>" required />
          </div>

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="usernameOrEmail" name="usernameOrEmail"
              value="<?php echo $_SESSION['my_account_info']['username'] ?>" disabled />
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email"
              value="<?php echo $_SESSION['my_account_info']['email'] ?>" disabled />
          </div>

          <div class="form-group" style="position: relative;">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" placeholder="Your Phone Number" id="phone" name="phone"
              value="<?php echo $_SESSION['my_account_info']['phone'] ?>" pattern="\d{12}"
              title="Allowed is 12 digits number" maxlength="12" style="padding-left: 23.5px;"
              value="<?php echo $_SESSION['my_account_info']['phone'] ?>" required />
            <span style="position: absolute; top: 43px; left: 10px; font-size: 17px">+</span>
          </div>

          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" placeholder="Your Address" id="address" name="address"
              value="<?php echo $_SESSION['my_account_info']['address'] ?>"
              pattern="^([A-Za-z_\d][A-Za-z\d_ .#\/',]*){10,}$"
              title="Allowed is alphanumeric, spaces and characters (,)(.)(#)(/)('). Minimum 10 and maximum 69 characters"
              maxlength="69" value="<?php echo $_SESSION['my_account_info']['address'] ?>" required />
          </div>

          <div class="form-group">
            <label for="state">Profile Picture <span class="info-text-small">(optional)<span></label>
            <input type="file" class="form-control" id="profile-picture" name="profile_picture"
              placeholder="Update Profile Picture" title="Update Profile Picture" />
          </div>

          <br />
          <input type="submit" value="Update" class="btn btn-block btn-primary" />
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