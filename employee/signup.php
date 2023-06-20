<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="css/lib/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <title>Signup | Employee</title>
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
              <h4>Employee Signup</h4>
              <?php
                if(isset($_SESSION['WRONG_EMPLOYEE_CREDENTIALS'])) {
                  echo "<p class='error-text'>Wrong credentials provided, please try again</p>";
                }
              ?>

              <form action="./process/process_signup.php" method="POST" name="c_login">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" placeholder="Enter your username" id="employee_username"
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
                  <input type="password" class="form-control" placeholder="Enter your password" id="password"
                    name="password" required>
                </div>

                <div class="form-group" style="position: relative;">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" placeholder="Enter your phone" id="phone" name="phone"
                    pattern="\d{12}" title="Allowed is 12 digits number" maxlength="12" style="padding-left: 23.5px;"
                    required>
                  <span style="position: absolute; top: 41px; left: 10px; font-size: 17px">+</span>
                </div>

                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" placeholder="Enter your address" id="address" name="address"
                    pattern="^([A-Za-z_\d][A-Za-z\d_ .#\/',]*){10,}$"
                    title="Allowed is alphanumeric, spaces and characters (,)(.)(#)(/)('). Minimum 10 and maximum 69 characters"
                    maxlength="69" required>
                </div>

                <div class="form-group">
                  <label for="service">Service</label>
                  <select class="form-select form-control" aria-label="Service">
                    <option value="">Select service you can offer</option>
                    <option value="1">ELECTRICIENI</option>
                    <option value="2">INSTALATORI</option>
                    <option value="3">AMENAJARI INTERIOARE</option>
                  </select>
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
            <div class="employee-portal-account-nav-links-wrapper">
              <p><a href="./login.php">Login</a></p>
              <p class="employee-portal-account-nav-links-margin employee-portal-account-nav-links-separator">|</p>
              <p class="employee-portal-account-nav-links-margin"><a href="../">Home</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>