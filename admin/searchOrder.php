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

    <h2>Search Order</h2>

    <form action="#" class="search-form" method="POST">
      <div class="form-group">
        <div class="search-form-input-and-search-btn-wrapper">
          <div class="search-form-input">
            <input type="text" class="form-control" name="search" placeholder="Search order by ID, Notes or Date placed"
              maxlength="2000" required />
          </div>
          <div class="search-form-button">
            <input type="submit" class="form-control btn btn-primary" value="Search" />
          </div>
        </div>

      </div>
    </form>

    <div class="search-form-list">
      <?php 
        if(isset($_POST['search'])) {
          $query = $_POST['search'];

          $select_search_orders_query = "SELECT * FROM orders WHERE ((`order_id` LIKE '%".$query."%') OR (`notes` LIKE '%".$query."%') OR (`date` LIKE '%".$query."%')) AND is_cancelled = 0";

          $results = mysqli_query($conn, $select_search_orders_query);

          if(mysqli_num_rows($results) > 0) {
              echo "<p>Showing Results for '<b>$query</b>'</p>
          <div class='col-lg-11'>
            <div class='card'>
              <div class='card-body'>
                <div class='table-responsive'>
                  <table class='table table-hover'>
                    <thead>
                      <tr>
                        <th>Order Id</th>
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
                  <td><u><a href='./view.php?entity=product&entity_id=$product_id' title='View Product' target='_blank'>$product_id</a></u></td>
                  <td><u><a href='./view.php?entity=client&entity_id=$client_id' title='View Client' target='_blank'>$client_id</a></u></td>
                  <td>";
                  if($employee_id == 0) {
                    echo "Pending";
                  } else {
                    echo "<u><a href='./view.php?entity=employee&entity_id=$employee_id' title='View Employee' target='_blank'>$employee_id</a></u>";
                  }
                  echo "</td>
                  <td>$notes</td>
                  <td>$schedule_date</td>
                  <td>$price</td>
                  <td>$address</td>
                  <td>";
                  if($supporting_picture === '') {
                    echo "N/A";
                  } else {
                    echo "<u><a href='../images/cere_oferta/$supporting_picture' title='View image' target='_blank'>View Image</a></u>";
                  }
                  echo "</td>
                  <td>$date</td>
                  <td>";
                  if($date_completed === '') {
                    echo "N/A";
                  } else {
                    echo $date_completed;
                  }
                  echo "</td>
                </tr>";
          }

          echo "</tbody>
            </table>";
          } else {
            echo "<p class='search-form-no-results-found-text'>No results found for '<b>$query</b>'</p>";
          }
        }
      ?>
    </div>
  </div>


  <?php
    include('./views/footer_script.php');
  ?>
</body>

</html>