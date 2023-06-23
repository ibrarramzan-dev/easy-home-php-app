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

    <h2>View services</h2>

    <div class='col-lg-11'>
      <div class='card'>
        <div class='card-body'>
          <div class='table-responsive'>
            <table class='table table-hover'>
              <thead>
                <tr>
                  <th>Product Id</th>
                  <th>Product Name</th>
                  <th>Description</th>
                  <th>Thumbnail</th>
                </tr>
              </thead>
              <tbody>

                <?php
      $select_products = "select * from products";

        $results = mysqli_query($conn, $select_products);


        while($row = mysqli_fetch_array($results)) {
          $product_id = $row['product_id'];
          $service_name = $row['product_name'];
          $description = $row['description'];
          $product_img = $row['product_img'];

          echo "<tr>
                  <th scope='row'>$product_id</th>
                  <td>$service_name</td>
                  <td>$description</td>
                  <td><u><a href='../../images/products/$product_img' title='View image' target='_blank'>View Image</a></u></td>
                  <td>
                    <a href='./editService.php?service_id=$product_id'>
                      <button type='button' class='btn btn-primary'>Edit</button>                            
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
    ?>

          </div>

          <?php
    include('./views/footer_script.php');
  ?>
</body>

</html>