<header>
  <nav class="navbar navbar-expand-xl bg-light navbar-light fixed-top ">
    <div class="container-fluid">
      <a class="a_navbar navbar-brand logo_a_navbar" href="/">
        <img id="logo" src="images/logo.jpg" alt="Logo" style="width: 195px; height: 60px;" title="Easy Home">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar" style="display: flex; justify-content: flex-end;">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class=" a_navbar nav-link" href="about.html">Despre noi</a>
          </li>
          <li class="nav-item">
            <a class="a_navbar nav-link" href="#avantaje">Avantaje</a>
          </li>
          <li class="nav-item">
            <a class="a_navbar nav-link" href="#asistenta">Asistenta</a>
          </li>
          <li class="nav-item">
            <a class="a_navbar nav-link" href="#contact">Contact</a>
          </li>

          <?php
            if(isset($_SESSION['my_account_info'])) {
              $username = $_SESSION['my_account_info']['username'];

              echo "                
                <li>
                  <div class='avatar-dropdown'>
                    <img src='./images/client_profile_pictures/mike.jpg' alt='Avatar' class='avatar-profile-picture class='avatar-dropdown-btn' />
                    <span class='avatar-dropdown-btn'>$username</span>
                    
                    <div class='avatar-dropdown-content'>
                      <a href='./lucrarile_mele.php'>Lucrarile mele</a>
                      <a href='./lucrari_anterioare.php'>Lucrari anterioare</a>
                      <a href='./my_account.php'>My Account</a>
                      <a href='./logout.php'>Disconnect</a>
                    </div>
                  </div>
                </li>
              ";              
            } else {
              echo "
                <li class='nav-item'>
                  <a class='a_navbar nav-link' href='/signup.php'>Signup</a>
                </li>
                <li class='nav-item'>
                  <a class='a_navbar nav-link' href='/login.php'>Login</a>
                </li>
              ";              
            }
          ?>



      </div>
      </ul>
    </div>
    </div>
  </nav>
</header>