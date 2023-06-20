<!DOCTYPE html>
<html lang="en">

<head>
  <?php
    include('./views/head.php');
  ?>
</head>

<body>
  <?php
    include('./views/sidebar.php');
    include('./views/header.php');
  ?>

  <div class="content-wrap">

    <div class="d-lg-flex half">
      <div class="contents order-2 order-md-1">

        <div class="container">
          <div class="row align-items-left justify-content-left">
            <div class="col-md-7">
              <h3><strong>Add</strong> Employee</h3>
              <br />

              <?php
                if(isset($_SESSION['WRONG_CLIENT_CREDENTIALS'])) {
                  echo "<p class='error-text'>Wrong credentials provided, please try again</p>";
                }
            ?>

              <form action="./process/process_login.php" method="POST" name="c_login">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" placeholder="Enter employee username" id="employee_username"
                    name="employee_username" pattern="[A-Za-z0-9\-_\.]{6,20}"
                    title="Minimum 6 and maximum 20 characters, should contain alphabets, (-)(_)(.)" required>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" placeholder="employee-email@gmail.com" id="email"
                    name="email"
                    value="<?php if(isset($_SESSION['password_not_match'])) { echo $_SESSION['signup_email']; } else { echo ''; } ?>"
                    required>
                </div>

                <div class=" form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Enter employee password" id="password"
                    name="password" required>
                </div>

                <div class="form-group" style="position: relative;">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" placeholder="Enter employee phone" id="phone" name="phone"
                    pattern="\d{12}" title="Allowed is 12 digits number" maxlength="12" style="padding-left: 23.5px;"
                    required>
                  <span style="position: absolute; top: 41px; left: 10px; font-size: 17px">+</span>
                </div>

                <div class="form-group">
                  <label for="city">City</label>
                  <input type="text" class="form-control" placeholder="Enter employee city" id="city" name="city">
                </div>

                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" placeholder="Enter employee address" id="address"
                    name="address" pattern="^([A-Za-z_\d][A-Za-z\d_ .#\/',]*){10,}$"
                    title="Allowed is alphanumeric, spaces and characters (,)(.)(#)(/)('). Minimum 10 and maximum 69 characters"
                    maxlength="69" required>
                </div>

                <div class="form-group">
                  <label for="state">State</label>
                  <input type="text" class="form-control" placeholder="Enter employee state" id="state" name="state"
                    pattern="^(\p{L}+(?: \p{L}+)*){3,}$"
                    title="Allowed is alphabets and spaces only with no preceeding space. Minimum 3 and maximum 30 characters"
                    maxlength="30" required>
                </div>

                <div class="form-group">
                  <label for="state">Profile Picture <span class="info-text-small">(optional)<span></label>
                  <input type="file" class="form-control" id="profile-picture" name="profile_picture"
                    placeholder="Update Profile Picture" title="Update Profile Picture">
                </div>

                <input type="submit" value="Add Employee" class="btn btn-block btn-primary"
                  style="margin-top: -1.5px; margin-bottom: 20px;">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


  <?php
    include('./views/footer_script.php');
  ?>
</body>

</html>