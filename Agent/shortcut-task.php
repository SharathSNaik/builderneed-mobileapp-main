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

    .dropbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropbtn:hover,
    .dropbtn:focus {
        background-color: #3e8e41;
    }

    #myInput {
        box-sizing: border-box;
        background-image: url('https://www.w3schools.com/howto/searchicon.png');
        background-position: 14px 12px;
        background-repeat: no-repeat;
        font-size: 16px;
        padding: 14px 20px 12px 45px;
        border: none;
        border-bottom: 1px solid #ddd;
        width: 100%;
    }

    #myInput:focus {
        outline: 3px solid #ddd;
    }

    .dropdown {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .dropdown-content {
        display: none;
        /* position: absolute; */
        background-color: #f6f6f6;
        overflow: auto;
        border: 1px solid #ddd;
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown a:hover {
        background-color: #ddd;
    }

    .show {
        display: block;
        width: 100%;
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
        <div class="container dropdown">
            <div id="myDropdown" class="dropdown-content show">
                <input type="text" placeholder="Search Leads" id="myInput" onkeyup="filterFunction()">
                <div class="listofleads" style="height: 100px;overflow-y: scroll;">
                    <center>
                        <div class="loader-spin" style="height: 80px; width:80px;"></div>
                    </center>
                </div>
            </div>
            <div class="text-center">
                <h4 class="task for text-dark py-2"> Assigning Task to <span class="leadname"></span></h4>
                <hr>
                <div class="row g-3 touchevent">
                    <!-- Single Catagory Card-->
                    <div class="col-6">
                        <div class="card catagory-card">
                            <div class="card-body"><a><i style="font-size: 50px;" class="fa fa-bell-o"></i>
                                    <span style="font-size: 14  px;padding-top:6px">Set Reminder</span></a></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card catagory-card">
                            <div class="card-body"><a><i style="font-size: 50px;" class="fa fa-sticky-note-o"></i>
                                    <span style="font-size: 14  px;padding-top:6px">Add Notes</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <center>
            <div class="loader-spin"></div>
        </center> -->
    </div>
    <div class="py-2">
    </div>
    <!-- Footer Nav-->
    <?php include '../components/agentfooter.php' ?>
    <script src="source/js/agent-profiles.js"></script>
    <script src="source/js/shortcut.js"></script>
    <!-- END -->
</body>

</html>