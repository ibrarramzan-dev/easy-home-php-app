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

  <title>Cere Oferta</title>
</head>

<body>
  <!-- header -->
  <?php
    include("./views/header.php")
  ?>
  <!-- ------ -->

  <!-- Page Content -->

  <br /><br />

  <div class="cere-oferta-container">
    <h3>Cere Oferta</h3>

    <div class="cere-oferta-form-wrapper">
      <div class="cere-oferta-product-name-col">
        <p><?php echo str_replace('_', ' ', $_GET['service']) ?></p>
      </div>
      <div class="cere-oferta-form-col">
        <form action="<?php echo "./process/process_cere_oferta.php?product_id=" . $_GET['product_id'] ?>" method="POST"
          class="cere-oferta-form" name="cere_oferta_form">
          <div class="form-group">
            <label for="problem">Describe the problem</label>
            <input type="text" class="form-control" placeholder="Descibe the problem" id="problem" name="problem">
          </div>

          <div class="form-group">
            <label for="">Choose a schedule</label>

            <div class='input-group date' id='schedule-date'>
              <input type='date' class="form-control" name="schedule_date" />
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>

          <br />
          <input type="submit" class="btn btn-block btn-primary">
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

  <script type="text/javascript">
  $(function() {
    $('#datetimepicker1').datetimepicker();
  });
  </script>
</body>

</html>