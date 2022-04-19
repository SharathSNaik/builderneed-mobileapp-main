$(document).ready(function () {
  $(".number").click(function () {
    $(".big-logo").hide();
  });
  $(".pass").click(function () {
    $(".big-logo").hide();
  });

  $(".number").keyup(function () {
    if (!phoneVal()) {
      $(".errorPhone").text("Please Enter a valid 10 digit phone number");
    } else {
      $(".errorPhone").text("");
      $(".big-logo").show();
    }
  });

  $(".gotopass").click(function () {
    var phoneOTP = $(".number").val();
    var pass = $(".pass").val();
    if (phoneOTP == "" || pass == "" || pass.length < 8) {
      $(".errorPhone").text("Password should be more than 8 characters");
    } else {
      $(".errorPhone").text("");
      $(".loo").hide();
      $(".big-logo").show();
      $(".gotopass").hide();
      $(".loader-otp").append(
        '<center><div class="spinner-border text-warning" role="status"><span class="sr-only">Loading...</span></div></center>'
      );
      $.ajax({
        type: "POST",
        url: "main/source/passlogin.php",
        data: {
          phoneOTP: phoneOTP,
          pass: pass,
        },
        success: function (response) {
          var jsonData = JSON.parse(response);
          if (jsonData.status === "OK") {
            setTimeout(() => {
              window.location.href = jsonData.redirectURL;
            }, 3000);
          } else {
            $(".loo").show();
            swal({
              title: "Warning!",
              text: jsonData.message,
              icon: "warning",
            });
            $(".spinner-border").remove();
            $(".gotopass").show();
            $(".gotopass").attr(
              "style",
              "border-radius: 50px; background:#0058FF;"
            );
          }
        },
      });
    }
  });

  function phoneVal() {
    var pattern = /^[0-9]+$/;
    var phone = $(".number").val();
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
