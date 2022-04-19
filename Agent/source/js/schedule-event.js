var getdateandtime = "";
var getmode = "Virtual";
var gettime = "Please Choose the Time";
var getall = "";
var gettimesaved = "";
var email_v = "";
var phone_v = "";
var sourceevent = "";
var getday = "";
var getVisitID = "";
var url_string = window.location;
var url = new URL(url_string);
var email = url.searchParams.get("email");
var phone = url.searchParams.get("phone");
var lid = url.searchParams.get("leadid");
$(document).ready(function () {
  $('#email_v').val(email);
  $('#phone_v').val(phone);
  $(".findactive").hide();
  $(".callinfo").slick();
  $(".Virtual_tab").show();
  $(".Selected_mode").html("Selected Mode           : " + getmode);
  //Check date Event
  $(".getTime").change(function () {
    gettime = $(".getTime").val();
    $(".Selected_time").html("Selected Time           : " + gettime);
  });

  $(".schedule-event").click(function () {
    getall = getdateandtime + " " + gettime + ":00";
    scheduleEvent(getall, getmode);
  });
  var url_string = window.location;
  var url = new URL(url_string);
  getVisitID = url.searchParams.get("visit");
  getday = url.searchParams.get("date");
  if (getVisitID != null) {
    showReschedule();
  }
});

function getDatemonth(e) {
  if ($(".days").find("a").hasClass("text-success")) {
    $("a").removeClass("text-success");
    $("a").removeClass("font-weight-bold");
    $(e).addClass("text-success font-weight-bold");
  } else {
    $(e).attr("class", "text-success font-weight-bold");
  }
  var d = new Date();
  var month = $(e).attr("data-month");
  if (
    month == 1 ||
    month == 2 ||
    month == 3 ||
    month == 4 ||
    month == 5 ||
    month == 6 ||
    month == 7 ||
    month == 8 ||
    month == 9
  ) {
    month = 0 + month;
  }
  var sday = $(e).attr("data-day");
  var syear = $(e).attr("data-year");
  var cdate = d.getDate();
  var cMonth = d.getMonth();
  var cYear = d.getFullYear();
  cMonth = Number(cMonth) + Number(1);
  cMonth = "0" + cMonth;
  if (syear < cYear) {
    $(".swal-overlay").show();  
    $(".schedule-event").attr("style", "pointer-events:none");
    swal({
      title: "Warning!",
      text: "Year Cannot be lower than current year",
      icon: "warning",
    });
    getdateandtime = "Year less than current Year";
  } else {
    if (month < cMonth) {
      $(".swal-overlay").show();
      $(".schedule-event").attr("style", "pointer-events:none");
      swal({
        title: "Warning!",
        text: "Date and month Cannot be lower than current one",
        icon: "warning",
      });
      getdateandtime = "Month less than current Month";
    } else {
      if (sday < cdate) {
        $(".swal-overlay").show();
        $(".schedule-event").attr("style", "pointer-events:none");
        swal({
          title: "Warning!",
          text: "Date Cannot be lower than current day",
          icon: "warning",
        });
        $(e).removeClass("text-success font-weight-bold");
        getdateandtime = "Date less than current Date";
      } else {
        $(".schedule-event").attr("style", "pointer-events:cursor");
        sday = $(e).attr("data-day");
        getdateandtime = syear + "-" + month + "-" + sday;
      }
    }
  }
  $(".Selected_Date").html("Selected Date           : " + getdateandtime);
}

function source_event(e) {
  sourceevent = $(e).attr("data-val");
  $(".Selected_source").html("Selected Source           : " + sourceevent);
  $("div").find("div .findactive").hide();
  $(e).find("div .findactive").show();
}

function getMode(e) {
  getmode = $(e).attr("data-val");
  $(".Selected_mode").html("Selected Mode           : " + getmode);
  if (getmode == "Virtual") {
    $(".Virtual_tab").show();
    $(".Selected_source").show();
  } else {
    $(".Selected_source").hide();
    $(".Virtual_tab").hide();
  }
}

