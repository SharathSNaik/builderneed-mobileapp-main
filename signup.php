<!DOCTYPE html>
<html lang="en">
<!--head and meta tags-->
<?php include 'components/headlogin.php' ?>
<!--End head and meta tags-->

<body>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
        <div class="spinner-grow text-secondary" role="status">
            <div class="sr-only">Loading...</div>
        </div>
    </div>
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
        <!-- Background Shape-->
        <div class="background-shape"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5"><img class="big-logo" src="assets/img/core-img/logo-white.png" alt="">
                    <!-- Register Form-->
                    <div class="register-form mt-5 px-4">
                        <form method="" autocomplete="off">
                            <div class="form-group text-left mb-4">
                                <input class="form-control" id="number" type="text" placeholder="Enter your Name" autocomplete="off">
                            </div>
                            <div class="form-group text-left mb-4">
                                <input class="form-control" id="number" type="email" placeholder="Enter your Email ID" autocomplete="off">
                            </div>
                            <div class="form-group text-left mb-4">
                                <input class="form-control" id="number" type="password" placeholder="Enter the Password Number" autocomplete="off">
                            </div>
                            <div class="form-group text-left mb-4">
                                <input class="form-control" id="number" type="password" placeholder="Confirm your Password" autocomplete="off">
                            </div>
                            <div class=" py-2">
                                <button style="border-radius: 50px; background:#0058FF;" class="btn btn-primary btn-lg w-100" type="submit">SIGNUP</button>
                            </div>
                        </form>
                    </div>
                    <!-- Login Meta-->
                    <div class="login-meta-data">
                        <p class="mb-0">Already have an account?<a class="ml-1" href="login.php">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- All JavaScript Files-->
    <?php include 'components/loginlinks.php' ?>
</body>

</html>