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

    <h2>Search Employee</h2>

    <form action="#" class="search-form" method="POST">
      <div class="form-group">
        <div class="search-form-input-and-search-btn-wrapper">
          <div class="search-form-input">
            <input type="text" class="form-control" name="search"
              placeholder="Search employee by ID, Name, Email or Phone" maxlength="255" required />
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

          $select_search_employees_query = "SELECT * FROM employees WHERE ((`employee_id` LIKE '%".$query."%') OR (`full_name` LIKE '%".$query."%') OR (`email` LIKE '%".$query."%') OR (`phone` LIKE '%".$query."%')) AND is_active = 1";

          $results = mysqli_query($conn, $select_search_employees_query);

          if(mysqli_num_rows($results) > 0) {
              echo "<p>Showing Results for '<b>$query</b>'</p>
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
                  <td><u><a href='./view.php?entity=product&entity_id=$product_id' title='View Product' target='_blank'>$product_id</a></u></td>
                  <td>$phone</td>
                  <td>$date_created</td>
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