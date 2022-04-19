<?php
include_once '../access/connect.php';
session_start();
$phid = $_SESSION['phone'];
$queryloc = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone = '$phid'"));
$sid = $queryloc['project_id'];
$getll = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_project WHERE builder_id = '$sid'"));
?>
<!DOCTYPE html>
<html lang="en">
<!--head and meta tags-->
<title>Property Details - <?php echo $getll['project_name'];?></title>
<?php include '../components/head.php' ?>
<style>
    .carousel-control-next,
    .carousel-control-prev {
        top: 95%;
        position: relative;
        margin-left: 75px;
    }
    .lg-img-wrap{
        background:black;
    }
    body.modal-open {
        overflow-y: hidden;
        position: fixed;
    }

    .grid-container {
        display: grid;
        grid-template-columns: auto auto auto;
        grid-gap: 10px;
        padding: 10px;
    }
</style>
<link href="source/css/galery.css" rel="stylesheet">
<!--END-->

<body>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
        <div class="spinner-grow text-secondary" role="status">
            <div class="sr-only">Loading...</div>
        </div>
    </div>
    <!-- Header Area-->
    <?php include '../components/nav-sidebar.php' ?>
    <!--END-->
    <div class="page-content-wrapper">
        <div class="mt-5 py-4 container">
            <div class="single-hero-slide bg-secondary sliderremove" style="background-image: url(../assets/img/bg-img/loading.gif); border-radius: 10px 10px 0px 0px;"></div>
            <!-- SITE IMAGES -->
            <div class="hero-slides owl-carousel">
            </div>
        </div>
        <!--Tabs-->
        <div class="multiple-items">
            <div class="bg-white rounded py-2">
                <div class="container">
                    <div class="row">
                        <div class="col-3 text-left">
                            <h2><i class="fa fa-arrow-left"></i></h2>
                        </div>
                        <div class="col-6 text-center">
                            <h2>Location</h2>
                        </div>
                        <div class="col-3 text-right">
                            <h2><i class="fa fa-arrow-right"></i></h2>
                        </div>
                    </div>
                </div>
                <hr>
                <?php
                $op = "https://maps.google.com/maps?q=" . $getll['latitude'] . "," . $getll['longitude'] . "&hl=en&z=14&amp;output=embed";
                ?>
                <iframe src="<?php echo $op ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="bg-white rounded py-2">
                <div class="container">
                    <div class="row">
                        <div class="col-3 text-left">
                            <h2><i class="fa fa-arrow-left"></i></h2>
                        </div>
                        <div class="col-6 text-center">
                            <h2>Configuration</h2>
                        </div>
                        <div class="col-3 text-right">
                            <h2><i class="fa fa-arrow-right"></i></h2>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="accordion" id="accordionExample">
                    <div class="config"></div>

                </div>
            </div>
            <div class="bg-white rounded py-2">
                <div class="container">
                    <div class="row">
                        <div class="col-3 text-left">
                            <h2><i class="fa fa-arrow-left"></i></h2>
                        </div>
                        <div class="col-6 text-center">
                            <h2>Amenities</h2>
                        </div>
                        <div class="col-3 text-right">
                            <h2><i class="fa fa-arrow-right"></i></h2>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="accordion amen" id="accordionExamples">

                </div>
            </div>
            <div class="bg-white rounded py-2 ourfplan">
                <div class="container">
                    <div class="row">
                        <div class="col-3 text-left">
                            <h2><i class="fa fa-arrow-left"></i></h2>
                        </div>
                        <div class="col-6 text-center">
                            <h2>Floor Plans</h2>
                        </div>
                        <div class="col-3 text-right">
                            <h2><i class="fa fa-arrow-right"></i></h2>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="container">
                    <div class="row buttons getfloorplans">
                    </div>
                    <hr class="addhr">
                    <h3 class="data-title text-center"></h3>
                    <p class="fdesc text-dark" style="text-align: justify;">
                    </p>
                </div>
            </div>
            <div class="bg-white rounded py-2">
                <div class="container">
                    <div class="row">
                        <div class="col-3 text-left">
                            <h2><i class="fa fa-arrow-left"></i></h2>
                        </div>
                        <div class="col-6 text-center">
                            <h2>Developer</h2>
                        </div>
                        <div class="col-3 text-right">
                            <h2><i class="fa fa-arrow-right"></i></h2>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="container row no-gutters">
                    <div class="col-auto">
                        <img width="100" height="100" class="img-fluid" alt="">
                    </div>
                    <div class="col">
                        <div class="card-block px-2">
                            <h5 class="card-title"><span class="header_name"></span> :</h5>
                            <ul class="entry-content" style="list-style-type: square; color:black;">
                                <li> TOTAL PROJECTS : <strong><span class="text-success">8</span></strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="largeModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="margin-top: 6%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title tinfo text-center"></h5>
                    <button type="button" class="close datavalFid" onclick="closemymodal()" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="single-fpload bg-white" style="border-radius: 10px;padding-bottom:10px;">
                        <center>
                            <img src="../assets/img/loader.gif" class="shadow-1-strong" alt="" />
                        </center>
                    </div>

                    <div id="lightgallery" class="grid-container aniimated-thumbnials">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height:60px;">
    </div>
    <!-- Footer Nav-->
    <?php include '../components/footer.php' ?>
    <script src="source/js/property.js"></script>
    <script src="source/js/configandammenties.js"></script>
    <script src="source/js/floor-plan.js"></script>
    <script src="source/js/updateuseractivity.js"></script>
    <script src="source/js/galery.js"></script>
    <script src="source/js/zoom.js"></script>   
    <!-- END -->
</body>

</html>