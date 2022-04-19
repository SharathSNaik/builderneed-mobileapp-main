$(document).ready(function () {
  $(".view-name").hide();
  $(".project4").hide();
  //Load User Profile
  $(".editUserdata").hide();
  loadUserData();

  //Edit User Profile
  $(".edit-profile-btn").click(function () {
    $(".userLoaddata").hide();
    $(".editUserdata").fadeIn().show();
  });
  $(".saveUserprofile").click(function () {
    editUserData();
  });
  //Go back
  $(".Cancel_user").click(function () {
    $(".editUserdata").fadeIn().hide();
    $(".userLoaddata").fadeIn().show();
  });
  //Image Validation
  $(document).on("change", "#fileToUpload", function () {
    var property = document.getElementById("photo").files[0];
    var image_name = property.name;
    var image_extension = image_name.split(".").pop().toLowerCase();

    if (jQuery.inArray(image_extension, ["jpg", "jpeg", "png", ""]) == -1) {
      swal("Warning!", "Invalid image file", "warning");
    }

    var form_data = new FormData();
    form_data.append("file", property);
    $.ajax({
      url: "source/backend/upload.php",
      method: "POST",
      data: form_data,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        $("#msg").html("Loading......");
      },
      success: function (data) {
        console.log(data);
        $(".dataprof").attr("src", data);
      },
    });
  });
  //Validation
  $(".usernum").keyup(function () {
    if (!phoneVal()) {
      $(".saveUserprofile").attr("style", "pointer-events:none;");
      $(".errorPhone").text("Please Enter a valid 10 digit phone number");
    } else {
      $(".saveUserprofile").attr("style", "pointer-events:cursor;");
      $(".errorPhone").text("");
    }
  });
  $(".userem").keyup(function () {
    if (!emailVal()) {
      $(".saveUserprofile").attr("style", "pointer-events:none;");
      $(".errorMail").text("Please Enter a valid email");
    } else {
      $(".saveUserprofile").attr("style", "pointer-events:cursor;");
      $(".errorMail").text("");
    }
  });
});

function loadUserData() {
  $(".userLoaddata").show();
  $.ajax({
    type: "POST",
    url: "source/backend/user-profile.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        if (jsonData.pid != 4) {
        } else {
          $(".project4").show();
        }
        $(".nameInitials").html(jsonData.name[0]);
        if (localStorage.getItem("name") == jsonData.name) {
        } else {
          localStorage.removeItem("name");
          localStorage.setItem("name", jsonData.name);
        }
        if (localStorage.getItem("phone") == jsonData.phone) {
        } else {
          localStorage.removeItem("phone");
          localStorage.setItem("phone", jsonData.phone);
        }
        if (localStorage.getItem("email") == jsonData.email) {
        } else {
          localStorage.removeItem("email");
          localStorage.setItem("email", jsonData.email);
        }
        if (localStorage.getItem("aname") == jsonData.aname) {
        } else {
          localStorage.removeItem("aname");
          localStorage.setItem("aname", jsonData.aname);
        }
        if (localStorage.getItem("pname") == jsonData.pname) {
        } else {
          localStorage.removeItem("pname");
          localStorage.setItem("pname", jsonData.pname);
        }
        if (localStorage.getItem("prof") == jsonData.img) {
        } else {
          localStorage.removeItem("prof");
          localStorage.setItem("prof", jsonData.img);
        }
        if (localStorage.getItem("logo") == jsonData.slogo) {
        } else {
          localStorage.removeItem("logo");
          localStorage.setItem("logo", jsonData.slogo);
        }

        if (
          jsonData.img == "" ||
          jsonData.img == null ||
          jsonData.img == "null"
        ) {
        } else {
          $(".dataprof").attr("src", "../uploads/" + jsonData.img);
        }
        $(".loader-line").hide();
        $(".view-name").show();
        $(".user-name").html(jsonData.name);
        $(".userno").html("+91" + jsonData.phone);
        $(".usernameprof").html("@" + jsonData.name);
        $(".usernameprofile").html(jsonData.name);
        $(".useremail").html(jsonData.email);
        $(".userno").val(jsonData.phone);
        $("#email_v").val(jsonData.email);
        $("#phone_v").val(jsonData.phone);
        $(".usernameprof").val("@" + jsonData.name);
        $(".usernameprofile").val(jsonData.name);
        $(".useremail").val(jsonData.email);
        $(".agentAssigned").text("Agent : " + jsonData.aname);
        $(".header_name").text(jsonData.pname);
        $(".img-fluid").attr("src", jsonData.slogo);
        $(".site_logo").attr("src", jsonData.slogo);
      } else {
        window.location.href = "../index.php";
      }
    },
  });
}

//Edit UserProfile
function editUserData() {
  $(".saveUserprofile").attr("style", "pointer-events:none");
  var phone = $(".usernum").val();
  var name = $(".UserProf").val();
  var email = $(".userem").val();
  $.ajax({
    type: "POST",
    url: "source/backend/edit-profile.php",
    data: { phone: phone, name: name, email: email },
    success: function (response) {
      var jsonDatas = JSON.parse(response);
      if (jsonDatas.status == "OK") {
        swal({
          title: "Success!",
          text: jsonDatas.message,
          icon: "success",
        });
        $(".editUserdata").fadeIn().hide();
        $(".userLoaddata").show();
        $.ajax({
          type: "POST",
          url: "source/backend/user-profile.php",
          success: function (response) {
            var jsonData = JSON.parse(response);
            if (jsonData.status == "OK") {
              $(".user-name").html(jsonData.name);
              $(".userno").html("+91" + jsonData.phone);
              $(".usernameprof").html("@" + jsonData.name);
              $(".usernameprofile").html(jsonData.name);
              $(".useremail").html(jsonData.email);
              $(".userno").val(jsonData.phone);
              $(".usernameprof").val("@" + jsonData.name);
              $(".usernameprofile").val(jsonData.name);
              $(".useremail").val(jsonData.email);
            } else {
              window.location.href = "../index.php";
            }
          },
        });
      } else {
        swal({
          title: "Warning!",
          text: jsonDatas.message,
          icon: "error",
        });
      }
    },
  });
}

function phoneVal() {
  var pattern = /^[0-9]+$/;
  var phone = $(".usernum").val();
  if (phone.match(pattern) && phone.length >= 10) {
    return true;
  } else {
    return false;
  }
}

function emailVal() {
  var pattern =
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var email = $(".userem").val();
  if (email.match(pattern)) {
    return true;
  } else {
    return false;
  }
}