function scheduleEvent(getall, getmode) {
  $(".schedule-event").attr("style", "pointer-events:none");
  phone_v = $("#phone_v").val();
  email_v = $("#email_v").val();
  if (getmode == "Physical") {
    if (
      getdateandtime == "" ||
      gettime == "Please Choose the Time" ||
      getall == "" ||
      getmode == "" ||
      getall == null ||
      getmode == null ||
      getall == undefined ||
      getmode == undefined
    ) {
      $(".swal-overlay").show();
      swal({
        title: "Warning!",
        text: "Please Enter All the fields",
        icon: "warning",
      });
      $(".schedule-event").attr("style", "pointer-events:cursor");
    } else {
      vaLidateSchedule(getall, getmode, email_v, phone_v, sourceevent);
    }
  } else if (getmode == "Virtual") {
    if (
      getdateandtime == "" ||
      gettime == "Please Choose the Time" ||
      getall == "" ||
      getmode == "" ||
      email_v == "" ||
      phone_v == "" ||
      sourceevent == "" ||
      getall == null ||
      getmode == null ||
      email_v == null ||
      phone_v == null ||
      sourceevent == null ||
      getall == undefined ||
      getmode == undefined ||
      email_v == undefined ||
      phone_v == undefined ||
      sourceevent == undefined
    ) {
      $(".swal-overlay").show();
      swal({
        title: "Warning!",
        text: "Please Enter All the fields",
        icon: "warning",
      });
      $(".schedule-event").attr("style", "pointer-events:cursor");
    } else {
      vaLidateSchedule(getall, getmode, email_v, phone_v, sourceevent);
    }
  }
}

function vaLidateSchedule(getall, getmode, email_v, phone_v, sourceevent) {
  $.ajax({
    type: "POST",
    url: "source/backend/scheduleEvent.php",
    data: {
      getdatetime: getall,
      getmode: getmode,
      lid: lid,
      email_v: email_v,
      phone_v: phone_v,
      getVisitID: getVisitID,
      sourceevent: sourceevent,
    },
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        $(".swal-overlay").show();
        swal({
          title: "Success!",
          text: jsonData.message,
          icon: "success",
        });
        setTimeout(function () {
          window.location.href = document.referrer;
        }, 3000);
      } else {
        $(".swal-overlay").show();
        $(".schedule-event").attr("style", "pointer-events:cursor");
        swal({
          title: "Warning!",
          text: jsonData.message,
          icon: "warning",
        });
      }
    },
  });
}

function showReschedule() {
  window.swal({
    icon: "../assets/img/loader.gif",
    button: false,
    closeOnClickOutside: false,
  });
  $.ajax({
    type: "POST",
    url: "source/backend/scheduleEvent-detail.php",
    data: {
      getVisitID: getVisitID,
    },
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        timearr = jsonData.date;
        timearr = timearr.split(" ");
        getdateandtime = timearr[0];
        gettime = String(timearr[1]);
        gettime = gettime.substring(0, gettime.length-3); 
        email_v = jsonData.email;
        phone_v = jsonData.phone;
        sourceevent = jsonData.source;
        $(".swal-overlay").hide();
        $("#email_v").val(jsonData.email);
        $("#phone_v").val(jsonData.phone);
        getmode = jsonData.req_mode;
        var getdatetime = jsonData.date;
        var datetime = getdatetime.split(" ");
        var monthNames = [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ];
        var mon = datetime[0];
        mon = mon.split("-");
        mon = monthNames[Number(mon[1])];
        $(".Selected_mode").html("Selected Mode           : " + getmode);
        $(".Selected_time").html("Selected Time           : " + datetime[1]);
        $(".Selected_date").html("Selected Date           : " + datetime[0]);
        $(".Selected_source").html(
          "Selected Source           : " + jsonData.source
        );
        $("#time").val(datetime[1]);
        if (getmode == "Virtual") {
          $(".Virtual_tab").show();
          $(".Selected_source").show();
        } else {
          $(".Selected_source").hide();
          $(".Virtual_tab").hide();
          getmode = "Physical";
        }
        var current = jsonData.source;
        $(".source").each(function () {
          var $this = $(this);
          if ($this.attr("data-val").indexOf(current) !== -1) {
            $($this).find("div .findactive").show();
          }
        });
        if (current == "Google Meet") {
          $(".slick-next").click();
        } else if (current == "Zoom") {
          for (var i = 0; i < 2; i++) {
            $(".slick-arrow").click();
          }
        }
      } else {
        window.location.href = document.referrer;
      }
    },
  });
}
