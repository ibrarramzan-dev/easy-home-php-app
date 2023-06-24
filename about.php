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
  <title>About Us</title>
</head>

<body>
  <!-- header -->
  <?php
    include("./views/header.php")
  ?>
  <!-- ------ -->


  <!-- Page Content -->

  <br /><br />

  <!-- image-slide -->
  <div class="swiper">
    <div class="container1 swiper-wrapper">
      <div class="swiper-slide"><img src="./images/poza1.jpeg">
        <span class="text_image">Solutii pentru nevoile locuintei tale</span>
      </div>
      <div class="swiper-slide"><img src="./images/poza2.jpeg">
        <span class="text_image">Confort, fara pic de efort. Rapid, Eficient, Ieftin</span>
      </div>
      <div class="swiper-slide"><img src="./images/poza3.jpeg">
        <span class="text_image">Si casa ta are nevoie de un prieten</span>
      </div>
    </div>
    <div class="swiper-pagination">
    </div>
    <div class="swiper-button-prev">
    </div>
    <div class="swiper-button-next">
    </div>
  </div>
  <br>
  <br>
  <br>
  <!-- text -->
  <div class="text-style">
    <h2 tle">EASY <span id="home">HOME</span></h2>
    Lorem ipsum dolor sit amet consectetur, adipisicing elit. At tenetur hic quas temporibus dolores culpa placeat
    debitis vitae. Provident eius, quas velit excepturi temporibus dicta suscipit voluptatem debitis ea blanditiis
    voluptatum illum repellendus tempora ipsa maxime! Fugit voluptatem nesciunt quasi vitae facilis ipsum incidunt vel!
    Eligendi illo placeat mollitia nesciunt aliquam commodi aspernatur voluptatem saepe.
  </div>
  <br>
  <br>
  <!-- citate -->
  <h2 id="clienti_style">Ce spun clientii</h2>
  <div class="quote">
    <span class="left">❝</span>
    <blockquote>
      Am incercat sa fac singur montajul aplicelor dar bormasina mea nu a facut fata asa ca am chemat pe cineva de la
      voi.
      Vreau sa va spun ca am fost multumit si am sa mai apelez la voi si pentru alte reparatii.
    </blockquote>
    <small>Adrian P.</small> <cite>Sector 4 Bucuresti</cite>
    <span class="right">❞</span>
  </div>
  <div class="quote">
    <span class="left">❝</span>
    <blockquote>
      Am facut cu firma dvs. mai multe lucrari de electrica si am fost foarte multumita de serviciu. Electricienii care
      au
      venit mi-au montat toate aplicele, mi-au schimbat prizele si intrerupatoarele si au facut si montajul tabloului
      electric
      si totul functioneaza perfect.
    </blockquote>
    <small>Elena J.</small> <cite>Sector 1 Bucuresti</cite>
    <span class="right">❞</span>
  </div>
  <div class="quote">
    <span class="left">❝</span>
    <blockquote>
      Intr-o zi hidroforul de la casa nu a mai vrut sa porneasca deloc. Am cautat pe internet firma de reparatii
      hidrofoare si
      v-am gasit primi listati. Se pare ca am fost nosrocos instalatorul trimis la lucrare a schimbat pompa care se
      arsese si
      acom totul e ok.
    </blockquote>
    <small>Bogdan P.</small> <cite>Pipera</cite>
    <span class="right">❞</span>
  </div>
  <div class="quote">
    <span class="left">❝</span>
    <blockquote>
      Am schimbat tevile din baie pe cupru cu instalatorii din echipa de la easyhome si la final au facut si montajul
      obiectelor sanitare. Un serviciu de calitatate, recomand.
    </blockquote>
    <small>Cristi O.</small> <cite>Sector 1 Bucuresti</cite>
    <span class="right">❞</span>
  </div>
  <div class="quote">
    <span class="left">❝</span>
    <blockquote>
      Dupa renovarea apartamentului am avut nevoie de un instalator pentru montajul caloriferelor la loc si am facut
      lucrarea
      cu unul din baieti de la easyhome Un serviciu prompt, si ieftin. Recomand!
    </blockquote>
    <small>Bogdan F.</small> <cite>Sector 6 Bucuresti</cite>
    <span class="right">❞</span>
  </div>
  <div class="quote">
    <span class="left">❝</span>
    <blockquote>
      Nu am avut niciodata incredere in mesterii de pe internet dar nu am avut ce face cand a inceput sa curga robinetul
      la
      calorifer si am chemat pe cineva de la easyhome. De acum, cel putin pentru instalatori de reparatii la instalatii
      termice, stiu pe cine sa chem. Bravo!
    </blockquote>
    <small>Cristi B.</small> <cite>Sector 1 Bucuresti</cite>
    <span class="right">❞</span>
  </div>
  <div class="quote">
    <span class="left">❝</span>
    <blockquote>
      M-am mutat de curand in Bucuresti (la facultate) si am avut nevoie de un instalator pentru a schimba complet
      instalatia sanitara din bucatarie si pentru a monta masina de spalat. Sunt foarte multumit de lucrarea efectuata.
      O sa va recomand mai departe cu cea mai mare placere!
    </blockquote>
    <small>Baidac M.</small> <cite>Sector 6 Bucuresti</cite>
    <span class="right">❞</span>
  </div>
  <div class="quote">
    <span class="left">❝</span>
    <blockquote>
      Sunteți extraordinari! Ați executat lucrarea cu profesionalism german: perfect, curat și fără întârzieri.
      Felicitări!
    </blockquote>
    <small>Ada M.</small> <cite>Sector 4 Bucuresti</cite>
    <span class="right">❞</span>
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

  <br /><br /><br />

  <!-- End of Page Content -->


  <!-- footer -->
  <?php
    include("./views/footer.php")
  ?>
  <!-- ------ -->
</body>

</html>