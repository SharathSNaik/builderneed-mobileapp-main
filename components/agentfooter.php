<!-- Internet Connection Status-->
<a href="lead-register.php" class="float">
    <i class="fa fa-plus text-success my-float"></i>
</a>
<!-- <div class="fixed">

</div> -->
</main>
<div class="internet-connection-status" id="internetStatus"></div>
<div class="footer-nav-area" id="footerNav">
    <div class="container h-100 px-0">
        <div class="builderneed-footer-nav h-100">
            <ul class="h-100 d-flex align-items-center justify-content-between pl-0" style="list-style-type:none;">
                <li class="footer-sys homepage"><a href="homepage.php" style="font-size: 15px;"><i class="lni lni-home" style="font-size: 25px;"></i>Home</a></li>
                <li class="footer-sys sitev"><a href="site-visit.php" style="font-size: 15px;"><i class="fa fa-building" style="font-size: 25px;"></i>Site Visit</a></li>
                <!-- <li class="footer-sys leadr"><a href="lead-register.php" style="font-size: 15px;"><i class="fa fa-plus" style="font-size: 25px;"></i>Add Leads</a></li> -->
                <li class="footer-sys viewl"><a href="view-leads.php" style="font-size: 15px;"><i class="fa fa-users" style="font-size: 25px;"></i>Leads</a></li>
                <!-- <li class="footer-sys lisap"><a href="homepage.php" style="font-size: 15px;"><i class="fa fa-gear" style="font-size: 25px;"></i>Settings</a></li> -->
            </ul>
        </div>
    </div>
</div>
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" style="margin-top:30%;" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog bg-white" style="border-radius:20px;">
        <div class="modal-content" style="border:none;">
            <div class="modal-header" style="border:none;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <center>
                <div class="col-6 remperlead" data-toggle="modal" data-target="#basicModals" style="border-radius:20px;box-shadow: 5px 5px 5px 5px #888888;margin-bottom:20px;margin-top:20px;" onclick="showleadReminder(this);">
                    <div class="single-payment-method remopen"><a href="#"><i style="font-size:60px" class="fa fa-bell-o"></i></i>
                            <h6>Reminders</h6>
                        </a></div>
                </div>
                <div class="col-6 notesperlead" data-toggle="modal" data-target="#notes" style="border-radius:20px;box-shadow: 5px 5px 5px 5px #888888;" onclick="showleadReminder(this);">
                    <div class="single-payment-method"><a href="#"><i style="font-size:60px" class="fa fa-sticky-note-o"></i>
                            <h6>Notes</h6>
                        </a></div>
                </div>
            </center>
            <div style="height: 60px;">
            </div>

        </div>
    </div>
</div>
<!-- View Reminder -->
<div class="modal fade" id="basicModals" tabindex="-1" role="dialog" style="margin-top:10%;" aria-labelledby="basicModals" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Reminders</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div style="height: 345px;overflow-y:scroll">
                <div class="modal-body" style="overflow-y:scroll;">
                    <p class="text-center reminfoer" style="margin-top: 145px;">Loading ...</p>
                    <p class="text-center minorrem" style="margin-top: 145px;"></p>
                    <div id="accordion" class="reminderperlead">

                    </div>
                </div>
            </div>
            <div class="px-2 mx-2 py-2">
                <p class="text-danger text-center"></p>
                <center>
                    <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#addRem" class="btn btn-primary">Add Reminder</button>
                </center>
            </div>
        </div>
    </div>
</div>
<!-- View Notes -->
<div class="modal fade" id="notes" tabindex="-1" role="dialog" style="margin-top:10%;" aria-labelledby="notes" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Notes</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div style="height: 345px; overflow-y:scroll;">
                <div class="modal-body" style="overflow-y:scroll;">
                    <p class="text-center reminfoer" style="margin-top: 145px;">Loading ....</p>
                    <div id="accordion" class="noteperlead">

                    </div>
                </div>
            </div>
            <div class="px-2 mx-2 py-2">
                <p class="text-danger text-center"></p>
                <center>
                    <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#addNotes" class="btn btn-primary">Add Note</button>
                </center>
            </div>
        </div>
    </div>
