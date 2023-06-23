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
      if(isset($_SESSION['service_updated'])) {
        unset($_SESSION['service_updated']);

        echo "
          <div class='toast-alert'>
            <p class='toast-alert-header'>Success</p> 
            <p class='toast-alert-body'>Service updated</p>
          </div>
          ";
      }
      ?>
    <!-- End of Toasts -->

    <?php
      $service_id = '';
      if(isset($_GET['service_id'])) {
        $service_id = $_GET['service_id'];
      }

      if($service_id !== '') {
        $select_products = "select * from products WHERE product_id = '$service_id'";

        $results = mysqli_query($conn, $select_products);

        $row = $results->fetch_assoc();

        if(isset($_SESSION['service_thumbnail_name'])) {
          unset($_SESSION['service_thumbnail_name']);
        }

        $_SESSION['service_thumbnail_name'] = $row['product_img'];
        
        if($row) {
          $product_name = $row['product_name'];
          $description = $row['description'];
          $product_img = $row['product_img'];

          echo "
            <h2>Edit Service</h2>
            <br />
            <form action='./process/process_update_service.php?service_id=$service_id' method='POST' enctype='multipart/form-data' name='add_service_form'
              id='add-service-form'>
              <div class='form-group'>
                <label for='service_name'>Service Name</label>
                <input type='text' class='form-control' placeholder='Enter Service Name'
                value='$product_name' id='service-name' name='service_name' maxlength='255' required />
              </div>

              <div class='form-group'>
                <label for='service_description'>Description</label>
                <input type='text' class='form-control' placeholder='Enter Service Description' value='$description' id='service-description' name='description' maxlength='2000' required />
              </div>

              <div>
                <img src='../../images/products/$product_img' alt='$product_name' class='edit-service-product-img' />
              </div>

              <div class='form-group'>
                <label for='thumbnail'>Update Thumbnail<span></label>
                <input type='file' class='form-control' id='thumbnail' name='thumbnail' title='Add Thumbnail' />
              </div>

              <input type='submit' value='Update Service' class='btn btn-block btn-primary' />
            </form>";
        } else {
          echo "<p class='error-text' style='margin-top: 3.5%;'>No record found</p>";
        }
      } else {
          echo "<p class='error-text' style='margin-top: 3.5%;'>Link broken</p>";
      }

  ?>



  </div>
  <?php
     include('./views/footer_script.php');
  ?>
</body>

</html>