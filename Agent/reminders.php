<!DOCTYPE html>
<html lang="en">
<!--head and meta tags-->
<?php include '../components/head.php' ?>
<link rel="stylesheet" href="../assets/widgets.css">

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
    <div style="margin-top: 80px;"></div>
    <div class="page-content-wrapper" style="margin-top:-10px;">
        <div class="container">
            <div class="btn-group float-right dropleft">
                <button class="btn btn-secondary btn-sm" type="button">
                    <i class="fa fa-filter"></i>
                </button>
                <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item upcoming" href="#">Upcoming </a>
                    <a class="dropdown-item completed" href="#">Completed</a>
                    <a class="dropdown-item all" href="#">All</a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-50 get_reminder">

                </div>
            </div>
            <div class="accordion nodatas" style="font-size: 20px; border-radius:20px;" id="accordionExample">
            </div>
        </div>
    </div>
    <a href="view-leads.php" class="float" data-toggle="tooltip" data-placement="top" title="View Leads!">
        <i class="fa fa-plus text-success my-float"></i>
    </a>
    <!-- Footer Nav-->
    <?php include '../components/agentfooter.php' ?>
    <script src="source/js/reminder.js"></script>
    <script src="source/js/agent-profiles.js"></script>
    <!-- END -->
</body>

</html>