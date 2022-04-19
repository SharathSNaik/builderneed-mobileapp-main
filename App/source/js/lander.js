$(document).ready(function () {
  countNotification();
  // if (localStorage) {
  //   localStorage.getItem("logo");
  //   $(".img-fluid").attr("src", localStorage.getItem("logo"));
  //   $(".site_logo").attr("src", localStorage.getItem("logo"));
  //   $(".user-name").html(localStorage.getItem("name"));
  //   $(".userno").html("+91" + localStorage.getItem("logo"));
  //   $(".usernameprof").html("@" + localStorage.getItem("name"));
  //   $(".usernameprofile").html(localStorage.getItem("name"));
  //   $(".useremail").html(localStorage.getItem("email"));
  //   $(".userno").val(localStorage.getItem("phone"));
  //   $("#email_v").val(localStorage.getItem("email"));
  //   $("#phone_v").val(localStorage.getItem("phone"));
  //   $(".usernameprof").val("@" + localStorage.getItem("name"));
  //   $(".usernameprofile").val(localStorage.getItem("name"));
  //   $(".useremail").val(localStorage.getItem("email"));
  //   $(".agentAssigned").text("Agent : " + localStorage.getItem("aname"));
  //   $(".header_name").text(localStorage.getItem("pname"));
  //   $(".dataprof").text(localStorage.getItem("prof"));
  // } else {
  //   localStorage.clear();
  // }
  $(".firstcard").hide();
  $(".fordlf").hide();
  $(".seccard").hide();
  $(".switch").hide();
  $(".loadpr").html("");
  $(".nikoo").hide();
  $(".project").attr("href", "property-details.php?pid=6");
  $.ajax({
    type: "POST",
    url: "source/backend/useractivity.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        var i = 0;
        (function looper() {
          if (i++ < jsonData.percentage) {
            $(".percent").text(i + "%");
            $(".small").addClass("p" + i);
            setTimeout(looper, 0100);
          }
        })();
      }
    },
  });
  //Lander Pages
  $(".owl-carousel").owlCarousel({
    nav: true,
    items: 5,
  });
  $.ajax({
    type: "POST",
    url: "source/backend/getimages.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        $(".project").attr(
          "href",
          "property-details.php?pid=" + jsonData.pid + ""
        );
        var len = jsonData.data_img.length;
        if (len > 5) {
          len = 5;
        } else {
          len = jsonData.data_img.length;
        }
        $(".ament").mouseenter(function () {
          $(".card-header").removeAttr("data-toggle");
          $(".fa-chevron-down").hide();
        });
        $(".loc").mouseenter(function () {
          $(".fa-chevron-down").show();
          $(".card-header").attr("data-toggle", "collapse");
        });
        $(".config").mouseenter(function () {
          $(".fa-chevron-down").show();
          $(".card-header").attr("data-toggle", "collapse");
        });
        $(".dev").mouseenter(function () {
          $(".fa-chevron-down").show();
          $(".card-header").attr("data-toggle", "collapse");
        });
        if (jsonData.pid == "4") {
          $(".firstcard").show();
        } else {
          $(".firstcard").hide();
        }
        if (jsonData.pid == "5") {
          $(".fordlf").show();
        } else {
          $(".fordlf").hide();
        }

        if (jsonData.pid == "7") {
          $(".nikoo").show();
        } else {
          $(".nikoo").hide();
        }
        if (jsonData.pid == "6") {
          $(".seccard").show();
        } else {
          $(".seccard").hide();
        }
        //Logos
        $(".float").attr(
          "href",
          "https://api.whatsapp.com/send?phone=91" + jsonData.agentnum
        );
        for (var i = 0; i < len; i++) {
          $(".owl-carousel")
            .trigger("add.owl.carousel", [
              '<div class="single-hero-slide shadow-lg p-3 mb-5 bg-secondary" style="background-image: url(' +
                jsonData.data_img[i].image +
                '); border-radius: 10px 10px 0px 0px;"></div>',
            ])
            .trigger("refresh.owl.carousel");
        }
        $(".sliderremove").remove();
      } else {
        $(".seccard").show();
        console.log("Owner needs to add image");
        $(".float").attr(
          "href",
          "https://api.whatsapp.com/send?phone=91" + jsonData.wa
        );
      }
    },
  });
  //Upcoming Events
  $(".cta-text").show();
  $.ajax({
    type: "POST",
    url: "source/backend/scheduled-events.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        $(".cta-text").show();
        var d = new Date();
        $(".get_event").text(jsonData.upcoming_count + " Upcoming Events");
        $(".get_datetime").text("");
        // if (jsonData.upcoming_count == 1) {
        var array = jsonData.datatime;
        var arr = new Array();
        arr = array.split(" ");
        var getdate = arr[3];
        var d = getdate.split("-");
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
        var a = Number(d[1]) - 1;
        const getDaydate = new Date(
          monthNames[a] + " " + d[2] + ", " + d[0] + " " + arr[4]
        );
        var d1 = new Date();
        var d2 = new Date(d1);
        if (getDaydate < d2) {
          $(".cta-text").show();
        } else {
          const day1 = getDaydate.getDay();
          var days = [
            "Sunday",
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday",
          ];
          $(".get_datetime").text(
            "Site visit on " +
              d[2] +
              " " +
              monthNames[a] +
              " " +
              days[day1] +
              " " +
              d[0]
          );
        }
        // }
      } else if (jsonData.status == "error") {
        // $(".cta-text").hide();
        $(".get_event").text("No Upcoming Events");
      }
    },
  });
  loadProject();
});
function loadProject() {
  $.ajax({
    type: "POST",
    url: "source/backend/loadproject.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        if (jsonData.data.length == 0) {
          $(".switch").hide();
        } else {
          $(".switch").show();
        }
        for (var i = 0; i < jsonData.data.length; i++) {
          var name = jsonData.data[i].prname;
          $(".subscription-container").append(
            '<input type="radio" onclick="loadOnSelect(this);" data-val=' +
              jsonData.data[i].prid +
              ' name="radio" id="option' +
              i +
              '"><label for="option' +
              i +
              '" class="subscription__button"><img src="' +
              jsonData.data[i].primg +
              '" style="height:60px;width:100px" alt=""><span class="subscription__price">' +
              name.toUpperCase() +
              "</span></label>"
          );
        }
      }
    },
  });
}
function loadOnSelect(e) {
  var pid = $(e).attr("data-val");
  $(".loadpr").html("Switching, Please Wait!");
  $.ajax({
    type: "POST",
    url: "source/backend/changeproject.php",
    data: {
      pid: pid,
    },
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        window.location.href = "home.php";
      }
    },
  });
}

function countNotification() {
  $.ajax({
    type: "POST",
    url: "source/backend/getnotifications.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        if (jsonData.count > 0) {
          $(".addNotification").addClass("bellno");
        }
      } else {
      }
    },
  });
}

function clearNotfication() {
  $.ajax({
    type: "POST",
    url: "source/backend/removeNotification.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        $(".addNotification").removeClass("bellno");
      }
    },
  });
}
