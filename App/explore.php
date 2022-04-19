<!DOCTYPE html>
<html lang="en">
<!--head and meta tags-->
<title>Explore</title>
<?php include '../components/head.php' ?>
<link rel="stylesheet" href="../assets/widgets.css">
<link rel="stylesheet" href="../assets/grid.css">
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
    <div class="py-2">
    </div>
    <div class="page-content-wrapper py-5">
        <!-- <div class="container">
            <div class="row">
                <div class="col-xl-3 mb-50">
                    <div class="bg-white box-shadow border-radius-10 height-100-p widget-style3">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="widget-data">
                                <div class="weight-500 font-24 font-weight-bold text-dark">Units comparison</div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon"><i class="fa fa-exchange" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-50">
                    <div class="bg-white box-shadow border-radius-10 height-100-p widget-style3">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="widget-data">
                                <div class="weight-500 font-24 font-weight-bold text-dark">Carpet area efficiency</div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon"><i class="fa fa-line-chart" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-50">
                    <div class="bg-white box-shadow border-radius-10 height-100-p widget-style3">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="widget-data">
                                <div class="weight-500 font-24 font-weight-bold text-dark">Loan calculator</div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon"><i class="fa fa-calculator" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-50">
                    <div class="bg-white box-shadow border-radius-10 height-100-p widget-style3">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="widget-data">
                                <div class="weight-500 font-24 font-weight-bold text-dark">Site visit cancellations and modifications</div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon"><i class="fa fa-history" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-50">
                    <div class="bg-white box-shadow border-radius-10 height-100-p widget-style3">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="widget-data">
                                <div class="weight-500 font-24 font-weight-bold text-dark">Previous site visits</div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon"><i class="fa fa-history" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-50">
                    <div class="bg-white box-shadow border-radius-10 height-100-p widget-style3">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="widget-data">
                                <div class="weight-500 font-24 font-weight-bold text-dark">Site visit conversations</div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon"><i class="fa fa-history" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="main_content">
            <div class="items">
                <a href="">
                    <div class="item">
                        <object width="100%" height="80%" type="image/svg+xml" style="padding:10px;pointer-events:none;
                    " data="images/bct199.svg"></object>
                        <div>Units comparison</div>
                    </div>
                </a>
                <a href="">
                    <div class="item">
                        <object width="100%" height="80%" type="image/svg+xml" style="padding:10px;pointer-events:none;
                    " data="images/bct200.svg"></object>
                        <div>Carpet area efficiency</div>
                    </div>
                </a>
                <a href="">
                    <div class="item">
                        <object width="100%" height="80%" type="image/svg+xml" style="padding:10px;pointer-events:none;
                    " data="images/bct201.svg"></object>
                        <div>Loan calculator</div>
                    </div>
                </a>
                <a href="summary.php">
                    <div class="item">
                        <object width="100%" height="80%" type="image/svg+xml" style="padding:10px;pointer-events:none;
                    " data="images/bct202.svg"></object>
                        <div>Site visit cancellations and modifications</div>
                    </div>
                </a>
                <a href="summary.php">
                    <div class="item">
                        <object width="100%" height="80%" type="image/svg+xml" style="padding:10px;pointer-events:none;
                    " data="images/bct203.svg"></object>
                        <div>Previous site visits</div>
                    </div>
                </a>
                <a href="summary.php">
                    <div class="item">
                        <object width="100%" height="80%" type="image/svg+xml" style="padding:10px;pointer-events:none;
                    " data="images/bct204.svg"></object>
                        <div>Site visit conversations</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Footer Nav-->
    <?php include '../components/footer.php' ?>
    <script src="source/js/updateuseractivity.js"></script>
    <script>
        activitites(7);
    </script>
    <!-- END -->
</body>

</html>