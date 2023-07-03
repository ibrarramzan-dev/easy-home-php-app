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
      
      $select_employees_query = "select * from employees where is_active = 1";
      $select_new_employee_requests_query = "select * from employees where is_active = 0";

      if($status == 'new') {
        $results = mysqli_query($conn, $select_new_employee_requests_query);

        echo "<h2>New Employee Requests</h2>
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
                  <th>Date created</th>
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
                  <td><u><a href='./view.php?entity=product&entity_id=$product_id' title='View Product' target='_blank'>$product_id</a></u></td>
                  <td>$phone</td>
                  <td>$date_created</td>
                  <td>
                    <a href='./process/process_approve_employee.php?employee_id=$employee_id' title='Mark as Complete'>
                      <button type='button' class='btn btn-primary'>Approve</button>                            
                    </a>
                  </td>
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
        $results = mysqli_query($conn, $select_employees_query);

        echo "<h2>View Employees</h2>
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
                  <th>Date created</th>
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
                  <td><u><a href='./view.php?entity=product&entity_id=$product_id' title='View Product' target='_blank'>$product_id</a></u></td>
                  <td>$phone</td>
                  <td>$date_created</td>
                  </td>
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