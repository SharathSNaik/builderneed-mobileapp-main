<!-- Internet Connection Status-->
<!-- <a href="lisa.php" class="float" data-toggle="tooltip" data-placement="top" title="LISA!">
    <i class="fa fa-whatsapp text-success my-float"></i>
</a> -->
<div class="internet-connection-status" id="internetStatus"></div>
<div class="footer-nav-area" id="footerNav">
    <div class="container h-100 px-0">
        <div class="builderneed-footer-nav h-100">
            <ul class="h-100 d-flex align-items-center justify-content-between pl-0" style="list-style-type:none;">
                <li class="active"><a href="home.php" style="font-size: 15px;"><i class="lni lni-home" style="font-size: 25px;"></i>Home</a></li>
                <li class="footer-sys"><a href="explore.php" style="font-size: 15px;"><i class="fa fa-search" style="font-size: 25px;"></i>Explore</a></li>
                <li class="footer-sys"><a href="lisa.php" style="font-size: 15px;"><i class="fa fa-history" style="font-size: 25px;"></i>History</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- All JavaScript Files-->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/waypoints.min.js"></script>
<script src="../assets/js/jquery.easing.min.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/jquery.counterup.min.js"></script>
<script src="../assets/js/jquery.countdown.min.js"></script>
<script src="../assets/js/default/jquery.passwordstrength.js"></script>
<script src="../assets/js/wow.min.js"></script>
<script src="../assets/js/jarallax.min.js"></script>
<script src="../assets/js/jarallax-video.min.js"></script>
<script src="../assets/js/default/dark-mode-switch.js"></script>
<script src="../assets/js/default/no-internet.js"></script>
<script src="../assets/js/default/active.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<!--<script src="../assets/js/pwa.js"></script>-->
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    if (window.location.toString().indexOf("lisa") != -1) {
        $('.float').hide();
    } else {
        $('.float').show();
    }
</script>