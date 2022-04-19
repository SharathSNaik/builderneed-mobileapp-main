<!-- Internet Connection Status-->
</main>
<a class="float" data-toggle="tooltip" data-placement="top" title="Talk To Agent!">
    <i class="lni lni-whatsapp text-success my-float"></i>
</a>
<div class="internet-connection-status" id="internetStatus"></div>
<div class="footer-nav-area" id="footerNav">
    <div class="container h-100 px-0">
        <div class="builderneed-footer-nav h-100">
            <ul class="h-100 d-flex align-items-center justify-content-between pl-0" style="list-style-type:none;">
                <li class="footer-sys of" onclick="loadme()"><a href="home.php" style="font-size: 15px;"><i class="lni lni-home" style="font-size: 25px;"></i>Home</a></li>
                <li class="footer-sys tf" onclick="loadme()"><a href="images.php" style="font-size: 15px;"><i class="fa fa-picture-o" style="font-size: 25px;"></i>Images</a></li>
                <li class="footer-sys trf" onclick="loadme()"><a href="history.php" style="font-size: 15px;"><i class="fa fa-history" style="font-size: 25px;"></i>History</a></li>
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
<script src="source/js/property-details.js"></script>
<script src="source/js/lander.js"></script>
<script src="source/js/user-profile.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<!--<script src="../assets/js/pwa.js"></script>-->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BDR3K31NCT"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pulltorefreshjs/0.1.14/pulltorefresh.min.js'></script>
<script src='https://unpkg.com/hammer-touchemulator@0.0.2/touch-emulator.js'></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-BDR3K31NCT');
</script>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    if (window.location.toString().indexOf("lisa") != -1) {
        $('.float').hide();
    } else {
        $('.float').show();
    }
    if (window.location.toString().indexOf("home") != -1) {
        $('.of').addClass('active');
    } else if (window.location.toString().indexOf("images") != -1) {
        $('.tf').addClass('active');
    } else if (window.location.toString().indexOf("history") != -1) {
        $('.trf').addClass('active');
    } else {
        $('.of').removeClass('active');
        $('.tf').removeClass('active');
        $('.trf').removeClass('active');
    }

    function loadme() {
        var i = 0;
        (function looper() {
            if (i++ < 100) {
                $('.loaderData').attr("style", "width:" + i + "%");
                setTimeout(looper, 0100);
            }
        })();
    }
    //Loading
    $('a').click(function() {
        navigator.vibrate = navigator.vibrate ||
            navigator.webkitVibrate ||
            navigator.mozVibrate ||
            navigator.msVibrate;

        if (navigator.vibrate) {
            // alert('vibration supported');
            navigator.vibrate(020);
        } else {
            // alert('vibration not supported');
        }
    });
    $('#preloader').hide();
    PullToRefresh.init({
        mainElement: 'main',
        onRefresh: function() {
            loadme();
            navigator.vibrate = navigator.vibrate ||
                navigator.webkitVibrate ||
                navigator.mozVibrate ||
                navigator.msVibrate;

            if (navigator.vibrate) {
                // alert('vibration supported');
                navigator.vibrate(010);
            } else {
                // alert('vibration not supported');
            }
            location.reload();
        }
    });
    TouchEmulator();
</script>