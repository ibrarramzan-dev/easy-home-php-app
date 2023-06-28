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
      $select_clients_query = "select * from clients WHERE extra_info = 1 AND is_deleted = 0";

      $results = mysqli_query($conn, $select_clients_query);

        echo "<h2>Clients</h2>
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
                  <td><u><a href='../../images/client_profile_pictures/$username/$profile_picture' title='View image' target='_blank'>View Image</a></u></td>
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
    ?>
  </div>


  <?php
    include('./views/footer_script.php');
  ?>
</body>

</html>