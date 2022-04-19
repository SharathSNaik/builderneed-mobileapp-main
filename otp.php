<!DOCTYPE html>
<html lang="en">
<!--head and meta tags-->
<?php include 'components/headlogin.php' ?>
<style>
    .bellno {
        animation: shake 0.5s;
        animation-iteration-count: infinite;
    }

    @keyframes shake {

        10%,
        90% {
            transform: translate3d(-1px, 0, 0);
        }

        20%,
        80% {
            transform: translate3d(2px, 0, 0);
        }

        30%,
        50%,
        70% {
            transform: translate3d(-2px, 0, 0);
        }

        40%,
        60% {
            transform: translate3d(1px, 0, 0);
        }
    }
</style>
<!--End head and meta tags-->

<body>
    <!-- Preloader-->
    <div class="preloader" id="preloaders">
        <div class="spinner-grow text-secondary" role="status">
            <div class="sr-only">Loading...</div>
        </div>
    </div>
    <!-- Login Wrapper Area-->

    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">

        <div class="container">
            <div class="row justify-content-center" style="margin-top: -200px">
                <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
                    <div class="text-left px-4">
                        <h2 class="mb-1 text-black">Welcome</h2>
                        <p class="mb-4 text-black">Enter the 4-digit code just sent to<strong class="text-primary ml-1 usPhone"></strong></p>
                    </div>
                    <!-- OTP Verify Form-->
                    <div class="otp-verify-form mt-5 px-4">
                        <form>
                            <div class="d-flex justify-content-between mb-5 addError">
                                <input class="form-control oneOTP inputs" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" placeholder="-" maxlength="1">
                                <input class="form-control two inputs" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" placeholder="-" maxlength="1">
                                <input class="form-control three inputs" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" placeholder="-" maxlength="1">
                                <input class="form-control four inputs" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" placeholder="-" maxlength="1">
                            </div>
                            <span class="text-center anjanotp"></span>
                            <div class="rediecturl">
                                <button class="confirmOTP btn btn-lg text-white w-100" type="button">Verify &amp; Proceed</button>
                            </div>
                        </form>
                    </div>
                    <!-- Term & Privacy Info-->
                    <div class="login-meta-data px-4">
                        <p class="mt-3 mb-0">Didn’t receive the code?<span class="ml-1 text-primary"><a class="getphone">Try Again</a></span></p>
                    </div>
                    <div class="status-otp"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- All JavaScript Files-->
    <?php include 'components/loginlinks.php' ?>
    <script src="source/login.js"></script>
    <script>
        var url_string = window.location;
        var url = new URL(url_string);
        var getPhone = url.searchParams.get("phone");
        $('.getphone').attr("href", "index.php?phone=" + getPhone);
        $('.inputs').keypress(function(e) {
            if ('0123456789'.indexOf(e.key) == -1) {
                e.preventDefault();
            }
        });
    </script>
</body>

</html>