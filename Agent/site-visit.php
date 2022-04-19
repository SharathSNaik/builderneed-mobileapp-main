<!DOCTYPE html>
<html lang="en">
<!--head and meta tags-->
<?php include '../components/head.php' ?>
<link rel="stylesheet" href="../assets/widgets.css">
<style>
    .btnpos {
        position: absolute;
        margin-top: -12%;
        margin-left: 70%;
        height: 49px;
        width: 50px;
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
    <?php include '../components/agent-sidebar.php' ?>
    <!--END-->
    <div class="page-content-wrapper py-5">
        <div class="container">
            <div class="bg-primary rounded text-center text-white font-weight-bold py-2">
                <div class="row">
                    <div class="col-6 upcoming"><span class="text-center">UPCOMING</span></div>
                    <div class="col-6 all"><span class="text-center">ALL</span></div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 mb-50 get_summary">

                </div>
                <div class="accordion nodataSchedule" style="font-size: 20px; border-radius:20px;" id="accordionExample">
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Nav-->
    <?php include '../components/agentfooter.php' ?>
    <script src="source/js/scheduled-summary.js"></script>
    <script src="source/js/agent-profiles.js"></script>
    <!-- END -->
</body>

</html>