</div>
<!-- Add reminder -->
<div class="modal fade" id="addRem" tabindex="-1" role="dialog" style="margin-top:10%;" aria-labelledby="addRem" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Reminder</h4>
                <button type="button" class="close tclose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="remName">Name</label>
                    <input type="text" class="form-control" readonly id="remName" placeholder="Enter Name">
                    <input type="hidden" class="form-control" readonly id="leadID">
                </div>
                <div class="form-group">
                    <label for="remPhone">Phone</label>
                    <input type="text" class="form-control" readonly id="remPhone" placeholder="Enter Phone Number">
                </div>
                <div class="form-group">
                    <label for="inputDate">Date and time</label>
                    <input type="datetime-local" class="form-control" id="inputDate">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputReason">Reason</label>
                    <select id="inputReason" class="form-control">
                        <option selected hidden>Choose...</option>
                        <option value="Follow Up">Follow Up</option>
                        <option value="Busy">Busy</option>
                        <option value="Provide Details/Info">Provide Details/Info</option>
                        <option value="Availability">Availability</option>
                        <option value="Pricing">Pricing</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="addNote">Title</label>
                    <input type="text" class="form-control" placeholder="Enter Title" id="nttitle" />
                </div>
                <div class="form-group">
                    <label for="addNote">Notes</label>
                    <textarea class="form-control" placeholder="Enter Notes" id="addNote" rows="3"></textarea>
                </div>
            </div>
            <div class="px-2 mx-2 py-2">
                <p class="text-danger text-center remErr"></p>
                <center>
                    <button type="button" class="btn btn-primary saveRem" onclick="setReminder();">Save changes</button>
                </center>
            </div>
        </div>
    </div>
</div>
<!-- Add notes -->
<div class="modal fade" id="addNotes" tabindex="-1" role="dialog" style="margin-top:10%;" aria-labelledby="addNotes" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Notes</h4>
                <button type="button" class="close nclose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="noteName">Name</label>
                    <input type="text" class="form-control" readonly id="noteName" placeholder="Enter Name">
                    <input type="hidden" class="form-control" readonly id="nleadID">
                </div>
                <div class="form-group">
                    <label for="notePhone">Phone</label>
                    <input type="text" class="form-control" readonly id="notePhone" placeholder="Enter Phone Number">
                </div>
                <div class="form-group">
                    <label for="addNotes">Title</label>
                    <input type="text" class="form-control" id="nnttitle" placeholder="Add Title">
                </div>
                <div class="form-group">
                    <label for="addNotes">Notes</label>
                    <textarea class="form-control" placeholder="Enter Notes" id="notetoadd" rows="3"></textarea>
                </div>
            </div>
            <div class="px-2 mx-2 py-2">
                <p class="text-danger text-center remErr"></p>
                <center>
                    <button type="button" class="btn btn-primary saveNote mb-3" onclick="setNote();">Save changes</button>
                </center>
            </div>
        </div>
    </div>
</div>
<!-- Update -->
<!-- Update notes -->
<div class="modal fade" id="upNote" tabindex="-1" role="dialog" style="margin-top:10%;" aria-labelledby="upNote" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Update Notes</h4>
                <button type="button" class="close untclose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="noteName">Name</label>
                    <input type="text" class="form-control" readonly id="unoteName" placeholder="Enter Name">
                    <input type="hidden" class="form-control" readonly id="unleadID">
                </div>
                <div class="form-group">
                    <label for="notePhone">Phone</label>
                    <input type="text" class="form-control" readonly id="unotePhone" placeholder="Enter Phone Number">
                </div>
                <div class="form-group">
                    <label for="addNotes">Title</label>
                    <input type="text" class="form-control" id="unttitle" placeholder="Add Title">
                </div>
                <div class="form-group">
                    <label for="addNotes">Notes</label>
                    <textarea class="form-control" placeholder="Enter Notes" id="unotetoadd" rows="3"></textarea>
                </div>
            </div>
            <div class="px-2 mx-2 py-2">
                <p class="text-danger text-center remErr"></p>
                <center>
                    <button type="button" class="btn btn-primary upnote mb-3" onclick="updateNotes(this);">Save changes</button>
                </center>
            </div>
        </div>
    </div>
