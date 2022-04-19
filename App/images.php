<?php
include_once '../access/connect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<title>Live Tour</title>
<!--head and meta tags-->
<?php include '../components/head.php' ?>
<style>
    .containers {
        position: relative;
        text-align: center;
        color: white;
    }

    .slick-dots {
        bottom: -15px;
    }

    .slick-dots {
        text-align: center;
    }

    .slick-dots li {
        display: none;
        margin: 0 5px;
    }

    .slick-dots li.slick-active,
    .slick-dots li.slick-active+li,
    .slick-dots li.slick-active+li+li {
        display: inline-block;
    }

    .slick-dots li:nth-last-child(1),
    .slick-dots li:nth-last-child(2),
    .slick-dots li:nth-last-child(3) {
        display: inline-block;
    }

    .slick-dots li.slick-active~li:nth-last-child(1),
    .slick-dots li.slick-active~li:nth-last-child(2),
    .slick-dots li.slick-active~li:nth-last-child(3) {
        display: none;
    }

    .slick-dots li.slick-active+li+li:nth-last-child(3),
    .slick-dots li.slick-active+li+li:nth-last-child(2),
    .slick-dots li.slick-active+li+li:nth-last-child(1),
    .slick-dots li.slick-active+li:nth-last-child(3),
    .slick-dots li.slick-active+li:nth-last-child(2),
    .slick-dots li.slick-active+li:nth-last-child(1) {
        display: inline-block;
    }

    .video-container {
        position: relative;
        width: 100%;
        padding-bottom: 56.25%;
    }

    .video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }

    .centered {
        position: absolute;
        top: 80%;
        left: 50%;
        width: 100%;
        background: rgba(0, 0, 0, 0.5);
        word-break: break-word;
        transform: translate(-50%, -50%);
    }
