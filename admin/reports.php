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

    <div class="reports-wrapper">
      <div class="reports-bar-chart">
        <p class="reports-chart-heading">Stock of Products available</p>
        <canvas id="bar-chart"></canvas>
      </div>
      <div class="reports-line-chart">
        <p class="reports-chart-heading">Orders Placed in Time Range</p>
        <canvas id="line-chart"></canvas>
      </div>
    </div>
  </div>


  <?php
    include('./views/footer_script.php');
  ?>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
  const barChart = document.getElementById('bar-chart');

  new Chart(barChart, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [10, 19, 3, 5, 2, 3],
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
  </script>

  <script>
  const lineChart = document.getElementById('line-chart');

  const labels = ['Jan', 'Feb', 'March', 'Apr', 'May', 'June', 'Jul'];
  const data = {
    labels: labels,
    datasets: [{
      label: 'My First Dataset',
      data: [65, 59, 80, 81, 56, 55, 40],
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
  </script>
</body>

</html>