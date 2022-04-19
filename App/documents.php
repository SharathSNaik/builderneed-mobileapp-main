<!DOCTYPE html>
<html lang="en">
<!--head and meta tags-->
<title>Documents</title>
<?php include '../components/head.php' ?>
<link rel="stylesheet" href="../assets/widgets.css">
<style>
    ::-webkit-scrollbar {
        display: none;
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
    <div class="py-2">
    </div>
    <div class="page-content-wrapper py-5 fordlf">
        <div class="container">
            <div class="row">
                <div class="col-12 zoom">
                    <img src="1.jpeg" />
                </div>
                <br>
                <div class="col-12 zoom mt-5">
                    <img src="1.jpeg" />
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Nav-->
    <?php include '../components/footer.php' ?>
    <script src="source/js/updateuseractivity.js"></script>
    <script src="source/js/pinchzoom.js"></script>
    <script>
        zoom();
    </script>
    <!-- END -->
</body>

</html>