</style>
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
    <div class="py-5">
    </div>
    <!-- Gallery -->
    <div class="container">
        <div class="single-loader bg-white" style="border-radius: 10px;padding-bottom:10px;">
            <center>
                <img src="../assets/img/loader.gif" class="shadow-1-strong" alt="" />
            </center>
        </div>
        <div class="single-items py-2">
        </div>
        <!-- <div class="row text-center py-2">
            <div class="col-4">
                <center>
                    <div style="background: white;height: 80px;width:80px;border-radius:50%;color:black;" data-toggle="tooltip" data-placement="top" title="Kitchen">
                        <i class="fa fa-cutlery" style="line-height:3;font-size:25px;"></i>
                    </div>
                </center>
            </div>
            <div class="col-4">
                <center>
                    <div style="background: white;height: 80px;width:80px;border-radius:50%;color:black;" data-toggle="tooltip" data-placement="top" title="Bedrooms">
                        <i class="fa fa-bed" style="line-height:3;font-size:25px;"></i>
                    </div>
                </center>
            </div>
            <div class="col-4">
                <center>
                    <div style="background: white;height: 80px;width:80px;border-radius:50%;color:black;" data-toggle="tooltip" data-placement="top" title="Painting">
                        <i class="fa fa-paint-brush" style="line-height:3;font-size:25px;"></i>
                    </div>
                </center>
            </div>
            <div class="col-4 py-4">
                <center>
                    <div style="background: white;height: 80px;width:80px;border-radius:50%;color:black;" data-toggle="tooltip" data-placement="top" title="Bathroom and toilets">
                        <i class="fa fa-bath" style="line-height:3;font-size:25px;"></i>
                    </div>
                </center>
            </div>
            <div class="col-4 py-4">
                <center>
                    <div style="background: white;height: 80px;width:80px;border-radius:50%;color:black;" data-toggle="tooltip" data-placement="top" title="Utilities">
                        <i class="fa fa-wrench" style="line-height:3;font-size:25px;"></i>
                    </div>
                </center>
            </div>
            <div class="col-4 py-4">
                <center>
                    <div style="background: white;height: 80px;width:80px;border-radius:50%;color:black;" data-toggle="tooltip" data-placement="top" title="Floor Plans">
                        <i class="fa fa-tasks" style="line-height:3;font-size:25px;"></i>
                    </div>
                </center>
            </div>
        </div> -->
        <div class="project4">
            <div class="row buttons">
                <div class="col-4">
                    <button type="button" class="btn btn-secondary btn-block imgUP" data-val="1" data-toggle="modal" data-target="#largeModal">BRASOV</button>
                </div>
                <div class="col-4">
                    <button type="button" class="btn btn-secondary btn-block imgUP" data-val="2" data-toggle="modal" data-target="#largeModal">COLOSSEUM</button>
                </div>
                <div class="col-4">
                    <button type="button" class="btn btn-secondary btn-block imgUP" data-val="3" data-toggle="modal" data-target="#largeModal">CRESCENDO</button>
                </div>
            </div>
            <div class="row buttons py-2">
                <div class="col-4">
                    <button type="button" class="btn btn-secondary btn-block imgUP" data-val="4" data-toggle="modal" data-target="#largeModal">EDINBURGH</button>
                </div>
                <div class="col-4">
                    <button type="button" class="btn btn-secondary btn-block imgUP" data-val="5" data-toggle="modal" data-target="#largeModal">GLAMIS</button>
                </div>
                <div class="col-4">
                    <button type="button" class="btn btn-secondary btn-block imgUP" data-val="6" data-toggle="modal" data-target="#largeModal">MAYFAIR</button>
                </div>
            </div>
        </div>
        <div class="container seccards" style="display: none;">
            <div class="row buttons">
                <div class="col-4">
                    <button type="button" data-val='1' class="infoconf btn btn-primary btn-block btn1" data-toggle="modal" data-target="#largeModal">CARDIFF</button>
                </div>
                <div class="col-4">
                    <button type="button" data-val='2' class="infoconf btn btn-primary btn-block btn2" data-toggle="modal" data-target="#largeModal">BRISTOL</button>
                </div>
                <div class="col-4">
                    <button type="button" data-val='3' class="infoconf btn btn-primary btn-block btn3" data-toggle="modal" data-target="#largeModal">SHEFFIELD</button>
                </div>
            </div>
            <div class="row buttons py-2">
                <div class="col-4">
                    <button type="button" data-val='4' class="infoconf btn btn-primary btn-block btn4" data-toggle="modal" data-target="#largeModal">WINDSOR</button>
                </div>
                <div class="col-4">
                    <button type="button" style="font-size: 12px;" data-val='5' class="infoconf btn btn-primary btn-block btn5" data-toggle="modal" data-target="#largeModal">NOTTINGHAM</button>
                </div>
            </div>
        </div>
        <div class="py-1"></div>
        <?php
        $phid = $_SESSION['phone'];
        $queryloc = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone = '$phid'"));
        $sid = $queryloc['project_id'];
        $querysv = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_project WHERE builder_id = '$sid'"));
        $sv = $querysv['site_video'];
        if ($sv != "" || $sv != NULL || $sv != null) { ?>
            <div class="video-container">
                <iframe class="video" src="<?php echo $sv; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        <?php } ?>
    </div>
    <div class="py-5">
    </div>
    <div class="container">
        <!-- modal -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="margin-top: 50%;">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="titleInfo text-center"></h3>
                        <hr>
                        <div class="single-loadergif bg-white" style="border-radius: 10px;padding-bottom:10px;">
                            <center>
                                <img src="../assets/img/loader.gif" class="shadow-1-strong" alt="" />
                            </center>
                        </div>
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner single-itemdata">

                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery -->
    <!-- Footer Nav-->
    <?php include '../components/footer.php' ?>
    <script src="source/js/user-profile.js"></script>
    <script src="source/js/site-image.js"></script>
    <script src="source/js/updateuseractivity.js"></script>
    <script>
        $(function() {
            $('#video').css({
                width: $(window).innerWidth() + 'px',
                height: $(window).innerHeight() + 'px'
            });

            $(window).resize(function() {
                $('#video').css({
                    width: $(window).innerWidth() + 'px',
                    height: $(window).innerHeight() + 'px'
                });
            });
        });
        activitites(5);
    </script>
    <!-- END -->
</body>

</html>