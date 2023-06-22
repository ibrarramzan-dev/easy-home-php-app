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
          enctype="multipart/form-data" class="cere-oferta-form" name="cere_oferta_form">
          <div class="form-group">
            <label for="problem">Describe the problem</label>
            <textarea style="height: 8em;" minlength="20" maxlength="2000" class="form-control"
              placeholder="Descibe the problem" id="problem" name="problem" required></textarea>
          </div>

          <div class="form-group">
            <label for="">Choose a schedule</label>
            <div class="checkbox">
              <label><input type="checkbox" id="schedule-asap-checkbox" name="schedule_asap_checkbox" value="asap"
                  onchange="onClickScheduleAsapCheckbox(this)"> <b>As
                  soon as possible</b></label>
            </div>
            <div class='input-group date' id='schedule-date'>
              <input type='date' class="form-control" id="schedule-date-input" name="schedule_date" required />
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>

          <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" placeholder="Enter your Offer price" id="price" name="price"
              pattern="^\d{2,}$" title="Allowed is digits. Minimum 2 and maximum 10 characters" maxlength="10" required>
          </div>

          <div class="form-group">
            <label for="address">Address <span class="info-text-small">(or change it to a different one)</span></label>
            <input type="text" class="form-control" placeholder="Your Address" id="address" name="address"
              value="<?php echo $_SESSION['my_account_info']['address'] ?>"
              pattern="^([A-Za-z_\d][A-Za-z\d_ .#\/',]*){10,}$"
              title="Allowed is alphanumeric, spaces and characters (,)(.)(#)(/)('). Minimum 10 and maximum 69 characters"
              maxlength="69" value="<?php echo $_SESSION['my_account_info']['address'] ?>" required>
          </div>

          <div class="form-group">
            <label for="state">Supporting Picture <span class="info-text-small">(optional)<span></label>
            <input type="file" class="form-control" id="supporting-picture" name="supporting_picture" title="">
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

  function onClickScheduleAsapCheckbox(element) {
    console.log(element.checked);
    const scheduleDateInput = document.getElementById('schedule-date-input');
    scheduleDateInput.disabled = element.checked;
  }
  </script>
</body>

</html>