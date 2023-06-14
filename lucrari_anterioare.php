<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    include("./views/head.php")
  ?>

  <?php
    if(isset($_SESSION['my_account_info']['extra_info'])) {
      if($_SESSION['my_account_info']['extra_info'] == 0) {
        echo "<script>window.open('./my_account.php', '_self')</script>";
      }
    }
  ?>

  <title>Lucrari Anterioare | Easy Home</title>
</head>

<body>
  <!-- header -->
  <?php
    include("./views/header.php")
  ?>
  <!-- ------ -->


  <!-- Page Content -->

  <br /><br />

  Lucrari Anterioare...

  <br /><br /><br />

  <!-- End of Page Content -->


  <!-- footer -->
  <?php
    include("./views/footer.php")
  ?>
  <!-- ------ -->
</body>

</html>