</div>
<!-- Rem update -->
<div class="modal fade" id="upRem" tabindex="-1" role="dialog" style="margin-top:10%;" aria-labelledby="upRem" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Update Reminder</h4>
                <button type="button" class="close utclose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="remName">Name</label>
                    <input type="text" class="form-control" readonly id="uremName" placeholder="Enter Name">
                    <input type="hidden" class="form-control" readonly id="uleadID">
                </div>
                <div class="form-group">
                    <label for="remPhone">Phone</label>
                    <input type="text" class="form-control" readonly id="uremPhone" placeholder="Enter Phone Number">
                </div>
                <div class="form-group">
                    <label for="inputDate">Date and time</label>
                    <input type="datetime-local" class="form-control" id="uinputDate">
                    <p class="sdata text-center">Loading...</p>
                </div>
                <div class="form-group col-md-4">
                    <label for="uinputReason">Reason</label>
                    <select id="uinputReason" class="form-control">
                        <option selected hidden>Choose...</option>
                        <option value="Follow Up">Follow Up</option>
                        <option value="Busy">Busy</option>
                        <option value="Provide Details/Info">Provide Details/Info</option>
                        <option value="Availability">Availability</option>
                        <option value="Pricing">Pricing</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="addNote">Title</label>
                    <input type="text" class="form-control" placeholder="Enter Title" id="unnttitle" />
                </div>
                <div class="form-group">
                    <label for="addNote">Notes</label>
                    <textarea class="form-control" placeholder="Enter Notes" id="uaddNote" rows="3"></textarea>
                </div>
            </div>
            <div class="px-2 mx-2 py-2">
                <p class="text-danger text-center remErr"></p>
                <center>
                    <button type="button" class="btn btn-primary usaveRem" onclick="updateReminder(this);">Save changes</button>
                </center>
            </div>
        </div>
    </div>
</div>
<!-- Communicate -->
<div class="modal fade" id="exampleModal" style="margin-top:55%" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Communicate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body fixed">

            </div>
        </div>
    </div>
</div>

<!-- All JavaScript Files-->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/waypoints.min.js"></script>
<script src="../assets/js/jquery.easing.min.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/jquery.counterup.min.js"></script>
<script src="../assets/js/jquery.countdown.min.js"></script>
<script src="../assets/js/default/jquery.passwordstrength.js"></script>
<script src="../assets/js/wow.min.js"></script>
<script src="../assets/js/jarallax.min.js"></script>
<script src="../assets/js/jarallax-video.min.js"></script>
<script src="../assets/js/default/dark-mode-switch.js"></script>
<script src="../assets/js/default/no-internet.js"></script>
<script src="../assets/js/default/active.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pulltorefreshjs/0.1.14/pulltorefresh.min.js'></script>
<script src='https://unpkg.com/hammer-touchemulator@0.0.2/touch-emulator.js'></script>
<!--<script src="../assets/js/pwa.js"></script>-->
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $(document).on('focus', 'input', function() {
            $('#footerNav').hide();
        });
        $(document).on('blur', 'input', function() {
            $('#footerNav').show();
        });
    });
    if (window.location.toString().indexOf("lisa") != -1) {
        $('.float').hide();
    } else {
        $('.float').show();
    }
    if (window.location.toString().indexOf("homepage") != -1) {
        $('.homepage').addClass('active');
    } else if (window.location.toString().indexOf("site-visit") != -1) {
        $('.sitev').addClass('active');
    } else if (window.location.toString().indexOf("lead-register") != -1) {
        $('.leadr').addClass('active');
    } else if (window.location.toString().indexOf("view-leads") != -1) {
        $('.viewl').addClass('active');
    } else if (window.location.toString().indexOf("lisa") != -1) {
        $('.lisap').addClass('active');
    } else {
        $('.lisap').removeClass('active');
        $('.viewl').removeClass('active');
        $('.leadr').removeClass('active');
        $('.sitev').removeClass('active');
        $('.homepage').removeClass('active');
    }
