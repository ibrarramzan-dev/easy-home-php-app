<?php
  include('./includes/db.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
    include("./views/head.php")
  ?>

  <?php
    if(isset($_SESSION['my_account_info']['extra_info'])) {
      if($_SESSION['my_account_info']['extra_info'] == 0) {
        echo "<script>window.open('./my_account.php', '_self')</script>";
      }
    }
  ?>

  <title>Easy Home</title>
</head>

<body>
  <!-- header -->
  <?php
    include("./views/header.php")
  ?>
  <!-- ------ -->

  <!-- Toasts -->

  <?php
    if(isset($_SESSION['extra_account_info_added'])) {
      unset($_SESSION['extra_account_info_added']);

      echo "
        <div class='toast-alert'>
          <p class='toast-alert-header'>Success</p> 
          <p class='toast-alert-body'>Account info updated</p>
        </div>
        ";
    }
  ?>

  <?php
    if(isset($_SESSION['service_request_submitted'])) {
      unset($_SESSION['service_request_submitted']);

      echo "
        <div class='toast-alert'>
          <p class='toast-alert-header'>Success</p> 
          <p class='toast-alert-body'>Thank you for your request. You will receive offers shortly!</p>
        </div>
        ";
    }
  ?>

  <!-- End of Toasts -->

  <!-- Page Content -->

  <img id="background" src="images/background.jpg" alt="background image">
  <h2 id="title-style">Cu toata increderea. De 15 de ani</h2>
  <h4 id="functioneaza-align">Cum functioneaza</h4>
  <div class="text-arrangement">
    <ol>
      <li>
        Postezi jobul (adauga cat mai multe detalii si fotografii astfel incat sa primesti oferte cat mai exacte.)
      </li>
      <li>
        Profesionistii nostri iti vor trimite oferte personalizate.
      </li>
      <li>
        Alege oferta potrivita pentru tine.
      </li>
      <li>
        Soseste specialistul ( incepe lucrul la ora stabilita impreuna.)
      </li>
    </ol>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

  <!-- Servicii -->
  <div id="asistenta"></div>
  <br>
  <br>
  <br>
  <br>
  <h2 id="text-contact">SERVICII BUCURESTI</h2>

  <div class="container-fluid mt-3">
    <div class="row">

      <?php
    $select_products_query = "select * from products";

    $results = mysqli_query($conn, $select_products_query);

    $index = 0;
    while($row = mysqli_fetch_array($results)) {
      $index++;

      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $description = $row['description'];
      $product_img = $row['product_img'];

      $service_name = str_replace(' ', '_', $product_name);

      echo "
        <div class='col p-3 bg-primary text-white'>
          <p class='align'>$index</p>
        
          <div class='center-picture'>
            <img class='picture-style' src='./images/products/$product_img' alt='Service thumbnail'>
          </div>
        
          <h3 class='align'>$product_name</h3>
          <p class='align'>$description</p>
          
          <a href='./cere_oferta.php?product_id=$product_id&service=$service_name' title='Get $product_name service' style='text-decoration: none;'>
            <button class='button-style'>Cere oferta</button>
          </a>
        </div>
      ";
    }
  ?>


    </div>
  </div>

  <!-- Avantaje -->
  <div id="avantaje"></div>
  <br>
  <div class=" avantaje entry">
    <img class="avantaje-img" src="images/transparenta.png" alt="pretul corect">
    <p class="avantaje-t">Pretul corect</p>
    <p class="avantaje-p">Primesti in cateva minute oferta personalizata</p>
  </div>
  <div class="entry">
    <img class="avantaje-img" src="images/economiseste.png" alt="economiseste timp">
    <p class="avantaje-t">Economiseste timp</p>
    <p class="avantaje-p">Nu pierde timp verificând referințe de la prieteni și familie, astfel economisesti timp pentru
      a-l petrece cu cei dragi.</p>
  </div>
  <div class="entry">
    <img class="avantaje-img" src="images/incredere.png" alt="ai incredere">
    <p class="avantaje-t">Ai incredere</p>
    <p class="avantaje-p">Ne asiguram ca lucrarea ta se desfasoara fara probleme.</p>
  </div>
  <div class="entry">
    <img class="avantaje-img" src="images/simplu.png" alt="simplu de folosit">
    <p class="avantaje-t">Simplu de folosit</p>
    <p class="avantaje-p">Durează doar un minut să răspunzi întrebărilor pentru serviciul căutat și trimiți cererea
      foarte ușor.</p>
  </div>

  <br>
  <br>
  <!-- form - contact -->
  <div id="contact"></div>
  <br>

  <div class="grid-container-element">
    <h2 id="text-contact">Contacteaza-ne</h2>
    <div class="grid-child-element1">
      <form class="form" action="" method="">
        <div class="div-margin">
          <label for="name">Nume</label>
          <input type="text" name="name" id="name" placeholder="Introduceti numele">
        </div>
        <div class="div-margin">
          <label for="email">Email</label>
          <input type="email" name="Email" id="email" placeholder="adresa de email">
        </div>
        <div class="div-margin">
          <label for="number">Telefon</label>
          <input type="tel" name="Number" id="number" placeholder="numarul de telefon">
        </div>
        <div class="div-margin">
          <label for="subiect">Subiect</label>
          <input type="text" name="Email" id="subiect" placeholder="Introduceti subiectul">
        </div>
    </div>
    <div class="grid-child-element2">
      <label for="description">Detalii</label>
      <textarea name="description" id="description" cols="30" rows="10"
        placeholder="Introduceti textul aici..."></textarea>
    </div>
    <div class="center-button">
      <button class="button-style2">Trimite</button>
    </div>
    </form>
  </div>
  <br>
  <br>
  <br>
  <br>

  <!-- End of Page Content -->


  <!-- footer -->
  <?php
    include("./views/footer.php")
  ?>
  <!-- ------ -->
</body>

</html>