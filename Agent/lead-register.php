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
    <?php include '../components/agent-sidebar.php' ?>
    <!--END-->
    <div class="page-content-wrapper py-4">
        <div class="container">
            <div class="profile-wrapper-area py-3">
                <!-- User Information-->
                <div class="card user-info-card">
                    <div class="card-body text-center">
                        <h5 class="mb-0">Lead Registration</h5>
                    </div>
                </div>
                <div class="card user-data-card">
                    <div class="card-body">
                        <form action="" method="">
                            <div class="mb-3">
                                <div class="title mb-2"><i class="lni lni-user"></i><span>Full Name</span></div>
                                <input class="form-control registerName" type="text" placeholder="Enter Full Name" />
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i class="lni lni-phone"></i><span>Phone</span></div>
                                <input class="form-control registerPhone" type="text" placeholder="Enter Phone Number" maxlength="10" />
                                <p class="text-danger text-center errorPhone"></p>
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i class="lni lni-envelope"></i><span>Email</span></div>
                                <input class="form-control registerEmail" type="email" value="leads@7thheaven.com" placeholder="Enter Email ID" />
                                <p class="text-danger text-center errorMail"></p>
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i class="fa fa-building-o"></i><span>Project</span></div>
                                <input readonly class="form-control viewproj" placeholder="Loading.." />
                                <input class="form-control registerSource" type="hidden" />
                            </div>
                            <button class="btn btn-success w-100 submitRegister" type="button">REGISTER</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Nav-->
    <?php include '../components/agentfooter.php' ?>
    <script src="source/js/register-lead.js"></script>
    <script src="source/js/agent-lander.js"></script>
    <script src="source/js/agent-profiles.js"></script>
    <!-- END -->
</body>

</html>