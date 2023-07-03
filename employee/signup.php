<?php
  session_start();
  include('./includes/db.php');
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
                if(isset($_SESSION['e_signup_error'])) {
                  $error = $_SESSION['e_signup_error'];
                  echo "<p class='error-text'>$error</p>";
                }
              ?>

              <form action="./process/process_signup.php" method="POST" name="e_login">
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" placeholder="Your First Name" id="first_name"
                    name="first_name" pattern="[a-zA-Z]{3,20}" title="Allowed is alphabets and no space"
                    value="<?php if(isset($_SESSION['e_signup_pwd_not_match'])) { echo $_SESSION['e_signup_first_name']; } else { echo ''; } ?>"
                    required />
                </div>

                <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control" placeholder="Your Last Name" id="last_name" name="last_name"
                    pattern="[a-zA-Z]{3,20}" title="Allowed is alphabets and no space"
                    value="<?php if(isset($_SESSION['e_signup_pwd_not_match'])) { echo $_SESSION['e_signup_last_name']; } else { echo ''; } ?>"
                    required />
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" placeholder="employee-email@gmail.com" id="email"
                    name="email"
                    value="<?php if(isset($_SESSION['e_signup_pwd_not_match'])) { echo $_SESSION['e_signup_email']; } else { echo ''; } ?>"
                    maxlength="255" required />
                </div>

                <div class=" form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Enter your password" id="password"
                    name="password" pattern="^(?=.*[\w])(?=.*[\W])[\w\W]{8,}$"
                    title="At least one lowercase, one uppercase, one special character and 8 characters long"
                    maxlength="32" required />
                </div>

                <div class="form-group last mb-3">
                  <label for="password2">Confirm Password</label>
                  <input type="password" class="form-control" placeholder="Your Password" id="password2"
                    name="password2" maxlength="32" required />
                </div>

                <div class="form-group" style="position: relative;">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" placeholder="Enter your phone" id="phone" name="phone"
                    pattern="\d{10}" title="Allowed is 10 digits number" maxlength="10" style="padding-left: 23.5px;"
                    value="<?php if(isset($_SESSION['e_signup_pwd_not_match'])) { echo $_SESSION['e_signup_phone']; } else { echo ''; } ?>"
                    required />
                  <span style="position: absolute; top: 41px; left: 10px; font-size: 17px; color: #424242;">+</span>
                </div>

                <div class="form-group">
                  <label for="service">Service</label>
                  <select class="form-select form-control" name="service" aria-label="Service" required>
                    <option value="">Select service you can offer</option>
                    <?php
                      $select_products_query = "select * from products";

                      $results = mysqli_query($conn, $select_products_query);

                      while($row = mysqli_fetch_array($results)) {
                        $product_id = $row['product_id'];
                        $product_name = $row['product_name'];

                        echo "<option value='$product_id'>$product_name</option>";
                      }
                    ?>
                  </select>
                </div>

                <input type="submit" value="Add Employee" class="btn btn-block btn-primary"
                  style="margin-top: -1.5px; margin-bottom: 20px;" />
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