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
      $select_queries_query = "select * from queries";
      $results = mysqli_query($conn, $select_queries_query);

    echo "<h2>Queries</h2>
      <div class='col-lg-11'>
        <div class='card'>
          <div class='card-body'>
            <div class='table-responsive'>
              <table class='table table-hover'>
                <thead>
                  <tr>
                    <th>Query ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Description</th>
                  </tr>
                </thead>
                <tbody>";

       
        while($row = mysqli_fetch_array($results)) {
          $query_id = $row['query_id'];
          $name = $row['name'];
          $email = $row['email'];
          $phone = $row['phone'];
          $subject = $row['subject'];
          $description = $row['description'];

          echo "<tr>
                  <th scope='row'>$query_id</th>
                  <td>$name</td>
                  <td>$email</td>
                  <td>$phone</td>
                  <td>$subject</td>
                  <td>$description</td>
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