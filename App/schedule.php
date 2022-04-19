<!DOCTYPE html>
<html lang="en">
<!--head and meta tags-->
<title>Schedule Site Vist</title>
<?php include '../components/head.php' ?>
<link rel="stylesheet" href="../assets/calender.css">
<link rel="stylesheet" href="source/schedule.css">
<link rel='stylesheet' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css' />
<!--END-->

<body>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
        <div class="spinner-grow text-secondary" role="status">
            <div class="sr-only">Loading...</div>
        </div>
    </div>
    <!-- Header Area-->
    <?php include '../components/nav-sidebar.php' ?>
    <!--END-->
    <div class="page-content-wrapper py-3">
        <div class="page">
            <!-- Responsive calendar - START -->
            <div class="responsive-calendar">
                <div class="controls">
                    <a class="pull-left" data-go="prev">
                        <div class="btn"><i class="fa fa-chevron-left text-dark"></i></div>
                    </a>
                    <h4><span class="dateyear" data-head-year></span> <span class="datamonth" data-head-month></span></h4>
                    <a class="pull-right" data-go="next">
                        <div class="btn"><i class="fa fa-chevron-right text-dark"></i></div>
                    </a>
                </div>
                <hr />
                <div class="day-headers">
                    <div class="day header">Mon</div>
                    <div class="day header">Tue</div>
                    <div class="day header">Wed</div>
                    <div class="day header">Thu</div>
                    <div class="day header">Fri</div>
                    <div class="day header">Sat</div>
                    <div class="day header">Sun</div>
                </div>
                <div class="days" data-group="days">
                    <!-- the place where days will be generated -->
                </div>
            </div>
            <!-- Responsive calendar - END -->
            <!-- Placeholder -->
            <div class="responsive-calendar-placeholder">

            </div>
            <hr>
            <div style="text-align:center">
                <span class="text-center text-dark">Current Date :<?php echo date("d/m/y"); ?></span>
            </div>
            <form>
                <div class="form-group  py-3">
                    <label for="time" class="font-weight-bold">MODE :</label>
                    <label class='toggle-label'>
                        <input type='checkbox' />
                        <span class='back'>
                            <span class='toggle'></span>
                            <span class='label on' data-val="Virtual" onclick="getMode(this);">Virtual</span>
                            <span class='label off' data-val="Physical" onclick="getMode(this);">Physical</span>
                        </span>
                    </label>
                </div>
                <br>
                <div class="form-group">
                    <label for="time" class="font-weight-bold">TIME :</label>
                    <input id="time" aria-describedby="time" placeholder="Please choose time" class="form-control getTime" type="text" onfocus="(this.type='time')" onblur="(this.type='text')" id="date" />
                </div>
                <br>
                <div class="container Virtual_tab">
                    <center>
                        <div class="callinfo">
                            <!-- <div class="source" onclick="source_event(this);" data-val="Google DUO">
                                <img src="../assets/img/icons/gduo.png" height="50" width="50" />
                                <div>
                                    <label class="font-weight-bold text-dark">Google DUO</label>
                                    <div class="findactive" style="height: 10px;background-color:#ffc107;width:90px"></div>
                                </div>
                            </div> -->
                            <div class="source" onclick="source_event(this);" data-val="Google Meet">
                                <img src="../assets/img/icons/gmeet.png" height="50" width="50" />
                                <div>
                                    <p></p>
                                    <label class="font-weight-bold text-dark">Google Meet</label>
                                    <div class="findactive" style="height: 10px;background-color:#ffc107;width:100px"></div>
                                </div>
                            </div>
                            <div class="source" onclick="source_event(this);" data-val="Zoom">
                                <img src="../assets/img/icons/zoom.png" height="50" width="50" />
                                <div>
                                    <label class="font-weight-bold text-dark">ZOOM</label>
                                    <div class="findactive" style="height: 10px;background-color:#ffc107;width:50px"></div>
                                </div>
                            </div>
                        </div>
                    </center>
                    <div class="form-group py-3">
                        <label for="email_v" class="font-weight-bold">EMAIL ID :</label>
                        <input type="email" class="form-control" id="email_v" placeholder="Enter Email ID">
                    </div>
                    <div class="form-group py-3">
                        <label for="phone_v" class="font-weight-bold">PHONE NUMBER :</label>
                        <input type="text" class="form-control" id="phone_v" placeholder="Enter Phone Number" maxlength="10">
                    </div>
                </div>
                <div class="text-center">
                    <p class="agentAssigned text-dark font-weight-bold"></p>
                    <p class="Selected_Date text-dark font-weight-bold"></p>
                    <p class="Selected_mode text-dark font-weight-bold"></p>
                    <p class="Selected_time text-dark font-weight-bold"></p>
                    <p class="Selected_source text-dark font-weight-bold"></p>
                </div>
                <button class="btn btn-primary btn-lg w-100 schedule-event" style="border-radius: 10px; background:#0058FF;" type="button">SUBMIT</button>

            </form>
        </div>
    </div>
    <!-- Footer Nav-->
    <?php include '../components/footer.php' ?>

    <script src="source/js/calender.js"></script>
    <script src="source/js/schedule-event.js"></script>
    <script src="source/js/updateuseractivity.js"></script>
    <script>
        activitites(8);
    </script>
    <!-- END -->
</body>

</html>