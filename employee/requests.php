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
      if(isset($_SESSION['e_order_accepted'])) {
        unset($_SESSION['e_order_accepted']);

        echo "
          <div class='toast-alert'>
            <p class='toast-alert-header'>Success</p> 
            <p class='toast-alert-body'>Order accepted</p>
          </div>
          ";
      } else if (isset($_SESSION['e_order_completed'])) {
        unset($_SESSION['e_order_completed']);

        echo "
          <div class='toast-alert'>
            <p class='toast-alert-header'>Success</p> 
            <p class='toast-alert-body'>Order marked as complete</p>
          </div>
          ";
      }
      ?>
    <!-- End of Toasts -->

    <?php
      $status = '';
      if(isset($_GET['status'])) {
        $status = $_GET['status'];
      }
      $employee_id = $_SESSION['e_info']['employee_id'];
      $product_id = $_SESSION['e_info']['service'];
      
      $select_orders_query = "select * from orders where employee_id = 0 AND product_id = '$product_id'";
      $select_pending_orders_query = "select * from orders where employee_id = '$employee_id' AND is_completed = 0";
      $select_completed_orders_query = "select * from orders where employee_id = '$employee_id' AND is_completed = 1";


      if($status == 'pending') {
        $results = mysqli_query($conn, $select_pending_orders_query);

        echo "<h2>Pending Requests</h2>
    <div class='col-lg-11'>
      <div class='card'>
        <div class='card-body'>
          <div class='table-responsive'>
            <table class='table table-hover'>
              <thead>
                <tr>
                  <th>Order #</th>
                  <th>Notes</th>
                  <th>Address</th>
                  <th>Date</th>
                  <th>Attachment</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>";

        while($row = mysqli_fetch_array($results)) {
          $order_id = $row['order_id'];
          $notes = $row['notes'];
          $address = $row['address'];
          $date = $row['date'];
          $price = $row['price'];
          $supporting_picture = $row['supporting_picture'];

          echo "<tr>
                  <th scope='row'>$order_id</th>
                  <td>$notes</td>
                  <td>$address</td>
                  <td>$date</td>
                  <td><a href='../images/cere_oferta/$supporting_picture' target='_blank'>View Image</a></td>
                  <td class='color-primary'>$$price</td>
                  <td>
                    <a href='./process/process_complete_order.php?order_id=$order_id' title='Mark as Complete'>
                      <button type='button' class='btn btn-primary'>Complete?</button>                            
                    </a>
                  </td>
                </tr>";
          }

          echo "</tbody>
            </table>
          </div>
        </div>
      </div>
    </div>";
      } else if ($status == 'completed') {
        $results = mysqli_query($conn, $select_completed_orders_query);

        echo "<h2>Completed Requests</h2>
    <div class='col-lg-11'>
      <div class='card'>
        <div class='card-body'>
          <div class='table-responsive'>
            <table class='table table-hover'>
              <thead>
                <tr>
                  <th>Order #</th>
                  <th>Notes</th>
                  <th>Address</th>
                  <th>Date</th>
                  <th>Attachment</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>";

        while($row = mysqli_fetch_array($results)) {
          $order_id = $row['order_id'];
          $notes = $row['notes'];
          $address = $row['address'];
          $date = $row['date'];
          $price = $row['price'];
          $supporting_picture = $row['supporting_picture'];

          echo "<tr>
                  <th scope='row'>$order_id</th>
                  <td>$notes</td>
                  <td>$address</td>
                  <td>$date</td>
                  <td><a href='../images/cere_oferta/$supporting_picture' target='_blank'>View Image</a></td>
                  <td class='color-primary'>$$price</td>
                </tr>";
          }

          echo "</tbody>
            </table>
          </div>
        </div>
      </div>
    </div>";
      } else {
        $results = mysqli_query($conn, $select_orders_query);

        echo "<h2>New Requests</h2>
    <div class='col-lg-11'>
      <div class='card'>
        <div class='card-body'>
          <div class='table-responsive'>
            <table class='table table-hover'>
              <thead>
                <tr>
                  <th>Order #</th>
                  <th>Notes</th>
                  <th>Address</th>
                  <th>Date</th>
                  <th>Attachment</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>";

        while($row = mysqli_fetch_array($results)) {
          $order_id = $row['order_id'];
          $notes = $row['notes'];
          $address = $row['address'];
          $date = $row['date'];
          $price = $row['price'];
          $supporting_picture = $row['supporting_picture'];

          echo "<tr>
                  <th scope='row'>$order_id</th>
                  <td>$notes</td>
                  <td>$address</td>
                  <td>$date</td>
                  <td><a href='../images/cere_oferta/$supporting_picture' target='_blank'>View Image</a></td>
                  <td class='color-primary'>$$price</td>
                  <td>
                    <a href='./process/process_accept_order.php?order_id=$order_id'>
                      <button type='button' class='btn btn-primary'>Accept</button>                            
                    </a>
                  </td>
                </tr>";
          }

          echo "</tbody>
            </table>
          </div>
        </div>
      </div>
    </div>";
      }
    ?>




  </div>


  <?php
    include('./views/footer_script.php');
  ?>
  <!-- bootstrap -->
  <script src="js/lib/bootstrap.min.js"></script>
</body>

</html>