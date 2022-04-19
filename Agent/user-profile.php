<!DOCTYPE html>
<html lang="en">
<!--head and meta tags-->
<?php include '../components/head.php' ?>
<style>
  /* Card styles */
  .cardss {
    background-color: #fff;
    overflow: hidden;
    margin: 0px;
    border-radius: 15px;
    box-shadow: 9px 17px 45px -29px rgba(0, 0, 0, 0.44);
  }

  /* Card image loading */
  .card__image img {
    width: 100%;
    height: 100%;
  }

  .card__image.loading {
    height: 80px;
    width: 400px;
  }

  /* Card title */
  .card__title {
    padding: 8px;
    font-size: 22px;
    font-weight: 700;
  }

  .card__title.loading {
    height: 1rem;
    width: 50%;
    margin: 1rem;
    border-radius: 3px;
  }

  /* Card description */
  .card__description {
    padding: 8px;
    font-size: 16px;
  }

  .card__description.loading {
    height: 3rem;
    margin: 1rem;
    border-radius: 3px;
  }

  /* The loading Class */
  .loading {
    position: relative;
    background-color: #e2e2e2;
  }

  /* The moving element */
  .loading::after {
    display: block;
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    transform: translateX(-100%);
    background: -webkit-gradient(linear, left top,
        right top, from(transparent),
        color-stop(rgba(255, 255, 255, 0.2)),
        to(transparent));

    background: linear-gradient(90deg, transparent,
        rgba(255, 255, 255, 0.2), transparent);

    /* Adding animation */
    animation: loading 0.8s infinite;
  }

  /* Loading Animation */
  @keyframes loading {
    100% {
      transform: translateX(100%);
    }
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<!--END-->

<body>
  <div class="closebar"></div>
  <!-- Preloader-->
  <div class="preloader" id="preloader">
    <div class="spinner-grow text-secondary" role="status">
      <div class="sr-only">Loading...</div>
    </div>
  </div>
  <!-- Header Area-->
  <?php include '../components/agent-sidebar.php' ?>
  <!--END-->
  <div style="height: 60px;">

  </div>
  <div class="page-content-wrapper">
    <!-- Product Slides-->
    <div class="product-description pb-3">
      <!-- Product Title & Meta Data-->
      <div class="product-title-meta-data bg-white mb-3 py-3">
        <div class="container d-flex justify-content-between">
          <div class="p-title-price">
            <h6 class="mb-1 uname" style="padding-left: 5px;">Loading...</h6>
          </div>
          <div class="p-wishlist-share">
            <div class="user-profile" style="position: absolute;height: 100px;width: 85px;top: -40px;z-index: 10;">
              <div class="circleS">
                <span class="nameInitialUser"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- Ratings-->
        <div class="product-ratings">
          <div class="container d-flex align-items-center justify-content-between">
            <div class="ratings"><span class="pl-1">Recent: <span class="update">Loading..</span></span></div>
            <div class="total-result-of-ratings"><span></span><span>Active User</span></div>
          </div>
        </div>
      </div>
      <!-- Flash Sale Panel-->
      <div class="flash-sale-panel bg-white mb-3 py-3">
        <div class="container">
          <!-- Sales Offer Content-->
          <div class="sales-offer-content d-flex align-items-end justify-content-between">
            <!-- Sales End-->
            <div class="sales-end">
              <p class="mb-1 font-weight-bold"><i class="lni lni-bolt"></i> Lead Statistics</p>
              <!-- Please use event time this format: YYYY/MM/DD hh:mm:ss-->

            </div>
            <!-- Sales Volume-->
            <div class="sales-volume text-right">
              <p class="mb-1 font-weight-bold leadScore">Proccessing Score</p>
              <div class="progress" style="height: 6px;">
                <div class="progress-bar bg-warning lSpb" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="container">
          <ul class="list-group text-center">
            <li class="list-group-item">No Statistics Available</li>
          </ul>
        </div>
      </div>
      <div class="card-body">
        <!-- Tab panes -->
        <div class="tab-content text-center">
          <div class="tab-pane active" id="home" role="tabpanel">
            <div class="accordion afterActive" style="font-size: 20px;margin-top:-10px;" id="accordionExample">
            </div>
            <div class="accordion nodatas" style="font-size: 20px; border-radius:20px;" id="accordionExample"></div>
            <br>
          </div>
        </div>
      </div>
      <div class="flash-sale-panel bg-white mb-3 py-3">
        <div class="container">
          <!-- Sales Offer Content-->
          <div class="sales-offer-content d-flex align-items-end justify-content-between">
            <!-- Sales End-->
            <div class="sales-end">
              <p class="mb-1 font-weight-bold"><i class="fa fa-bell"></i> Reminder</p>
            </div>
            <!-- Sales Volume-->
          </div>
        </div>
        <br>
        <div class="container">
          <div class='col-12 py-3 mt-3 bg-white rounded'>
            <p class="text-center reminfoer">Loading ...</p>
            <p class="text-center minorrem"></p>
            <div id="accordion" class="reminderperlead">

            </div>
          </div>
          <div class="px-2 mx-2 py-2">
            <p class="text-danger text-center"></p>
            <center>
              <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#addRem" class="btn btn-primary">Add Reminder</button>
            </center>
          </div>
        </div>
      </div>
      <div class="flash-sale-panel bg-white mb-3 py-3">
        <div class="container">
          <!-- Sales Offer Content-->
          <div class="sales-offer-content d-flex align-items-end justify-content-between">
            <!-- Sales End-->
            <div class="sales-end">
              <p class="mb-1 font-weight-bold"><i class="fa fa-file"></i> Notes</p>
            </div>
            <!-- Sales Volume-->
          </div>
        </div>
        <br>
        <div class="container">
          <div class='col-12 py-3 mt-3 bg-white rounded'>
            <p class="text-center reminfoer">Loading ....</p>
            <div id="accordion" class="noteperlead">

            </div>
          </div>
          <div class="px-2 mx-2 py-2">
            <p class="text-danger text-center"></p>
            <center>
              <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#addNotes" class="btn btn-primary">Add Note</button>
            </center>
          </div>
        </div>
      </div>
      <!-- Add To Cart-->
      <div class="cart-form-wrapper bg-white mb-3 py-3">
        <div class="container">
          <center>
            <button class="btn btn-danger Chat">Loading ..</button>
            <button class="btn btn-danger Call">Loading ..</button>
          </center>
        </div>
      </div>
    </div>
  </div>
  <div class="py-2">
  </div>
  <!-- Footer Nav-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
  <?php include '../components/agentfooter.php' ?>
  <script src="source/js/user-profile.js"></script>
  <script src="source/js/agent-profiles.js"></script>
  <!-- END -->
</body>

</html>