<?php include '../access/useraccesscontrol.php'; ?>
<!DOCTYPE html>
<html lang="en">
<!--head and meta tags-->
<title>Welcome - <?php echo $name['name']; ?> </title>
<?php include '../components/head.php' ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/brands.min.css" integrity="sha512-apX8rFN/KxJW8rniQbkvzrshQ3KvyEH+4szT3Sno5svdr6E/CP0QE862yEeLBMUnCqLko8QaugGkzvWS7uNfFQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
  :root {
    --main-color: #111;
    --loader-color: #fff;
    --back-color: #A5D6A7;
    --time: 3s;
    --size: 3px;
  }


  .loader-line {
    width: 100%;
    height: 100%;
    top: 10;
    padding: 10px 10px 10px 10px;
    left: 0;
    position: absolute;
    align-content: center;
    justify-content: flex-start;
    z-index: 100000;
  }

  .loader__element {
    height: var(--size);
    width: 100%;
    background: var(--back-color);

  }

  .loader__element:before {
    content: '';
    display: block;
    background-color: var(--loader-color);
    height: var(--size);
    width: 0;
    animation: getWidth var(--time) ease-in infinite;
  }

  @keyframes getWidth {
    100% {
      width: 100%;
    }
  }
</style>
<!--END-->

<body>
  <!-- Preloader-->
  <div class="preloader" id="preloaders">
    <div class="spinner-grow text-secondary" role="status">
      <div class="sr-only">Loading...</div>
    </div>
  </div>
  <!-- Header Area-->
  <?php include '../components/nav-sidebar.php' ?>
  <!--END-->
  <div class="py-2">
  </div>
  <div class="page-content-wrapper py-4">
    <!-- Upcoming-->
    <div class="cta-area">
      <div class="container">

        <!-- <div class="loader-line">
          <div class="loader__element"></div>
        </div>
        <center>
          <h3 class="text-dark text-uppercase mb-0"><span class="text-uppercase px-1 header_name"></span></h3>
        </center> -->

        <div class="single-hero-slide mb-5 bg-secondary sliderremove" style="background-image: url(../assets/img/bg-img/loading.gif); border-radius: 10px 10px 0px 0px;"></div>
        <!-- SITE IMAGES -->
        <div class="hero-slides owl-carousel">
        </div>
        <br>
        <div class="cta-text p-3 bg-dark" onclick="(window.location='summary.php')" ;>
          <div class="c100  p0 small">
            <span class="percent" style="color:black">0%</span>
            <div class="slice">
              <div class="bar"></div>
              <div class="fill"></div>
            </div>
          </div>
          <div style="margin-left:100px;border-left: 5px solid white;border-width: thin;padding-left: 5px;">
            <h4>Scheduled events</h4>
            <span class="text-white get_event">Loading ...</span>
            <br>
            <span class="text-white get_datetime"></span>
            <br>
          </div>
        </div>
      </div>
    </div>
    <!-- Discount Coupon Card-->
    <div class="container d-none">
      <div class="card discount-coupon-card border-0">
        <div class="card-body">
          <div class="coupon-text-wrap d-flex align-items-center">
            <h5 class="text-white pr-2 mb-0">Get 5% Off</h5>
            <p class="text-white pl-4 mb-0">Avail YUGADI offer on booking</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Product Catagories-->
    <div class="product-catagories-wrapper py-3">
      <div class="container">
        <!-- <div class="section-heading">
          <h6 class="ml-1">Product Category</h6>
        </div> -->
        <div class="product-catagory-wrap">
          <div class="row g-3">
            <!-- Single Catagory Card-->
            <div class="col-4">
              <div class="card catagory-card">
                <div class="card-body" onclick="loadme()"><a class="project"><i style="font-size: 50px;" class="lni lni-apartment"></i>
                    <span style="font-size: 14  px;padding-top:6px">Property</span></a></div>
              </div>
            </div>
            <!-- Single Catagory Card-->
            <div class="col-4">
              <div class="card catagory-card">
                <div class="card-body" onclick="loadme()"><a href="images.php"><i style="font-size: 50px;" class="lni lni-image"></i>
                    <span style="font-size: 14px;padding-top:6px">Site Tour</span></a></div>
              </div>
            </div>
            <!-- Single Catagory Card-->
            <div class="col-4">
              <div class="card catagory-card">
                <div class="card-body" onclick="loadme()"><a href="nearby.php"><i style="font-size: 50px;" class="lni lni-map"></i>
                    <span style="font-size: 14px;padding-top:6px">Nearby</span></a></div>
              </div>
            </div>
            <!-- Single Catagory Card-->
            <div class="col-4">
              <div class="card catagory-card">
                <div class="card-body" onclick="loadme()"><a href="schedule.php"><i style="font-size: 50px;" class="lni lni-alarm-clock"></i>
                    <span style="font-size: 14px;padding-top:6px">Site Visits</span></a></div>
              </div>
            </div>
            <!-- Single Catagory Card-->
            <div class="col-4">
              <div class="card catagory-card">
                <div class="card-body" onclick="loadme()"><a href="documents.php"><i style="font-size: 50px;" class="far fa-file-alt"></i>
                    <span style="font-size: 14px;padding-top:6px">Document</span></a></div>
              </div>
            </div>
            <!-- Single Catagory Card-->
            <div class="col-4" data-toggle="modal" data-target="#exampleModal">
              <div class="card catagory-card">
                <div class="card-body" onclick="loadme()"><a><i style="font-size: 50px;" class="lni lni-layers"></i>
                    <span style="font-size: 14px;padding-top:6px">Extra</span></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal for Lead Scoring -->
  <div class="modal fade" id="exampleModal" tabindex="-1" style="margin-top: 50px;" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            <i class="text-dark fa fa-comments"></i>
            Your Feedback Matters
          </h5>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        </div>
        <div class="modal-body ">
          <div id="carouselExampleSlidesOnly" class="carousel"  data-interval="false">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="q1" style="width:100%">
                  <div class="text-dark"><b>1. Please Enter your Age ?</b></div>
                  <br>
                  <div class="container">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                      <label class="form-check-label" for="defaultCheck1">
                        20 - 24
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck12">
                      <label class="form-check-label" for="defaultCheck12">
                        25 - 30
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck13">
                      <label class="form-check-label" for="defaultCheck13">
                        31 - 35
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck14">
                      <label class="form-check-label" for="defaultCheck14">
                        36 - 40
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck15">
                      <label class="form-check-label" for="defaultCheck15">
                        40 - 45
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck16">
                      <label class="form-check-label" for="defaultCheck16">
                        46 - 50
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck16">
                      <label class="form-check-label" for="defaultCheck16">
                        51 - 60
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="q1" style="width:100%">
                  <div class="text-dark"><b>2. 1st time buyer ?</b></div>
                  <br>
                  <div class="container">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="default1">
                      <label class="form-check-label" for="default1">
                        Yes
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="default2">
                      <label class="form-check-label" for="default2">
                        No
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="q2" style="width:100%">
                  <div class="text-dark"><b>3. Prefered Location ?</b></div>
                  <br>
                  <div class="form-check">
                    <input class="form-control" type="text" placeholder="Enter location" />
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="q3" style="width:100%">
                  <div class="text-dark"><b>4. Budget Range?</b></div>
                  <br>
                  <div class="container">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="def1">
                      <label class="form-check-label" for="def1">
                        45,00,000 - 50,00,000
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="def2">
                      <label class="form-check-label" for="def2">
                        50,00,000 - 60,00,000
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="def3">
                      <label class="form-check-label" for="def3">
                        60,00,000 - 70,00,000
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="def4">
                      <label class="form-check-label" for="def4">
                        70,00,000 - 80,00,000
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="def5">
                      <label class="form-check-label" for="def5">
                        80,00,000 - 90,00,000
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="q3" style="width:100%">
                  <div class="text-dark"><b>5. Unit Size?</b></div>
                  <br>
                  <div class="container">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defa1">
                      <label class="form-check-label" for="defa1">
                        1 RK
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defa2">
                      <label class="form-check-label" for="def2">
                        1 BHK
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defa3">
                      <label class="form-check-label" for="defa3">
                        1.5 BHK
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defa4">
                      <label class="form-check-label" for="defa4">
                        2 BHK
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defa5">
                      <label class="form-check-label" for="defa5">
                        2.5 BHK
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defa6">
                      <label class="form-check-label" for="defa6">
                        3 BHK
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="q2" style="width:100%">
                  <div class="text-dark"><b>6. Move in ?</b></div>
                  <br>
                  <div class="container">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defaa1">
                      <label class="form-check-label" for="defaa1">
                        Ready to Move in 6 months ?
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defaa2">
                      <label class="form-check-label" for="defaa2">
                        After 6 months ?
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="q2" style="width:100%">
                  <div class="text-dark"><b>7. Employment?</b></div>
                  <br>
                  <div class="container">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defaaa1">
                      <label class="form-check-label" for="defaaa1">
                        Salaried
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defaaa2">
                      <label class="form-check-label" for="defaaa2">
                        Self Employed
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="q2" style="width:100%">
                  <div class="text-dark"><b>8. Maritial Status?</b></div>
                  <br>
                  <div class="container">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defaaaa1">
                      <label class="form-check-label" for="defaaaa1">
                        Single
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defaaa2">
                      <label class="form-check-label" for="defaaaa2">
                        Married
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="q2" style="width:100%">
                  <div class="text-dark"><b>9. Previous Buyer?</b></div>
                  <br>
                  <div class="container">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="yes1">
                      <label class="form-check-label" for="yes1">
                        Yes
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="yes2">
                      <label class="form-check-label" for="yes2">
                        No
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="q2" style="width:100%">
                  <div class="text-dark"><b>10. Salary Range?</b></div>
                  <br>
                  <div class="container">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="sal1">
                      <label class="form-check-label" for="sal1">
                      7 - 12 Lakhs
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="sal2">
                      <label class="form-check-label" for="sal2">
                      12 - 15 Lakhs
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="sal3">
                      <label class="form-check-label" for="sal3">
                      15 - 18 Lakhs
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="sal4">
                      <label class="form-check-label" for="sal4">
                      18 - 23 Lakhs
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="sal5">
                      <label class="form-check-label" for="sal5">
                      23 Lakhs and Above
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="container">
              <div class="row">
                <div class="col-4">
                  <center>
                    <a class="btn btn-primary" href="#carouselExampleSlidesOnly" role="button" data-slide="prev">
                      <i class="fa fa-arrow-left"></i> Prev
                    </a>
                  </center>
                </div>
                <div class="col-4">
                  <center>
                    <a class="btn btn-success">
                      Submit
                    </a>
                  </center>
                </div>
                <div class="col-4">
                  <center>
                    <a class="btn btn-primary" href="#carouselExampleSlidesOnly" role="button" data-slide="next">
                      Next <i class="fa fa-arrow-right"></i>
                    </a>
                  </center>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal for Lead Scoring -->
  <!-- Footer Nav-->
  <?php include '../components/footer.php' ?>
  <!-- END -->
  <script>
    if (window.location.toString().indexOf("tokendata") != -1) {
      var urltoken = window.location;
      var tokenurl = new URL(urltoken);
      var tokendata = tokenurl.searchParams.get("tokendata");
      // alert(tokendata);
    }
  </script>
</body>

</html>