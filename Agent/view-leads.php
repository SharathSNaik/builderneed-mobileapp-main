<!DOCTYPE html>
<html lang="en">
<!--head and meta tags-->
<?php include '../components/head.php' ?>
<style>
    .circle {
        width: 75%;
        height: 50px;
        border-radius: 50%;
        line-height: 45px;
        font-size: 20px;
        color: #000;
        border-color: black;
        text-align: center;
        background: #fff;
        border: 3px solid #BADA55;
        margin-left: 20px;
    }

    .input-container {
        border-radius: 10px;
        display: flex;
        width: 100%;
        margin-bottom: 15px;
    }

    /* Style the form icons */
    .icon {
        padding: 10px;
        border-radius: 10px;
        background: transparent;
        color: black;
        min-width: 50px;
        text-align: center;
    }

    /* Style the input fields */
    .input-field {
        width: 100%;
        border-radius: 10px;
        padding: 10px;
        outline: white;
    }

    .loader-spin {
        border: 16px solid #f3f3f3;
        /* Light grey */
        border-top: 16px solid #3498db;
        /* Blue */
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<!--END-->

<body>
    <!-- Preloader-->
    <div class="closebar"></div>
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
            <div class="input-container">
                <input class="input-field" id="Search" type="text" placeholder="Search" name="usrnm">
                <div class="btn-group float-right dropleft hidehere">
                    <button type="button" style="margin-left:10px;" class="btn btn-sm btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-filter"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item hotleads" href="#">Hot Leads</a>
                        <a class="dropdown-item fcall" href="#">First Call</a>
                        <a class="dropdown-item notAns" href="#">Not Answered</a>
                        <a class="dropdown-item sitevisitfil" href="#">Site visits completed</a>
                        <!-- <a class="dropdown-item naInt" href="#">Not Intrested</a> -->
                        <a class="dropdown-item all" href="#">All</a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center g-3">
                <!-- <div class="card container bg-primary">
                    <div class="row text-center text-white font-weight-bold py-2">
                        <div class="col">Active Leads</div>
                    </div>
                </div> -->
                <div class="accordion afterActive nodata" style="font-size: 20px; border-radius:20px;" id="accordionExample">
                </div>
                <div class="accordion nodatas" style="font-size: 20px; border-radius:20px;" id="accordionExample">
                </div>
            </div>
            <br>
            <center>
                <div class="loader-spin"></div>
            </center>
        </div>
    </div>
    <div class="py-2">
    </div>
    <!-- Footer Nav-->
    <?php include '../components/agentfooter.php' ?>
    <script src="source/js/agent-lander.js"></script>
    <script src="source/js/agent-profiles.js"></script>
    <!-- END -->
</body>

</html>