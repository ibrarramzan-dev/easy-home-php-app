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

    <h2>Search Client</h2>

    <form action="#" class="search-form" method="POST">
      <div class="form-group">
        <div class="search-form-input-and-search-btn-wrapper">
          <div class="search-form-input">
            <input type="text" class="form-control" name="search"
              placeholder="Search client by ID, Name, Username, Email or Phone" maxlength="255" required />
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

          $select_search_clients_query = "SELECT * FROM clients WHERE ((`client_id` LIKE '%".$query."%') OR (`full_name` LIKE '%".$query."%') OR (`username` LIKE '%".$query."%') OR (`email` LIKE '%".$query."%') OR (`phone` LIKE '%".$query."%')) AND extra_info = 1";

          $results = mysqli_query($conn, $select_search_clients_query);

          if(mysqli_num_rows($results) > 0) {
              echo "<p>Showing Results for '<b>$query</b>'</p>
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
                  <td>";
                  if($profile_picture === '') {
                    echo "N/A";
                  } else {
                    echo "<u><a href='../../images/client_profile_pictures/$username/$profile_picture' title='View image' target='_blank'>View Image</a></u>";
                  }
                  echo "</td>
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