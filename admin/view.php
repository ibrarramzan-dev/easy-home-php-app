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

    <?php
      $entity = '';
      $entity_id = '';
      if(isset($_GET['entity']) && isset($_GET['entity_id'])) {
        $entity = $_GET['entity'];
        $entity_id = $_GET['entity_id'];
      }
            
      if($entity == 'product') {
        $select_product_query = "select * from products WHERE product_id = '$entity_id'";
        $results = mysqli_query($conn, $select_product_query);

        echo "<h2>Poduct</h2>
    <div class='col-lg-11'>
      <div class='card'>
        <div class='card-body'>
          <div class='table-responsive'>
            <table class='table table-hover'>
              <thead>
                <tr>
                  <th>Product Id</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Stock</th>
                  <th>Image</th>
                </tr>
              </thead>
              <tbody>";

        while($row = mysqli_fetch_array($results)) {
          $product_id = $row['product_id'];
          $product_name = $row['product_name'];
          $description = $row['description'];
          $stock = $row['stock'];
          $product_img = $row['product_img'];

          echo "<tr>
                  <th scope='row'>$product_id</th>
                  <td>$product_name</td>
                  <td>$description</td>
                  <td>$stock</td>
                  <td>$product_img</td>
                </tr>";
          }

          echo "</tbody>
            </table>";

          if(mysqli_num_rows($results) == 0) {
            echo "<p class='no-record-found-text'>No Record found</p>";
          }

          echo "</div>
        </div>
      </div>
    </div>";
      } else if ($entity == 'client') {
        $select_client_query = "select * from clients WHERE client_id = '$entity_id' AND extra_info = 1";
        $results = mysqli_query($conn, $select_client_query);

        echo "<h2>Client</h2>
    <div class='col-lg-11'>
      <div class='card'>
        <div class='card-body'>
          <div class='table-responsive'>
            <table class='table table-hover'>
              <thead>
                <tr>
                  <th>Client Id</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Profile Picture</th>
                  <th>Date Created</th>
                </tr>
              </thead>
              <tbody>";

        while($row = mysqli_fetch_array($results)) {
          $client_id = $row['client_id'];
          $first_name = $row['first_name'];
          $last_name = $row['last_name'];
          $username = $row['username'];
          $email = $row['email'];
          $phone = $row['phone'];
          $address = $row['address'];
          $profile_picture = $row['profile_picture'];
          $date_created = $row['date_created'];

          echo "<tr>
                  <th scope='row'>$client_id</th>
                  <td>$first_name</td>
                  <td>$last_name</td>
                  <td>$username</td>
                  <td>$email</td>
                  <td>$phone</td>
                  <td>$address</td>
                  <td>$profile_picture</td>
                  <td>$date_created</td>
                </tr>";
          }

          echo "</tbody>
            </table>";

          if(mysqli_num_rows($results) == 0) {
            echo "<p class='no-record-found-text'>No Record found</p>";
          }

          echo "</div>
        </div>
      </div>
    </div>";
      } else if ($entity == 'employee') {
        $select_employee_query = "select * from employees WHERE employee_id = '$entity_id' AND is_active = 1";
        $results = mysqli_query($conn, $select_employee_query);

        echo "<h2>Employee</h2>
    <div class='col-lg-11'>
      <div class='card'>
        <div class='card-body'>
          <div class='table-responsive'>
            <table class='table table-hover'>
              <thead>
                <tr>
                  <th>Employee Id</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Product Id</th>
                  <th>Phone</th>
                  <th>Date Created</th>
                </tr>
              </thead>
              <tbody>";

        while($row = mysqli_fetch_array($results)) {
          $employee_id = $row['employee_id'];
          $first_name = $row['first_name'];
          $last_name = $row['last_name'];
          $email = $row['email'];
          $product_id = $row['product_id'];
          $phone = $row['phone'];
          $date_created = $row['date_created'];

          echo "<tr>
                  <th scope='row'>$employee_id</th>
                  <td>$first_name</td>
                  <td>$last_name</td>
                  <td>$email</td>
                  <td>$product_id</td>
                  <td>$phone</td>
                  <td>$date_created</td>
                </tr>";
          }

          echo "</tbody>
            </table>";

          if(mysqli_num_rows($results) == 0) {
            echo "<p class='no-record-found-text'>No Record found</p>";
          }

          echo "</div>
        </div>
      </div>
    </div>";
      } else {
        echo "<p class='link-broken-text'>Link broken</p>";
      }
    ?>
  </div>


  <?php
    include('./views/footer_script.php');
  ?>
</body>

</html>