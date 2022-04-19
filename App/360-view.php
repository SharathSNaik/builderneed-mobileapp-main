<!DOCTYPE html>
<html lang="en">
<!--head and meta tags-->
<?php include '../components/head.php' ?>
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
        <iframe src="https://tour.metareal.com/apps/player?asset=8bf648cd-cc7c-4273-9a3d-a3f71f083e2e&position=-0.44x1.60y8.03z&rotation=51.51x-61.16y0.00z" allow=""></iframe>
    </div>
    <!-- Gallery -->
    <!-- Footer Nav-->
    <?php include '../components/footer.php' ?>
    <script>
        setTimeout(() => {
            $('#player-play').click();
        }, 5000);
        $('#player-play').click(function() {
            alert("help");
        });
    </script>
    <!-- END -->
</body>

</html>