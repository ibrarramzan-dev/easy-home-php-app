<?php include('./includes/db.php'); ?>
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

  <title>Lucrarile Anterioare | Easy Home</title>
</head>

<body>
  <!-- header -->
  <?php
    include("./views/header.php")
  ?>
  <!-- ------ -->


  <!-- Page Content -->

  <br /><br />

  <div class="lucrarile-container">

    <?php
    $client_id = $_SESSION['my_account_info']['client_id'];
            
    $select_orders_query = "select * from orders WHERE client_id = '$client_id' AND (is_completed = 1 OR is_cancelled = 1)";

    $results = mysqli_query($conn, $select_orders_query);

    echo "<h2 class='lucrarile-heading'>Past Requests</h2>
    <div class='col-lg-11'>
      <div class='card'>
        <div class='card-body'>
          <div class='table-responsive'>
            <table class='table table-hover'>
              <thead>
                <tr>
                  <th>Order #</th>
                  <th>Product</th>
                  <th>Notes</th>
                  <th>Schedule Date</th>
                  <th>Price</th>
                  <th>Address</th>
                  <th>Attachment</th>
                  <th>Date</th>
                  <th>Employee</th>
                  <th>Cancelled</th>
                  <th>Date Cancelled</th>
                  <th>Completed</th>
                  <th>Date Completed</th>
                </tr>
              </thead>
              <tbody>";

        while($row = mysqli_fetch_array($results)) {
          $order_id = $row['order_id'];
          $product_id = $row['product_id'];
          $employee_id = $row['employee_id'];
          $notes = $row['notes'];
          $schedule_date = $row['schedule_date'];
          $price = $row['price'];
          $address = $row['address'];
          $supporting_picture = $row['supporting_picture'];
          $date = $row['date'];
          $is_cancelled = $row['is_cancelled'];
          $date_cancelled = $row['date_cancelled'];
          $is_completed = $row['is_completed'];
          $date_completed = $row['date_completed'];

          // getting product info
          $select_product_query = "select * from products where product_id = '$product_id'";
          $productResult = mysqli_query($conn, $select_product_query);
          $productResultRow = mysqli_fetch_assoc($productResult);

          $product_name = $productResultRow['product_name'];

          $cancelled = 'No';
          $completed = 'No';

          $classname = 'order-cancelled-bg';
          if ($is_cancelled != 1) {
            $completed = 'Yes';
            $date_cancelled = 'N/A';
          } else {
            $cancelled = 'Yes';
            $date_completed = 'N/A';
            $classname = '';
          }

          $employee_name = "N/A";
          if($employee_id != 0) {
            // getting employee info
            $select_employee_query = "select * from employees where employee_id = '$employee_id'";
            $employeeResult = mysqli_query($conn, $select_employee_query);
            $employeeResultRow = mysqli_fetch_assoc($employeeResult);

            $first_name = $employeeResultRow['first_name'];
            $last_name = $employeeResultRow['last_name'];
            $employee_name = "$first_name $last_name";
          }

          echo "<tr class='$classname'>
                  <th scope='row'>$order_id</th>
                  <td>$product_name</td>
                  <td>$notes</td>
                  <td>$schedule_date</td>
                  <td>$price</td>
                  <td>$address</td>
                  <td><u><a href='./images/cere_oferta/$supporting_picture' title='View image' target='_blank'>View Image</a></u></td>
                  <td>$date</td>
                  <td>$employee_name</td>
                  <td>$cancelled</td>
                  <td>$date_cancelled</td>
                  <td>$completed</td>
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
  
    ?>

  </div>
  <br /><br /><br />

  <!-- End of Page Content -->


  <!-- footer -->
  <?php
    include("./views/footer.php")
  ?>
  <!-- ------ -->
</body>

</html>