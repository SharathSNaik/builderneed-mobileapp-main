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
    <div class="py-3">
    </div>
    <div class="page-content-wrapper">
        <div class="container">
            <!-- Profile Wrapper-->
            <div class="profile-wrapper-area py-3">
                <!-- User Information-->
                <div class="card user-info-card">
                    <div class="card-body p-4 d-flex align-items-center">
                        <div class="user-profile mr-3"><img src="../assets/img/features/user-profile.png" alt=""></div>
                        <div class="user-info">
                            <h5 class="mb-0 usernameprofile">
                                <div class="spinner-grow text-primary" role="status" style="height: 10px;width: 10px;margin-right:10px;"><span class="sr-only">Loading...</span></div>
                                <div class="spinner-grow text-primary" role="status" style="height: 10px;width: 10px;margin-right:10px;"><span class="sr-only">Loading...</span></div>
                                <div class="spinner-grow text-primary" role="status" style="height: 10px;width: 10px;margin-right:10px;"><span class="sr-only">Loading...</span></div>
                                <div class="spinner-grow text-primary" role="status" style="height: 10px;width: 10px;margin-right:10px;"><span class="sr-only">Loading...</span></div>
                            </h5>
                        </div>
                    </div>
                </div>
                <!-- User Meta Data-->
                <div class="card user-data-card userLoaddata">
                    <div class="card-body">
                        <div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>Username</span></div>
                            <div class="data-content usernameprof">
                                <div class="spinner-grow text-primary" role="status" style="height: 10px;width: 10px;margin-right:10px;"><span class="sr-only">Loading...</span></div>
                                <div class="spinner-grow text-primary" role="status" style="height: 10px;width: 10px;margin-right:10px;"><span class="sr-only">Loading...</span></div>
                                <div class="spinner-grow text-primary" role="status" style="height: 10px;width: 10px;margin-right:10px;"><span class="sr-only">Loading...</span></div>
                                <div class="spinner-grow text-primary" role="status" style="height: 10px;width: 10px;margin-right:10px;"><span class="sr-only">Loading...</span></div>
                            </div>
                        </div>
                        <div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>Full Name</span></div>
                            <div class="data-content usernameprofile">
                                <div class="spinner-grow text-primary" role="status" style="height: 10px;width: 10px;margin-right:10px;"><span class="sr-only">Loading...</span></div>
                                <div class="spinner-grow text-primary" role="status" style="height: 10px;width: 10px;margin-right:10px;"><span class="sr-only">Loading...</span></div>
                                <div class="spinner-grow text-primary" role="status" style="height: 10px;width: 10px;margin-right:10px;"><span class="sr-only">Loading...</span></div>
                                <div class="spinner-grow text-primary" role="status" style="height: 10px;width: 10px;margin-right:10px;"><span class="sr-only">Loading...</span></div>
                            </div>
                        </div>
                        <div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i class="lni lni-phone"></i><span>Phone</span></div>
                            <div class="data-content userno">
                                <div class="spinner-grow text-primary" role="status" style="height: 10px;width: 10px;margin-right:10px;"><span class="sr-only">Loading...</span></div>
                                <div class="spinner-grow text-primary" role="status" style="height: 10px;width: 10px;margin-right:10px;"><span class="sr-only">Loading...</span></div>
                                <div class="spinner-grow text-primary" role="status" style="height: 10px;width: 10px;margin-right:10px;"><span class="sr-only">Loading...</span></div>
                                <div class="spinner-grow text-primary" role="status" style="height: 10px;width: 10px;margin-right:10px;"><span class="sr-only">Loading...</span></div>
                            </div>
                        </div>
                        <div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i class="lni lni-envelope"></i><span>Email</span></div>
                            <div class="data-content useremail">
                                <div class="spinner-grow text-primary" role="status" style="height: 10px;width: 10px;margin-right:10px;"><span class="sr-only">Loading...</span></div>
                                <div class="spinner-grow text-primary" role="status" style="height: 10px;width: 10px;margin-right:10px;"><span class="sr-only">Loading...</span></div>
                                <div class="spinner-grow text-primary" role="status" style="height: 10px;width: 10px;margin-right:10px;"><span class="sr-only">Loading...</span></div>
                                <div class="spinner-grow text-primary" role="status" style="height: 10px;width: 10px;margin-right:10px;"><span class="sr-only">Loading...</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="edit-profile-btn mt-3 container"><a class="btn btn-info w-100"><i class="lni lni-pencil mr-2"></i>Edit Profile</a></div>
                    <br>
                </div>
                <!-- Edit Profile-->
                <div class="card user-data-card editUserdata">
                    <div class="card-body">
                        <form action="" method="">
                            <div class="mb-3">
                                <div class="title mb-2"><i class="lni lni-user"></i><span>Username</span></div>
                                <input class="form-control usernameprof" type="text" value="Loading..." readonly>
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i class="lni lni-user"></i><span>Full Name</span></div>
                                <input class="form-control usernameprofile UserProf" type="text" value="Loading...">
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i class="lni lni-phone"></i><span>Phone</span></div>
                                <input class="form-control userno usernum" type="text" value="Loading...">
                                <p class="text-danger text-center errorPhone"></p>
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i class="lni lni-envelope"></i><span>Email</span></div>
                                <input class="form-control useremail userem" type="email" value="Loading...">
                                <p class="text-danger text-center errorMail"></p>
                            </div>
                            <button class="btn btn-success w-100 saveUserprofile" type="button">Save All Changes</button>

                            <button class="btn btn-danger w-100 Cancel_user" type="button" style="margin-top:10px;">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Nav-->
    <?php include '../components/agentfooter.php' ?>
    <script src="source/js/agent-profiles.js"></script>
    <!-- END -->
</body>

</html>