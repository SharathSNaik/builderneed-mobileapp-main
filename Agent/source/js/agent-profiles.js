$(document).ready(function () {
  $(".view-name").hide();
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
    url: "source/backend/agent-profile.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        $('.nameInitials').text(jsonData.name[0]);
        $(".site_logo").attr("src", jsonData.logo);
        $(".loader-line").hide();
        $(".view-name").show();
        $(".user-name").html(jsonData.name);
        $(".userno").html("+91" + jsonData.phone);
        $(".usernameprof").html("@" + jsonData.name);
        $(".usernameprofile").html(jsonData.name);
        $(".useremail").html(jsonData.email);
        $(".userno").val(jsonData.phone);
        $(".usernameprof").val("@" + jsonData.name);
        $(".usernameprofile").val(jsonData.name);
        $(".useremail").val(jsonData.email);
        $(".agentAssigned").text("Agent : " + jsonData.name);
        $(".header_name").text(jsonData.pname);
      } else {
        window.location.href = "index.php";
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
          url: "source/backend/agent-profile.php",
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
