$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "main/source/get-session.php",
    success: function (response) {
      var res = JSON.parse(response);
      if (res.status == "OK") {
        window.location.href = "homepage.php";
      } else {
        console.log("No session");
      }
    },
  });
  $(".gotoOTP").attr(
    "style",
    "pointer-events:none; border-radius: 50px; background:#0058FF;"
  );
  $(".confirmOTP").attr(
    "style",
    "pointer-events:cursor; border-radius: 50px; background:#0058FF;"
  );
  $(".loginOTP").click(function () {
    $(".big-logo").hide();
  });

  $(".loginOTP").keyup(function () {
    if (!phoneVal()) {
      $(".errorPhone").text("Please Enter a valid 10 digit phone number");
    } else {
      $(".big-logo").show();
      $(".errorPhone").text("");
      $(".gotoOTP").attr(
        "style",
        "pointer-events:cursor;border-radius: 50px; background:#0058FF;"
      );
      $(".gotoOTP").click();
      $(".loginOTP").blur();

      $(".gotoOTP").attr(
        "style",
        "pointer-events:none; border-radius: 50px; background:#0058FF;"
      );
      $(".gotoOTP").hide();
    }
  });

  $(".gotoOTP").click(function () {
    var phoneOTP = $(".loginOTP").val();
    if (phoneOTP == "") {
    } else {
      $(".lvp").hide();
      $(".gotoOTP").hide();
      $(".signuplogin").hide();
      $(".loader-otp").append(
        '<center><div class="spinner-border text-warning" role="status"><span class="sr-only">Loading...</span></div></center>'
      );
      $.ajax({
        type: "POST",
        url: "main/source/sendOTP.php",
        data: {
          phoneOTP: phoneOTP,
        },
        success: function (response) {
          var jsonData = JSON.parse(response);
          if (jsonData.status === "OK") {
            window.location.href = jsonData.redirectURL;
          } else {
            swal({
              title: "Warning!",
              text: jsonData.message,
              icon: "warning",
            });
            $(".lvp").show();
            $(".spinner-border").remove();
            $(".gotoOTP").show();
            $(".gotoOTP").attr(
              "style",
              "border-radius: 50px; background:#0058FF;"
            );
          }
        },
      });
    }
  });

  // AFTER OTP STATUS
  if (window.location.toString().indexOf("phone") != -1) {
    var url_string = window.location;
    var url = new URL(url_string);
    var getPhone = url.searchParams.get("phone");
    var otp = url.searchParams.get("otp");
    $(".usPhone").html("+91 " + getPhone);
    if (
      getPhone == "9113647413" ||
      getPhone == "9900329633" ||
      getPhone == "1234567890" ||
      getPhone == "1234567891" ||
      getPhone == "9137214948" ||
      getPhone == "9967025603" ||
      getPhone == "1234567892"
    ) {
      $(".anjanotp").append(
        'Testing OTP <span class="text-danger">' + otp + "</span>"
      );
    }
    //textbox focus
    $(".oneOTP").focus();
    $(".inputs").keyup(function () {
      if (this.value.length == this.maxLength) {
        var $next = $(this).next(".inputs");
        if ($next.length) $(this).next(".inputs").focus();
        else $(this).blur();
      }
      var onee = $(".oneOTP").val();
      var twoo = $(".two").val();
      var threee = $(".three").val();
      var fourr = $(".four").val();
      if (
        onee.length == 1 &&
        twoo.length == 1 &&
        threee.length == 1 &&
        fourr.length == 1
      ) {
        $(".confirmOTP").click();
      }
    });

    // AJAX
    $(".confirmOTP").click(function () {
      $(".confirmOTP").attr(
        "style",
        "pointer-events:none; border-radius: 50px; background:#0058FF;"
      );
      $(".confirmOTP").hide();
      $(".rediecturl").append(
        '<div class="spinner-grow text-primary" role="status" style="height: 20px;width: 20px;margin-right:10px;"><span class="sr-only">Loading...</span></div><div class="spinner-grow text-primary" role="status" style="height: 20px;width: 20px;margin-right:10px;"><span class="sr-only">Loading...</span></div><div class="spinner-grow text-primary" role="status" style="height: 20px;width: 20px;margin-right:10px;"><span class="sr-only">Loading...</span></div><div class="spinner-grow text-primary" role="status" style="height: 20px;width: 20px;margin-right:10px;"><span class="sr-only">Loading...</span></div>'
      );
      var one = $(".oneOTP").val();
      var two = $(".two").val();
      var three = $(".three").val();
      var four = $(".four").val();
      var otp = one + two + three + four;
      $.ajax({
        type: "POST",
        url: "main/source/verifyOTP.php",
        data: {
          getPhone: getPhone,
          otp: otp,
        },
        success: function (response) {
          var jsonData = JSON.parse(response);
          if (jsonData.status === "OK") {
            $(".status-otp").hide();
            setTimeout(() => {
              window.location.href = jsonData.redirectURL;
            }, 1000);
          } else {
            $(".oneOTP").val("");
            $(".two").val("");
            $(".three").val("");
            $(".four").val("");
            $(".spinner-grow ").hide();
            $(".confirmOTP").show();
            $(".confirmOTP").attr(
              "style",
              "pointer-events:none; border-radius: 50px; background:#0058FF;"
            );
            $(".status-otp").append(
              '<div class="alert alert-danger" role="alert">' +
                jsonData.message +
                "</div>"
            );
            setTimeout(() => {
              $(".confirmOTP").attr(
                "style",
                "pointer-events:cursor; border-radius: 50px; background:#0058FF;"
              );
              $(".alert-danger").remove();
            }, 1000);
          }
        },
      });
    });
  }

  function phoneVal() {
    var pattern = /^[0-9]+$/;
    var phone = $(".loginOTP").val();
    if (phone.match(pattern) && phone.length >= 10) {
      return true;
    } else {
      return false;
    }
  }
  function phoneVals() {
    var pattern = /^[0-9]+$/;
    var phone = $(".loginOTPsign").val();
    if (phone.match(pattern) && phone.length >= 10) {
      return true;
    } else {
      return false;
    }
  }
  function emailVal() {
    var pattern =
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var email = $(".email_idsign").val();
    if (email.match(pattern)) {
      return true;
    } else {
      return false;
    }
  }
});
