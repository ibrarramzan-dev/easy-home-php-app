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
    <!-- Toasts -->

    <?php
      if(isset($_SESSION['service_added'])) {
        unset($_SESSION['service_added']);

        echo "
          <div class='toast-alert'>
            <p class='toast-alert-header'>Success</p> 
            <p class='toast-alert-body'>Service added</p>
          </div>
          ";
      }
      ?>
    <!-- End of Toasts -->
    <h2>Add Service</h2>
    <br />

    <form action="./process/process_add_service.php" method="POST" enctype="multipart/form-data" name="add_service_form"
      id="add-service-form">
      <div class="form-group">
        <label for="service_name">Service Name</label>
        <input type="text" class="form-control" placeholder="Enter Service Name" id="service-name" name="service_name"
          minLength="8" maxlength="255" required />
      </div>

      <div class="form-group">
        <label for="service_description">Description</label>
        <input type="text" class="form-control" placeholder="Enter Service Description" id="service-description"
          name="service_description" minlength="20" maxlength="2000" required />
      </div>

      <div class="form-group">
        <label for="thumbnail">Thumbnail</label>
        <input type="file" class="form-control" id="thumbnail" name="thumbnail" title="Add Thumbnail" required />
      </div>

      <input type="submit" value="Add Service" class="btn btn-block btn-primary" />
    </form>

  </div>
  <?php
     include('./views/footer_script.php');
  ?>
</body>

</html>