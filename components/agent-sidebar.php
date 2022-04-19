<style>
  .loaderData {
    background-color: #2980b9;
    height: 4px;
    width: 0px;
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
  .ptr--content{
    display:none;
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
      <span><i style="color:#FFB81C;" class="fa fa-bell"></i></span>
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
    <li><a href="homepage.php">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-home" style="font-size: 25px; color:#FFB81C;"></i>
        <span style="padding-left:20px">Home</span>
      </a>
    </li>
    <li><a href="profile.php">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-user" style="font-size: 25px; color:#FFB81C;"></i>
        <span style="padding-left:28px">My Profile</span>
      </a>
    </li>
    <li class="switch"><a href="#" data-toggle="modal" data-target="#exampleModalz">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-toggle-on" style="font-size: 25px; color:#FFB81C;"></i>
        <span style="padding-left:20px">Switch Property</span>
      </a>
    </li>
    <!-- <li><a href="homePage2.php">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-toggle-on" style="font-size: 25px; color:#FFB81C;"></i>
        <span style="padding-left:20px">Switch Theme</span>
      </a>
    </li> -->
    <li><a href="reminders.php">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bell" style="font-size: 25px; color:#FFB81C;"></i>
        <span style="padding-left:20px">Reminders</span></a>
    </li>
    <li><a href="view-leads.php">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-users" style="font-size: 25px; color:#FFB81C;"></i>
        <span style="padding-left:20px">Register Leads</span>
      </a>
    </li>
    <li><a href="site-visit.php">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-eye" style="font-size: 25px; color:#FFB81C;"></i>
        <span style="padding-left:20px">Site Visits</span>
      </a>
    </li>
    <li><a href="send-pushnotifcation.php">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-paper-plane" style="font-size: 25px; color:#FFB81C;"></i>
        <span style="padding-left:20px">Send Notification</span>
      </a>
    </li>
    <li><a href="lead-stat.php">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bar-chart" style="font-size: 25px; color:#FFB81C;"></i>
        <span style="padding-left:20px">Lead Analytics</span>
      </a>
    </li>
    <li class="sidebardetail"><a href="view-aleads.php">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-archive" style="font-size: 25px; color:#FFB81C;"></i>
        <span style="padding-left:20px">View All Leads</span>
      </a>
    </li>
    <li><a href="view-leads.php?filter=archived">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-archive" style="font-size: 25px; color:#FFB81C;"></i>
        <span style="padding-left:20px">Archive Leads</span>
      </a>
    </li>
    <li><a href="../source/logout.php">
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
<div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Unit ShortList</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="uno">Unit number</label>
          <input type="text" class="form-control" id="uno" placeholder="Enter Unit Number">
          <input type="hidden" class="form-control" readonly id="unlid">
        </div>
        <div class="form-group">
          <label for="amtdsc">Discussed Price</label>
          <input type="text" class="form-control" id="amtdsc" placeholder="Enter Amount">
        </div>
        <div class="px-2 mx-2 py-2">
          <p class="text-danger text-center remErre"></p>
          <center>
            <button type="button" class="btn btn-primary saveUni" onclick="setUnit();">Save changes</button>
          </center>
        </div>
      </div>
    </div>
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
