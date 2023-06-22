  <div class="header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="float-left">
            <div class="hamburger sidebar-toggle">
              <span class="line"></span>
              <span class="line"></span>
              <span class="line"></span>
            </div>
          </div>
          <div class="float-right">
            <div class="dropdown dib">
              <div class="header-icon" data-toggle="dropdown">
              </div>
            </div>
            <div class="dropdown dib">
            </div>
            <div class="dropdown dib">
              <div class="header-icon">
                <span class="user-avatar">
                  <?php
                    $email = $_SESSION['e_info']['email'];
                    echo "<span style='font-weight: 400;'>Logged in as:</span> $email";
                  ?>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>