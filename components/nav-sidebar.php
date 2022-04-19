<style>
  .bellno {
    animation: shake 0.5s;
    animation-iteration-count: infinite;
  }

  .loaderData {
    background-color: #2980b9;
    height: 4px;
    width: 0px;
  }
  .ptr--content{
    display:none;
  }
  

  .circleS {
    width: 100%;
    height: 80px;
    line-height: 85px;
    border-radius: 50%;
    font-size: 45px;
    font-weight: 500;
    font-family: roboto, arial;
    color: white;
    text-align: center;
    background: black;
  }

  @keyframes shake {

    10%,
    90% {
      transform: translate3d(-1px, 0, 0);
    }

    20%,
    80% {
      transform: translate3d(2px, 0, 0);
    }

    30%,
    50%,
    70% {
      transform: translate3d(-2px, 0, 0);
    }

    40%,
    60% {
      transform: translate3d(1px, 0, 0);
    }
  }
</style>
<div class="header-area" id="headerArea">
  <div class="container h-100 d-flex align-items-center justify-content-between">
    <!-- Navbar Toggler-->
    <div class="builderneed-navbar-toggler d-flex flex-wrap" id="builderneedNavbarToggler">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <!-- Search Form-->
    <div class="top-search-form">
      <div class="logo-wrapper">
        <img class="site_logo" src="../assets/img/core-img/loader.gif" width="50" height="120" alt="">
      </div>
    </div>
    <!-- Profile Toggler-->
    <div id="builderneedNavbarToggler">
      <a href="notifications.php" onclick="clearNotfication()"><span><i style="color:#FFB81C;" class="fa fa-bell addNotification"></i></span></a>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="loaderData"></div>
</div>
<!-- Sidenav Black Overlay-->
<div class="sidenav-black-overlay"></div>
<!-- Side Nav Wrapper-->
<div class="builderneed-sidenav-wrapper" id="sidenavWrapper">
  <!-- Sidenav Profile-->
  <div class="sidenav-profile ">
    <div class="user-profile">
      <div class="circleS">
        <span class="nameInitials"></span>
      </div>
    </div>
    <div class="user-info">
      <h6 class="user-name mb-0"></h6>
      <p class="available-balance">Project : <span class="header_name"></span></p>
    </div>
  </div>
  <!-- Sidenav Nav-->
  <ul class="sidenav-nav pl-0">
    <li onclick="loadme()"><a href="home.php">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-home" style="font-size: 25px; color:#FFB81C;"></i>
        <span style="padding-left:20px">Home</span>
      </a>
    </li>
    <li onclick="loadme()" class="switch"><a href="#" data-toggle="modal" data-target="#exampleModalz">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-toggle-on" style="font-size: 25px; color:#FFB81C;"></i>
        <span style="padding-left:20px">Switch Property</span>
      </a>
    </li>
    <li onclick="loadme()"><a href="profile.php">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-user" style="font-size: 25px; color:#FFB81C;"></i>
        <span style="padding-left:25px">My Profile</span>
      </a>
    </li>
    <!-- <li><a href="">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="lni lni-circle-minus" style="font-size: 25px; color:#FFB81C;"></i>
        <span style="padding-left:20px">About Us</span></a>
    </li> -->
    <li onclick="loadme()"><a href="history.php">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-gavel" style="font-size: 25px; color:#FFB81C;"></i>
        <span style="padding-left:20px">History</span>
      </a>
    </li>
    <li onclick="loadme()"><a href="summary.php">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-eye" style="font-size: 25px; color:#FFB81C;"></i>
        <span style="padding-left:20px">Site Visits</span>
      </a>
    </li>
    <li onclick="loadme()"><a href="../source/logout.php">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="lni lni-power-switch" style="font-size: 25px; color:#FFB81C;"></i>
        <span style="padding-left:20px">Logout</span>
      </a>
    </li>
  </ul>
  <!-- Go Back Button-->
  <!-- <div class="go-home-btn" id="goHomeBtn"><i class="fa fa-times" aria-hidden="true"></i> -->
  <!-- </div> -->
  <div id="">
    <hr>
    <ul class="sidenav-nav pl-0">
      <li><a href="">
          &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-share" style="font-size: 25px; color:#FFB81C;"></i>
          <span style="padding-left:20px">Refer a friend</span>
        </a>
      </li>
      <li><a href="">
          &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-comments" style="font-size: 25px; color:#FFB81C;"></i>
          <span style="padding-left:20px">Help and Feedback</span>
        </a>
      </li>
    </ul>
  </div>
</div>
<div style="z-index:9999999;top:50px;" class="modal fade" id="exampleModalz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelz" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <br>
      <div class="subscription-container">

      </div>
      <h2 class="text-dark text-center loadpr"></h2>
      <br>
    </div>
  </div>
</div>
<main>