$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "source/backend/get-sourceID.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        $(".registerSource").val(jsonData.projectID);
        $(".viewproj").val(jsonData.project);
      } else {
        swal({
          title: "Warning!",
          text: jsonData.message,
          icon: "warning",
        });
        setTimeout(function () {
          window.location.href = "homepage.php";
        }, 2000);
      }
    },
  });

  $(".registerPhone").keyup(function () {
    if (!phoneVal()) {
      $(".errorPhone").text("Please Enter a valid 10 digit phone number");
    } else {
      $(".errorPhone").text("");
    }
  });

  $(".registerEmail").keyup(function () {
    if (!emailVal()) {
      $(".errorMail").text("Please Enter a valid email");
    } else {
      $(".errorMail").text("");
    }
  });

  $(".submitRegister").click(function () {
    $(".submitRegister").attr("style", "pointer-events:none");
    var name = $(".registerName").val();
    var phone = $(".registerPhone").val();
    var email = $(".registerEmail").val();
    if (email == "") {
      email = "demo@builderneed.com";
    }
    var source = $(".registerSource").val();
    if (name == "" || phone == "" || email == "" || source == null) {
      swal({
        title: "Warning!",
        text: "Please Enter all the details",
        icon: "warning",
      });
      $(".submitRegister").attr("style", "pointer-events:cursor");
    } else {
      registerLeads(name, phone, email, source);
    }
  });

  function phoneVal() {
    var pattern = /^[0-9]+$/;
    var phone = $(".registerPhone").val();
    if (phone.match(pattern) && phone.length >= 10) {
      return true;
    } else {
      return false;
    }
  }

  function emailVal() {
    var pattern =
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var email = $(".registerEmail").val();
    if (email.match(pattern)) {
      return true;
    } else {
      return false;
    }
  }

  function registerLeads(name, phone, email, source) {
    $.ajax({
      type: "POST",
      url: "source/backend/register-lead.php",
      data: {
        name: name,
        phone: phone,
        email: email,
        source: source,
      },
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status == "OK") {
          window.location.href = jsonData.link;
          // swal({
          //   title: "Success!",
          //   text: jsonData.message,
          //   icon: "success",
          // });
          setTimeout(function () {
            window.location.href = "homepage.php";
          }, 2000);
        } else {
          $(".submitRegister").attr("style", "pointer-events:cursor");
          swal({
            title: "Warning!",
            text: jsonData.message,
            icon: "warning",
          });
        }
      },
    });
  }
});
