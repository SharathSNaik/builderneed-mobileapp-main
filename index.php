<!DOCTYPE html>
<html lang="en">
<!--head and meta tags-->
<?php include 'components/headlogin.php' ?>
<!--End head and meta tags-->

<body>
    <!-- Preloader-->
    <div class="preloader" id="preloaders">
        <div class="spinner-grow text-secondary" role="status">
            <div class="sr-only">Loading...</div>
        </div>
    </div>
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center" style="overflow: hidden;">
        <!-- Background Shape-->
        <div class="background-shape"></div>
        <div class="background-shape"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5"><img class="big-logo" src="assets/img/core-img/logo-white.png" alt="">
                    <!-- Register Form-->
                    <div class="register-form mt-5 px-4">
                        <div>
                            <button class="btn btn-primary btn-lg w-100 loginbtn" style="border-radius: 50px; background:#0058FF;" type="button">LOGIN</button>
                        </div>
                        <br>
                        <!-- <div style="display: none;">
                            <button class="btn btn-primary btn-lg w-100 signupbtn" style="border-radius: 50px; background:#0058FF;" type="button">SIGN UP</button>
                        </div> -->
                        <form method="" autocomplete="off">
                            <div class="form-group text-left mb-4 loginuser">
                                <!-- <input class="email_id form-control" id="name" type="email" placeholder="Enter your email" autocomplete="off">
                                <p class="erremail text-secondary text-center py-2 font-weight-bold"></p> -->
                                <input class="loginOTP form-control" id="number" type="number" placeholder="Enter your Mobile Number" autocomplete="off" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                <p class="errorPhone text-danger text-center py-2 font-weight-bold"></p>
                                <div class="loader-otp">
                                    <button class="gotoOTP btn btn-primary btn-lg w-100" style="border-radius: 50px; background:#0058FF;" type="button">LOGIN WITH OTP</button>
                                    <!-- <p class="text-primary text-center py-2 font-weight-bold signuplogin">SIGN UP</p> -->
                                </div>
                            </div>
                            <!--SIGNUP-->
                            <div class="form-group text-left mb-4 signupuser">
                                <input class="login_namesign form-control" id="name" type="text" placeholder="Enter your name" autocomplete="off">
                                <p class="text-secondary text-center py-2 font-weight-bold"></p>
                                <input class="email_idsign form-control" id="name" type="email" placeholder="Enter your email" autocomplete="off">
                                <p class="erremails text-danger text-center py-2 font-weight-bold"></p>
                                <input class="loginOTPsign form-control" id="number" type="text" placeholder="Enter your Mobile Number" autocomplete="off" maxlength="10">
                                <p class="errorPhones text-danger text-center py-2 font-weight-bold"></p>
                                <div class="loaderSIGN">
                                    <button class="btn btn-primary btn-lg w-100 signupevent" style="border-radius: 50px; background:#0058FF;" type="button">SIGN UP</button>
                                    <p class="text-primary text-center py-2 font-weight-bold loginSIGNUP">LOG IN</p>
                                </div>
                            </div>
                            <center><a href="Agent/">Login as agent</a></center>
                        </form>
                    </div>
                    <!-- Login Meta-->
                    <!-- <div class="login-meta-data"><a class="forgot-password d-block mt-3 mb-1" href="">Forgot Password?</a>
                        <p class="mb-0">Didn't have an account?<a class="ml-1" href="signup.php">Register Now</a></p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- All JavaScript Files-->
    <?php include 'components/loginlinks.php' ?>
    <script src="http://builderneed-env.eba-twexh8nd.us-west-2.elasticbeanstalk.com/impjs/swal.js"></script>
    <script src="source/login.js"></script>
    <script>
        $('.loginbtn').click(function() {
            $('.gotoOTP').click();
        });
        var url_string = window.location;
        var url = new URL(url_string);
        var getPhone = url.searchParams.get("phone");
        $('.loginOTP').val(getPhone);
        if (window.location.toString().indexOf("phone") != -1) {
            setTimeout(() => {
                $('.loginbtn').click();
            }, 0100);
        }
    </script>
</body>

</html>