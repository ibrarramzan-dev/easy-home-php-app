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
                    $username = $_SESSION['admin_info']['username'];
                    echo "<span style='font-weight: 400;'>Logged in as:</span> $username";
                  ?>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>