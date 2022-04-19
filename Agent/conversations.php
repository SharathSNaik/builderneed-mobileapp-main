<!DOCTYPE html>
<html lang="en">
<!--head and meta tags-->
<?php include '../components/head.php' ?>
<style>
    .typeahead {
        width: 100%;
    }

    .dropdown-menu {
        width: 89%;
    }

    input.typeahead {
        /* This is optional */
        width: 100% !important;
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
                        <div class="user-info">
                            <h5 class="mb-0"><i class="fa fa-comments"></i> Conversations</h5>
                        </div>
                    </div>
                </div>
                <!-- User Meta Data-->
                <div class="card user-data-card">
                    <div class="card-body">
                        <form action="" method="">
                            <input class="form-control" type="hidden">
                            <div class="mb-3">
                                <div class="title mb-2"><i class="lni lni-user"></i><span>Buyer Name</span></div>
                                <input readonly class="form-control conbuyname" type="text" placeholder="Enter Name">
                                <input readonly class="form-control lid" type="hidden">
                                <input readonly class="form-control pid" type="hidden">
                                <input readonly class="form-control vid" type="hidden">
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i class="fa fa-building"></i><span>Unit Number</span></div>
                                <input class="form-control typeahead cid uid help" type="text" placeholder="Click or type here for unit number">
                            </div>
                            <div class="datatoconv">
                                <div class="mb-3">
                                    <div class="title mb-2"><i class="fa fa-cog"></i><span>Configuration</span></div>
                                    <input class="form-control cname " type="text" readonly>

                                </div>
                                <div class="mb-3">
                                    <div class="title mb-2"><i class="fa fa-inr"></i><span>Actual Price</span></div>
                                    <input class="form-control aprice" type="text" readonly>
                                </div>
                                <div class="mb-3">
                                    <div class="title mb-2"><i class="fa fa-inr"></i><span>Offering Price</span></div>
                                    <input class="form-control oprice help" type="text" placeholder="Enter Offering Price">
                                </div>
                                <div class="mb-3">
                                    <div class="title mb-2"><i class="fa fa-inr"></i><span>Maintainance Fee</span></div>
                                    <input class="form-control mfee" type="text" placeholder="Enter maintainance Fee" readonly>

                                </div>
                                <div class="mb-3">
                                    <div class="title mb-2"><i class="fa fa-inr"></i><span>Payment Plan</span></div>
                                    <input class="form-control pplan help" type="text" placeholder="Enter Payment Plan">

                                </div>
                                <div class="mb-3">
                                    <div class="title mb-2"><i class="fa fa-ticket"></i><span>Modification Ticket</span></div>
                                    <input class="form-control mticket help" type="text" placeholder="Enter Modification ticket">
                                </div>
                                <div class="mb-3">
                                    <div class="title mb-2"><i class="fa fa-cog"></i><span>UDS</span></div>
                                    <input class="form-control uds" type="text" placeholder="Enter UDS" readonly>
                                </div>
                                <button class="btn btn-success w-100 edit" type="button">Edit</button>
                                <button class="btn btn-success w-100 sv_conv" type="button">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-3">
    </div>
    <!-- Footer Nav-->
    <?php include '../components/agentfooter.php' ?>
    <script src="source/js/agent-profiles.js"></script>
    <script src="source/js/conversation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <!-- END -->
</body>

</html>