<!DOCTYPE html>
<html lang="en">
<!--head and meta tags-->
<?php include '../components/agenthead.php' ?>
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
                <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5"><img class="big-logo" src="../assets/img/core-img/logo-white.png" alt="">
                    <!-- Register Form-->
                    <div class="register-form mt-5 px-4">
                        <form method="" autocomplete="off">
                            <div class="form-group text-left mb-4 loginuser">
                                <!-- <input class="email_id form-control" id="name" type="email" placeholder="Enter your email" autocomplete="off">
                                <p class="erremail text-secondary text-center py-2 font-weight-bold"></p> -->
                                <input class="number form-control" id="number" type="number" placeholder="Enter your Mobile Number" autocomplete="off" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                <input class="pass mt-2 mb-2 form-control" type="password" placeholder="Enter your Password" autocomplete="off">
                                <p class="errorPhone text-danger text-center font-weight-bold"></p>
                                <div class="loader-otp text-center">
                                    <button class="gotopass btn btn-primary btn-lg w-100 mb-2" style="border-radius: 50px; background:#0058FF;" type="button">LOGIN</button>
                                    <a href="index.php" class="text-primary loo mt-2 font-weight-bold text-center">Login with OTP</i></a>
                                </div>
                            </div>
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
    <?php include '../components/agentlinks.php' ?>
    <script src="http://builderneed-env.eba-twexh8nd.us-west-2.elasticbeanstalk.com/impjs/swal.js"></script>
    <script src="main/source/pass.js"></script>

</body>

</html>