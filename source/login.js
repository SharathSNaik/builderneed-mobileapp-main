$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "App/source/backend/get-session.php",
    success: function (response) {
      var res = JSON.parse(response);
      if (res.status == "OK") {
        window.location.href = "App/home.php";
      }
    },
  });
  $(".loginuser").hide();
  $(".signupuser").hide();
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
      $(".errorPhones").text("Please Enter a valid 10 digit phone number");
    } else {
      $(".big-logo").show();
      $(".errorPhones").text("");
      $(".errorPhone").text("");
      $(".gotoOTP").attr(
        "style",
        "pointer-events:cursor;border-radius: 50px; background:#0058FF;"
      );
      $(".signupevent").attr(
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

  $(".loginOTP").blur(function () {
    $(".big-logo").show();
  });

  $(".email_idsign").keyup(function () {
    if (!emailVal()) {
      $(".signupevent").attr(
        "style",
        "pointer-events:none; border-radius: 50px; background:#0058FF;"
      );
      $(".erremails").text("Please Enter a valid email");
    } else {
      $(".erremails").text("");
      $(".signupevent").attr(
        "style",
        "pointer-events:cursor;border-radius: 50px; background:#0058FF;"
      );
    }
  });

  $(".loginOTPsign").keyup(function () {
    if (!phoneVals()) {
      $(".errorPhones").text("Please Enter a valid 10 digit phone number");
    } else {
      $(".errorPhones").text("");
      $(".signupevent").attr(
        "style",
        "pointer-events:cursor;border-radius: 50px; background:#0058FF;"
      );
    }
  });

  //SIGN UP
  $(".signupbtn").click(function () {
    $(".loginbtn").fadeIn().hide();
    $(".signupbtn").fadeIn().hide();
    $(".signupuser").fadeIn().show();
  });
  $(".signupevent").click(function () {
    var login_name = $(".login_namesign").val();
    var email_user = $(".email_idsign").val();
    var phone_user = $(".loginOTPsign").val();
    if (
      login_name == "" ||
      email_user == "" ||
      phone_user == "" ||
      login_name == undefined ||
      email_user == undefined ||
      phone_user == undefined
    ) {
      swal({
        title: "Warning!",
        text: "Please Enter all the details",
        icon: "warning",
      });
    } else {
      $(".signupevent").hide();
      $(".loginSIGNUP").hide();
      $(".loaderSIGN").append(
        '<center><div class="spinner-border text-warning" role="status"><span class="sr-only">Loading...</span></div></center>'
      );
      $.ajax({
        type: "POST",
        url: "source/signupUser.php",
        data: {
          phone_user: phone_user,
          login_name: login_name,
          email_user: email_user,
        },
        success: function (response) {
          var jsonData = JSON.parse(response);
          if (jsonData.status === "OK") {
            setTimeout(() => {
              window.location.href = jsonData.redirectURL;
            }, 3000);
          } else {
            swal({
              title: "Warning!",
              text: jsonData.message,
              icon: "warning",
            });
            $(".spinner-border").remove();
            $(".signupevent").show();
            $(".loginSIGNUP").show();
            $(".signupevent").attr(
              "style",
              "border-radius: 50px; background:#0058FF;"
            );
          }
        },
      });
    }
  });

  $(".signuplogin").click(function () {
    $(".signupuser").fadeIn().show();
    $(".loginuser").fadeIn().hide();
  });

  $(".loginbtn").click(function () {
    //BTN FUNCTIONS
    $(".loginbtn").fadeIn().hide();
    $(".signupbtn").fadeIn().hide();
    $(".loginuser").fadeIn().show();
  });

  $(".loginSIGNUP").click(function () {
    $(".signupuser").fadeIn().hide();
    $(".loginuser").fadeIn().show();
  });

  $(".gotoOTP").click(function () {
    $(".gotoOTP").attr(
      "style",
      "pointer-events:none; border-radius: 50px; background:#0058FF;"
    );
    var phoneOTP = $(".loginOTP").val();
    if (phoneOTP == "") {
    } else {
      $(".gotoOTP").hide();
      $(".signuplogin").hide();
      $(".loader-otp").append(
        '<center><div class="spinner-border text-warning" role="status"><span class="sr-only">Loading...</span></div></center>'
      );
      $.ajax({
        type: "POST",
        url: "source/sendOTP.php",
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
            $(".spinner-border").remove();
            $(".gotoOTP").show();
            $(".signuplogin").show();
            $(".gotoOTP").attr(
              "style",
              "pointer-events:cursor;border-radius: 50px; background:#0058FF;"
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
    $(".usPhone").html("+91 " + getPhone);
    var otp = url.searchParams.get("otp");
    if (
      getPhone == "9113647413" ||
      getPhone == "9900329633" ||
      getPhone == "1234567890" ||
      getPhone == "1234567891" ||
      getPhone == "1234567893" ||
      getPhone == "1234567894" ||
      getPhone == "1234567895" ||
      getPhone == "1234567896" ||
      getPhone == "1234567897" ||
      getPhone == "1234567898" ||
      getPhone == "1234567899" ||
      getPhone == "9483887537" ||
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
      // $(".confirmOTP").hide();
      $(".confirmOTP").text("");
      $(".confirmOTP").append(
        '<div class="spinner-grow text-white" role="status" style="height: 20px;width: 20px;margin-right:10px;"><span class="sr-only">Loading...</span></div><div class="spinner-grow text-white" role="status" style="height: 20px;width: 20px;margin-right:10px;"><span class="sr-only">Loading...</span></div><div class="spinner-grow text-white" role="status" style="height: 20px;width: 20px;margin-right:10px;"><span class="sr-only">Loading...</span></div><div class="spinner-grow text-white" role="status" style="height: 20px;width: 20px;margin-right:10px;"><span class="sr-only">Loading...</span></div>'
      );
      var one = $(".oneOTP").val();
      var two = $(".two").val();
      var three = $(".three").val();
      var four = $(".four").val();
      var otp = one + two + three + four;
      $.ajax({
        type: "POST",
        url: "source/verifyOTP.php",
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
            $(".confirmOTP").text(jsonData.message);
            setTimeout(() => {
              $(".confirmOTP").text("Verify & Proceed");
            }, 1000);
            $(".spinner-grow ").hide();
            $(".confirmOTP").show();
            $(".confirmOTP").attr(
              "style",
              "pointer-events:none; border-radius: 50px; background:#0058FF;"
            );
            $(".addError").addClass("bellno");
            $(".oneOTP").attr("style", "border: 1px solid red;");
            $(".two").attr("style", "border: 1px solid red;");
            $(".three").attr("style", "border: 1px solid red;");
            $(".four").attr("style", "border: 1px solid red;");
            // $(".status-otp").append(
            //   '<div class="alert alert-danger" role="alert">' +
            //     jsonData.message +
            //     "</div>"
            // );
            setTimeout(() => {
              $(".addError").removeClass("bellno");
              $(".oneOTP").attr("style", "border: 1px solid black;");
              $(".two").attr("style", "border: 1px solid black;");
              $(".three").attr("style", "border: 1px solid black;");
              $(".four").attr("style", "border: 1px solid black;");
              $(".confirmOTP").attr(
                "style",
                "pointer-events:cursor; border-radius: 50px; background:#0058FF;"
              );
              $(".oneOTP").val("");
              $(".two").val("");
              $(".three").val("");
              $(".four").val("");
              // $(".alert-danger").remove();
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

  if (window.location.toString().indexOf("email") != -1) {
    var url_strings = window.location;
    var urls = new URL(url_strings);
    var phone_user = urls.searchParams.get("phone");
    var email_user = urls.searchParams.get("email");
    $(".loginbtn").fadeIn().hide();
    $(".signupbtn").fadeIn().hide();
    $(".loginuser").fadeIn().show();
    $(".loginOTP").val(phone_user);
    $(".email_id").val(email_user);
    $(".gotoOTP").attr(
      "style",
      "pointer-events:cursor; border-radius: 50px; background:#0058FF;"
    );
  }
});
