<nav class="navbar fixed-top navbar-light navbar-expand-md bg-danger justify-content-center">
      <a href="index.php" class="navbar-brand d-flex w-50 mr-auto">Brand</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="collapsingNavbar3">
        <ul class="navbar-nav mx-auto w-100 justify-content-center">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.php" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pick a Tour
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="portfolio-1-col.php">Meeting</a>
                <a class="dropdown-item" href="portfolio-2-col.php">Incentive</a>
                <a class="dropdown-item" href="portfolio-3-col.php">Conferences</a>
                <a class="dropdown-item" href="portfolio-4-col.php">Events</a>
              </div>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">Meeting Tour</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Incentive Tour</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Convension Tour</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Exhibition Tour</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Business Tour</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About Us</a>
            </li>
        </ul>
<!--     PHP : check session login     -->
          <?php
          $firstname = $userType = '';
            if(isset($_SESSION['login_id'])){
                $firstname = $_SESSION['login_firstname'];
                $userType = $_SESSION['user_type'];
                login();
            }else{
                notLogin();
            }
          ?>
<!--     PHP : not login     -->
          <?php
            function notLogin(){
          ?>
          <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="Register.php"><i class="fa fa-user-plus">&nbsp;&nbsp;</i>Sing up&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <a class="nav-link" href="Login.php"><i class="fa fa-user">&nbsp;&nbsp;</i>Login&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </li>
            <li class="nav-item">
              <span class="nav-link text-dark" id="nav-chatservice"><i class="fa fa-comments">&nbsp;&nbsp;</i>Chat Service</span>
              <span class="nav-link text-dark" id="nav-contactservice"><i class="fa fa-phone">&nbsp;&nbsp;</i>+66-xxx-xxxx</span>
            </li>
            <li>
            </li>
          </ul>
          <?php
            }
          ?>
<!--      PHP : login     -->
          <?php
            function login(){
          ?>
          <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="profile.php"><i class="fa fa-user-plus">&nbsp;&nbsp;</i><?php echo $GLOBALS['firstname']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <a class="nav-link" href="logout.php"><i class="fa fa-user">&nbsp;&nbsp;</i>Logout&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </li>
            <li class="nav-item">
              <span class="nav-link text-dark" id="nav-chatservice"><i class="fa fa-comments">&nbsp;&nbsp;</i>Chat Service</span>
              <span class="nav-link text-dark" id="nav-contactservice"><i class="fa fa-phone">&nbsp;&nbsp;</i>+66-xxx-xxxx</span>
            </li>
            <li>
            </li>
          </ul>
          <?php
            }
          ?>
<!--     PHP : end     -->
      </div>
  </nav>
