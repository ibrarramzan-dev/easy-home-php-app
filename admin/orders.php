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
      $status = '';
      if(isset($_GET['status'])) {
        $status = $_GET['status'];
      }
            
      $select_pending_orders_query = "select * from orders WHERE is_completed = 0 AND is_cancelled = 0";
      $select_completed_orders_query = "select * from orders WHERE is_completed = 1";
      $select_cancelled_orders_query = "select * from orders WHERE is_cancelled = 1";

      if($status == 'completed') {
        $results = mysqli_query($conn, $select_completed_orders_query);

        echo "<h2>Completed Orders</h2>
    <div class='col-lg-11'>
      <div class='card'>
        <div class='card-body'>
          <div class='table-responsive'>
            <table class='table table-hover'>
              <thead>
                <tr>
                  <th>Order #</th>
                  <th>Product</th>
                  <th>Client</th>
                  <th>Employee</th>
                  <th>Notes</th>
                  <th>Schedule Date</th>
                  <th>Price</th>
                  <th>Address</th>
                  <th>Attachment</th>
                  <th>Date</th>
                  <th>Date Completed</th>
                </tr>
              </thead>
              <tbody>";

        while($row = mysqli_fetch_array($results)) {
          $order_id = $row['order_id'];
          $product_id = $row['product_id'];
          $client_id = $row['client_id'];
          $employee_id = $row['employee_id'];
          $notes = $row['notes'];
          $schedule_date = $row['schedule_date'];
          $price = $row['price'];
          $address = $row['address'];
          $supporting_picture = $row['supporting_picture'];
          $date = $row['date'];
          $date_completed = $row['date_completed'];

          echo "<tr>
                  <th scope='row'>$order_id</th>
                  <td>$product_id</td>
                  <td>$client_id</td>
                  <td>$employee_id</td>
                  <td>$notes</td>
                  <td>$schedule_date</td>
                  <td>$price</td>
                  <td>$address</td>
                  <td>$supporting_picture</td>
                  <td>$date</td>
                  <td>$date_completed</td>
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
      } else if ($status == 'cancelled') {
        $results = mysqli_query($conn, $select_cancelled_orders_query);

        echo "<h2>Cancelled Orders</h2>
    <div class='col-lg-11'>
      <div class='card'>
        <div class='card-body'>
          <div class='table-responsive'>
            <table class='table table-hover'>
              <thead>
                <tr>
                  <th>Order #</th>
                  <th>Product</th>
                  <th>Client</th>
                  <th>Employee</th>
                  <th>Notes</th>
                  <th>Schedule Date</th>
                  <th>Price</th>
                  <th>Address</th>
                  <th>Attachment</th>
                  <th>Date</th>
                  <th>Date Cancelled</th>
                </tr>
              </thead>
              <tbody>";

        while($row = mysqli_fetch_array($results)) {
          $order_id = $row['order_id'];
          $product_id = $row['product_id'];
          $client_id = $row['client_id'];
          $employee_id = $row['employee_id'];
          $notes = $row['notes'];
          $schedule_date = $row['schedule_date'];
          $price = $row['price'];
          $address = $row['address'];
          $supporting_picture = $row['supporting_picture'];
          $date = $row['date'];
          $date_cancelled = $row['date_cancelled'];

          echo "<tr>
                  <th scope='row'>$order_id</th>
                  <td>$product_id</td>
                  <td>$client_id</td>
                  <td>$employee_id</td>
                  <td>$notes</td>
                  <td>$schedule_date</td>
                  <td>$price</td>
                  <td>$address</td>
                  <td>$supporting_picture</td>
                  <td>$date</td>
                  <td>$date_cancelled</td>
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
        $results = mysqli_query($conn, $select_pending_orders_query);

        echo "<h2>Pending Orders</h2>
    <div class='col-lg-11'>
      <div class='card'>
        <div class='card-body'>
          <div class='table-responsive'>
            <table class='table table-hover'>
              <thead>
                <tr>
                  <th>Order #</th>
                  <th>Product</th>
                  <th>Client</th>
                  <th>Employee</th>
                  <th>Notes</th>
                  <th>Schedule Date</th>
                  <th>Price</th>
                  <th>Address</th>
                  <th>Attachment</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>";

        while($row = mysqli_fetch_array($results)) {
          $order_id = $row['order_id'];
          $product_id = $row['product_id'];
          $client_id = $row['client_id'];
          $employee_id = $row['employee_id'];
          $notes = $row['notes'];
          $schedule_date = $row['schedule_date'];
          $price = $row['price'];
          $address = $row['address'];
          $supporting_picture = $row['supporting_picture'];
          $date = $row['date'];
          $date_completed = $row['date_completed'];

          echo "<tr>
                  <th scope='row'>$order_id</th>
                  <td>$product_id</td>
                  <td>$client_id</td>
                  <td>$employee_id</td>
                  <td>$notes</td>
                  <td>$schedule_date</td>
                  <td>$price</td>
                  <td>$address</td>
                  <td>$supporting_picture</td>
                  <td>$date</td>
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
      }
    ?>
  </div>


  <?php
    include('./views/footer_script.php');
  ?>
</body>

</html>