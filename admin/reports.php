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

    <h2 class="reports-page-heading">View Reports</h2>

    <?php
    // Bar Chart
      $select_products_query = "select * from products";
      $results = mysqli_query($conn, $select_products_query);

      $product_names = [];
      $productUsed = [];

      $totalProductsUsed = 0;

      while($row = mysqli_fetch_array($results)) {
        $product_name = $row['product_name'];
        $used = $row['used'];
        $totalProductsUsed = $totalProductsUsed + $used;

        array_push($product_names, $product_name);
        array_push($productUsed, $used);
      }

      $products_axis_data = '';
      foreach ($product_names as $prod_name) {
        $products_axis_data = "$products_axis_data, '$prod_name'";
      }
      $products_axis_data = ltrim($products_axis_data, $products_axis_data[0]);

      $numOfProducts = mysqli_num_rows($results);

      $products_used_axis_data = '';
      foreach ($productUsed as $productUsedValue) {
        $percentageUsed = $productUsedValue / $totalProductsUsed * 100;
        $products_used_axis_data = "$products_used_axis_data, $percentageUsed";
      }
      $products_used_axis_data = ltrim($products_used_axis_data, $products_used_axis_data[0]);
    ?>

    <?php
    // Line Chart
    $currentYear = date("Y");
    $currentYear = (int) $currentYear;
    $last7thYear = $currentYear - 6;
    
    $last7Years = [strval($last7thYear)];
    for($i = 1; $i < 7; $i++) {
      array_push($last7Years, strval($last7thYear) + $i);
    }

    $years_axis_data = '';
    foreach ($last7Years as $year) {
      $years_axis_data = "$years_axis_data, '$year'";
    }
    $years_axis_data = ltrim($years_axis_data, $years_axis_data[0]);

    $last7YearsOrders = [];
    foreach ($last7Years as $year) {
      $select_orders_query = "select * from orders WHERE is_completed = 1 AND year = '$year'";   
      $results = mysqli_query($conn, $select_orders_query);

      $numOfRows = mysqli_num_rows($results);
      array_push($last7YearsOrders, $numOfRows);
    }

    $orders_axis_data = '';
    foreach ($last7YearsOrders as $numOfOrders) {
      $orders_axis_data = "$orders_axis_data, $numOfOrders";
    }
    $orders_axis_data = ltrim($orders_axis_data, $orders_axis_data[0]);
    ?>

    <div class="reports-wrapper">
      <div class="reports-bar-chart">
        <p class="reports-chart-heading">Products percentage (%) used</p>
        <canvas id="bar-chart"></canvas>
      </div>
      <div class="reports-line-chart">
        <p class="reports-chart-heading">Orders Placed in Time Range</p>
        <canvas id="line-chart"></canvas>
        <p style="text-align: center; margin-top: 20.5px; font-size: 12.5px;"><b>Years</b></p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <?php
    include('./views/footer_script.php');

    echo "<script>
  const barChart = document.getElementById('bar-chart');

  new Chart(barChart, {
    type: 'bar',
    data: {
      labels: [$products_axis_data],
      datasets: [{
        label: '% used',
        data: [$products_used_axis_data],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  </script>";
  ?>

  <?php
  echo "<script>
  const lineChart = document.getElementById('line-chart');

  const labels = [$years_axis_data];
  const data = {
    labels: labels,
    datasets: [{
      label: 'Orders (Last 6 years)',
      data: [$orders_axis_data],
      fill: false,
      borderColor: 'rgb(75, 192, 192)',
      tension: 0.1
    }]
  };

  new Chart(lineChart, {
    type: 'line',
    data: data,
    options: {
      scales: {
        y: {
          stacked: true
        }
      }
    }
  });
  </script>";
?>

</body>

</html>