</script>
<script>
    function showleadReminder(e) {
        $('.reminfoer').show();
        $('.reminfoer').html("Loading ....");
        $('.minorrem').empty();
        $('.reminderperlead').empty();
        $('.noteperlead').empty();
        var lid = $(e).attr("data-val");
        if (lid == null || lid == "" || lid == undefined) {
            lid = e;
        }
        var name = $(e).attr("data-name");
        $.ajax({
            type: "POST",
            url: "source/backend/leadreminder.php",
            data: {
                lid: lid,
            },
            success: function(response) {
                var jsonData = JSON.parse(response);
                if (jsonData.status == "OK") {
                    $('.reminfoer').hide();
                    var arr = [];
                    for (var i = 0; i < jsonData.data.length; i++) {
                        var title = jsonData.data[i].title.toUpperCase();
                        if (title.length > 35) {
                            title = title.substr(0, 35) + '...';
                        } else {
                            //do nthng
                        }
                        $('.minorrem').hide();
                        $('.noteperlead').append('<div class="card mb-2"><div class="card-header" id="heading' + i + '"><h5 class="mb-0"><button class="btn text-dark" data-toggle="collapse" data-target="#collapse' + i + '" aria-expanded="true" aria-controls="collapse' + i + '">' + title + '</button></h5><i style="position:absolute;margin-top: -7%;margin-left: 85%;" class="fa fa-chevron-down"></i></div><div id="collapse' + i + '" class="collapse" aria-labelledby="heading' + i + '" data-parent="#accordion"><div class="card-body">' + jsonData.data[i].notes + '</div><hr><div class="col-12 mb-2 container"><button class="btn btn-primary" data-toggle="modal" data-target="#upNote" data-val="' + jsonData.data[i].vid + '" onclick=viewRem(this);>EDIT <i class="fa fa-edit"></i></button><button class="btn btn-danger pull-right" data-lid="' + jsonData.data[i].lid + '" data-val="' + jsonData.data[i].vid + '" onclick="deleterem(this);">DELETE <i class="fa fa-trash"></i></button></div></div>');
                        arr.push(jsonData.data[i].reason);
                        if (jsonData.data[i].reason != 0) {
                            $('.reminderperlead').append('<div class="card mb-2"><div class="card-header" id="heading' + i + '"><h5 class="mb-0"><button data-time="' + jsonData.data[i].datatime + '" onclick="loadtime(this)"; class="btn text-dark" data-toggle="collapse" data-target="#collapse' + i + '" aria-expanded="true" aria-controls="collapse' + i + '">' + title + '</button></h5><i style="position:absolute;margin-top: -7%;margin-left: 85%;" class="fa fa-chevron-down"></i></div><div id="collapse' + i + '" class="collapse" aria-labelledby="heading' + i + '" data-parent="#accordion"><div class="card-body"><div class="text-left font-weight-bold text-dark">Time Left:</div><div class="col-md-3"><div class="py-2 bg-primary text-white"><h3 class="card-title text-center"><div class="d-flex flex-wrap justify-content-center mt-2"><a><span class="badge timerdata">Loading...</span></a></div></h3></div></div><div class="text-left font-weight-bold text-dark mt-2">Note:</div><div>' + jsonData.data[i].notes + '</div><hr><div class="col-12 mt-2"><button class="btn btn-primary" data-toggle="modal" data-target="#upRem" data-val="' + jsonData.data[i].vid + '" onclick=viewRem(this);>EDIT <i class="fa fa-edit"></i></button><button class="btn btn-danger pull-right" data-lid="' + jsonData.data[i].lid + '" data-val="' + jsonData.data[i].vid + '" onclick="deleterem(this);">DELETE <i class="fa fa-trash"></i></button></div></div></div>');
                        } else {

                            if ($.inArray("0", arr) !== -1) {
                                if (jsonData.data.length > 1) {

                                } else {
                                    $('.minorrem').show();
                                    $('.minorrem').html("NO DATA FOUND");
                                }
                            }
                        }
                    }
                } else {
                    $('.reminfoer').show();
                    $('.reminfoer').html("NO DATA FOUND");
                }
            },
        });
    }

    function viewRem(e) {
        $('.usaveRem').attr("data-val", "0");
        $('.upnote').attr("data-val", "0");
        $("#uinputDate").val('Loading...');
        $(".sdata").html('Loading...');
        $("#uaddNote").val('Loading...');
        $("#uinputReason").val('Loading...');
        $("#unotetoadd").val('Loading...');
        $("#unttitle").val('Loading...');
        $("#unnttitle").val('Loading...');
        var rid = $(e).attr('data-val');
        $.ajax({
            type: "POST",
            url: "source/backend/view-reminder.php",
            data: {
                rid: rid,
            },
            success: function(response) {
                var jsonData = JSON.parse(response);
                if (jsonData.status == "OK") {
                    $('.usaveRem').attr("data-val", "" + jsonData.vid);
                    $("#uinputDate").val(jsonData.datatime);
                    $('.upnote').attr("data-val", "" + jsonData.vid);
                    $(".sdata").html(jsonData.datatime);
                    $("#unotetoadd").val(jsonData.notes);
                    $("#uaddNote").val(jsonData.notes);
                    $("#uinputReason").val(jsonData.reason);
                    $("#unttitle").val(jsonData.title);
                    $("#unnttitle").val(jsonData.title);
                } else {

                }
            },
        });
    }

    function deleterem(e) {
        var rid = $(e).attr('data-val');
        var lid = $(e).attr('data-lid');
        $.ajax({
            type: "POST",
            url: "source/backend/delete-reminder.php",
            data: {
                vid: rid,
            },
            success: function(response) {
                var jsonData = JSON.parse(response);
                if (jsonData.status == "OK") {
                    $('.reminfoer').show();
                    showleadReminder(lid);
                } else {}

            },
        });
    }

    function loadtime(e) {
        var fulldatetime = $(e).attr('data-time');
        var countDownDate = new Date(fulldatetime).getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            $('.timerdata').html(days + "d " + hours + "h " +
                minutes + "m " + seconds + "s ");
            if (distance < 0) {
                clearInterval(x);
                $('.timerdata').html("REMINDER SENT");
            }
        }, 1000);

    }
    //Loading
    function loadme() {
        var i = 0;
        (function looper() {
            if (i++ < 100) {
                $('.loaderData').attr("style", "width:" + i + "%");
                setTimeout(looper, 0100);
            }
        })();
    }
    $('a').click(function() {
        // var i = 0;
        // (function looper() {
        //     if (i++ < 100) {
        //         $('.loaderData').attr("style", "width:" + i + "%");
        //         setTimeout(looper, 0100);
        //     }
        // })();
        navigator.vibrate = navigator.vibrate ||
            navigator.webkitVibrate ||
            navigator.mozVibrate ||
            navigator.msVibrate;

        if (navigator.vibrate) {
            // alert('vibration supported');
            navigator.vibrate(020);
        } else {
            // alert('vibration not supported');
        }
    });
    $('#preloader').hide();
    PullToRefresh.init({
        mainElement: 'main',
        onRefresh: function() {
            loadme();
            navigator.vibrate = navigator.vibrate ||
                navigator.webkitVibrate ||
                navigator.mozVibrate ||
                navigator.msVibrate;

            if (navigator.vibrate) {
                // alert('vibration supported');
                navigator.vibrate(010);
            } else {
                // alert('vibration not supported');
            }
            location.reload();
        }
    });
    TouchEmulator();
</script>