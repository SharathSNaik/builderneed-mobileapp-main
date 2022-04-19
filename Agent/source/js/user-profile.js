var url_string = window.location;
var url = new URL(url_string);
var match = url.searchParams.get("lid");
$(document).ready(function () {
  if (match > 0) {
    loadUserList();
    showleadReminder(match);
  } else {
    window.location.href = "homepage.php";
  }
});

function loadUserList() {
  $.ajax({
    type: "POST",
    url: "source/backend/user-profile.php",
    data: {
      match: match,
    },
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        $(".uname").text(jsonData.data[0].name);
        $(".nameInitialUser").text(jsonData.data[0].name[0]);
        console.log(jsonData.data[0].updated);
        $(".leadScore").text(jsonData.data[0].percentage + "% Lead Score");
        $(".lSpb").attr("style", "width:" + jsonData.data[0].percentage + "%");
        $(".lSpb").attr("aria-valuenow", jsonData.data[0].percentage);
        var date = jsonData.data[0].updated;
        date = date.substring(0, date.length - 2);
        const timestamp = moment(date).fromNow();
        var phone = jsonData.data[0].phone;
        $(".update").text(timestamp);
        $(".Chat").html(
          '<a style="text-decoration:none;color:white;font-weight:900" href="https://api.whatsapp.com/send?phone=91' +
            phone +
            '"><i class="fa fa-whatsapp"></i> Chat</a>'
        );
        $(".Call").html(
          ' <a style="text-decoration:none;color:white;font-weight:900" href="tel:' +
            phone +
            '"><i class="fa fa-phone"></i> Call</a>'
        );
        $(".uname").text(jsonData.data[0].name);

        //Listings
        var colors = "style ='border: 3px solid red'";
        var i = 0;
        var pid = jsonData.data[i].project;
        var source = jsonData.data[i].project;
        var status = jsonData.data[i].status;
        var leadid = jsonData.data[i].lid;
        var email = jsonData.data[i].lid;
        if (status == null || status == "null" || status == "0") {
          status = "Not Assigned";
        } else if (status == 1) {
          status = "Visit 1 Completed <p style='display:none'>visit1</p>";
        } else if (status == 2) {
          status = "Visit 2 Completed <p style='display:none'>v2</p>";
        } else if (status == 3) {
          status = "Unit Shortlisting <p style='display:none'>v3</p>";
        } else if (status == 4) {
          status = "Move to buyer <p style='display:none'>v4</p>";
        } else if (status == 5) {
          status = "Not Interested <p style='display:none' class='v5'>v5</p>";
        } else if (status == 6) {
          status = "Hot Leads <p style='display:none'>v6</p>";
        } else if (status == 7) {
          colors = "style ='border: 3px solid #BADA55'";
          status = "First Call <p style='display:none'>v7</p>";
        } else if (status == 8) {
          status = "Not Answered <p style='display:none'>v8</p>";
        }
        var names = jsonData.data[i].name;
        var array = names.split(" ");
        var name = array[0];
        reminderShow(names, phone, leadid);
        $(".loader-spin").hide();
        $(".showall").show();
        $(".leads-assign").show();
        var style = "";
        var class_ = "";
        if (jsonData.data[i].agentassn == "Not Defined") {
          style = "border:0.5px solid #ff00004a";
          class_ = "text-danger";
        }

        $(".afterActive").append(
          '<div class="target bg-white text-dark mt-2" style="margin-left: -4%;margin-right: -4%;border-radius:13px;' +
            style +
            '""><div style="border-radius:13px;" class="py-3 bg-white" id="headingOne' +
            leadid +
            '" data-toggle="collapse" data-target="#collapseOne' +
            leadid +
            '" aria-expanded="true" aria-controls="collapseOne' +
            leadid +
            '"><div class="row" style=""><div class="divtest col-6 mt-2"><span class="font-weight-bold">User Settings</span></div><div class="col"></div><div class="col" style="margin-top: 2%;"><i class="fa fa-chevron-down"></i></div></div></div><div id="collapseOne' +
            leadid +
            '" class="collapse" aria-labelledby="headingOne' +
            leadid +
            '" data-parent="#accordionExample" style=""><br><div><div class="row text-center"><div class="col-3"><center><div class="status-info" style="background: white;height:50px;width:50px;border-radius:50%;box-shadow: 2px 2px 10px #888888;"><i class="fa fa-info-circle"  style="color: #100DD1;line-height:2.5;"></i></div></center></div><div class="col-3"><center><a href="schedule.php?leadid=' +
            leadid +
            "&phone=" +
            jsonData.data[i].phone +
            "&email=" +
            jsonData.data[i].email +
            '"><div class="sitvisit" style="background: white;height:50px;width:50px;border-radius:50%;box-shadow: 2px 2px 10px #888888;"><i class="fa fa-clock-o"  style="color: #100DD1;line-height:2.5;"></i></div></a></center></div><div class="col-3"><center><div style="color: #100DD1;background: white;height: 50px;width:50px;border-radius:50%;box-shadow: 2px 2px 10px #888888;" onclick="reminderShow(this);" data-name ="' +
            name +
            '" data-phone="' +
            jsonData.data[i].phone +
            '" data-lid="' +
            leadid +
            '" data-toggle="modal" data-target="#basicModal"><i class="fa fa-bell" style="color: #100DD1;line-height:2.5;"></i></div></center></div><div class="col-3"><center><div style="background: white;height: 50px;width:50px;border-radius:50%;box-shadow: 2px 2px 10px #888888;" class="trigger" data-phone="' +
            jsonData.data[i].phone +
            '" data-email="' +
            jsonData.data[i].email +
            '" onclick="trigger(this);" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-envelope-open" style="color: #100DD1;line-height:2.5;"></i></div></center></div><div class="status py-1 px-3 mt-2"><hr><div onclick=statusUpdate(this,7,' +
            leadid +
            ");><span>First Call</span><hr></div><div onclick=statusUpdate(this,8," +
            leadid +
            ");><span>Not Answered</span><hr></div><div onclick=statusUpdate(this,6," +
            leadid +
            ");><span>Hot Lead</span></div><hr><div onclick=statusUpdate(this,1," +
            leadid +
            ");><span>Visit 1 Completed</span><hr></div><div onclick=statusUpdate(this,2," +
            leadid +
            ");><span>Visit 2 Completed</span><hr></div><div onclick=setLID(" +
            leadid +
            ") data-toggle='modal' data-target='#exampleModals' onclick=statusUpdate(this,3," +
            leadid +
            ");><span>Unit Shortlisting</span><hr></div><div  onclick=statusUpdate(this,4," +
            leadid +
            ");><span>Move to buyer</span><hr></div><div onclick=statusUpdate(this,5," +
            leadid +
            ");><span>Not Interested</span></div></div><div class='py-2'></div></div></div></div></div></div></div></div>"
        );
        $(".divtest").click(function (e) {
          $(".status").hide();
        });
        $(".status-info").click(function (e) {
          $(".status").toggle("show,hide");
        });
      } else {
        swal("Error!", jsonData.message, "warning");
      }
    },
  });
}

function trigger(e) {
  // $(".closebar").show();
  var phone = "+91" + $(e).attr("data-phone");
  var email = $(e).attr("data-email");
  $(".fixed").show();
  $(".fixed").append(
    '<div class="row"><div><a class="text-dark" href="https://api.whatsapp.com/send?phone=' +
      phone +
      '"><i class="fa fa-whatsapp"></i> Whatsapp<hr></a></div><div><a class="text-dark" href="mailto:' +
      email +
      '"><i class="fa fa-envelope"></i> E-mail<hr></a></div><div><a class="text-dark" href="tel:' +
      phone +
      '"><i class="fa fa-comment"></i> SMS</a><hr></div></div>'
  );
}

function statusUpdate(e, statid, leadid) {
  var clastat = ".status_db" + leadid;
  $.ajax({
    type: "POST",
    url: "source/backend/updateleadstatus.php",
    data: {
      statid: statid,
      leadid: leadid,
    },
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        $(clastat).html(
          $(e).find("span").text() +
            '<p style="display:none" class="thisdata"></p>'
        );
        if (statid == "1") {
          $(clastat).find(".thisdata").text("visit1");
        }
        if (statid == "2") {
          $(clastat).find(".thisdata").text("v2");
        }
        if (statid == "3") {
          $(clastat).find(".thisdata").text("v3");
        }
        if (statid == "4") {
          $(clastat).find(".thisdata").text("v4");
        }
        if (statid == "5") {
          $(clastat).find(".thisdata").text("v5");
          $(clastat).find(".thisdata").addClass("v5");
          checkThis();
        }
        if (statid == "6") {
          $(clastat).find(".thisdata").text("v6");
        }
      } else {
        swal({
          title: "Warning!",
          text: jsonData.message,
          icon: "warning",
        });
      }
    },
  });
}

function reminderShow(name, phone, lid) {
  $("#remName").val(name);
  $("#remPhone").val(phone);
  $("#leadID").val(lid);
  $("#nleadID").val(lid);
  $("#noteName").val(name);
  $("#notePhone").val(phone);
  $("#uleadID").val(lid);
  $("#uremName").val(name);
  $("#uremPhone").val(phone);
  $("#unleadID").val(lid);
  $("#unoteName").val(name);
  $("#unotePhone").val(phone);
  $(".remperlead").attr("data-val", lid);
  $(".notesperlead").attr("data-val", lid);
  $(".remperlead").attr("data-name", name);
  $(".notesperlead").attr("data-name", name);
}

function setReminder() {
  var name = $("#remName").val();
  var phone = $("#remPhone").val();
  var lid = $("#leadID").val();
  var nttitle = $("#nttitle").val();
  var datetime = $("#inputDate").val();
  var reason = $("#inputReason").val();
  var notes = $("#addNote").val();

  if (
    name == "" ||
    phone == "" ||
    lid == "" ||
    datetime == "" ||
    reason == "" ||
    notes == "" ||
    nttitle == ""
  ) {
    $(".remErr").html("Please Fill all the details!");
  } else {
    $.ajax({
      type: "POST",
      url: "source/backend/add-reminder.php",
      data: {
        name: name,
        phone: phone,
        lid: lid,
        datetime: datetime,
        reason: reason,
        nttitle: nttitle,
        notes: notes,
      },
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status == "OK") {
          $(".tclose").click();
          swal({
            title: "Success!",
            text: jsonData.message,
            icon: "success",
          });
          $("#inputDate").val("");
          $("#inputReason").val("");
          $("#addNotes").val("");
          showleadReminder(lid);
        } else {
          swal({
            title: "Warning!",
            text: jsonData.message,
            icon: "warning",
          });
        }
      },
    });
  }
}

function setNote() {
  var name = $("#noteName").val();
  var phone = $("#notePhone").val();
  var lid = $("#nleadID").val();
  var nttitle = $("#nnttitle").val();
  var datetime = "-";
  var reason = "0";
  var notes = $("#notetoadd").val();

  if (
    name == "" ||
    phone == "" ||
    lid == "" ||
    datetime == "" ||
    reason == "" ||
    notes == "" ||
    nttitle == ""
  ) {
    $(".remErr").html("Please Fill all the details!");
  } else {
    $.ajax({
      type: "POST",
      url: "source/backend/add-reminder.php",
      data: {
        name: name,
        phone: phone,
        lid: lid,
        datetime: datetime,
        reason: reason,
        nttitle: nttitle,
        notes: notes,
      },
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status == "OK") {
          $(".nclose").click();
          swal({
            title: "Success!",
            text: jsonData.message,
            icon: "success",
          });
          $("#inputDate").val("");
          $("#inputReason").val("");
          $("#addNotes").val("");
          $("#nnttitle").val("");
          $("#notetoadd").val("");
          showleadReminder(lid);
        } else {
          swal({
            title: "Warning!",
            text: jsonData.message,
            icon: "warning",
          });
        }
      },
    });
  }
}

function updateReminder() {
  var rid = $(".usaveRem").attr("data-val");
  var name = $("#uremName").val();
  var phone = $("#uremPhone").val();
  var lid = $("#uleadID").val();
  var nttitle = $("#unttitle").val();
  var datetime = $("#uinputDate").val();
  var reason = $("#uinputReason").val();
  var notes = $("#uaddNote").val();

  if (
    name == "" ||
    phone == "" ||
    lid == "" ||
    datetime == "" ||
    reason == "" ||
    notes == "" ||
    nttitle == "" ||
    rid == ""
  ) {
    $(".remErr").html("Please Fill all the details!");
  } else {
    $.ajax({
      type: "POST",
      url: "source/backend/update-reminder.php",
      data: {
        name: name,
        phone: phone,
        lid: lid,
        datetime: datetime,
        reason: reason,
        nttitle: nttitle,
        notes: notes,
        rid: rid,
      },
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status == "OK") {
          $(".utclose").click();
          swal({
            title: "Success!",
            text: jsonData.message,
            icon: "success",
          });
          $("#inputDate").val("");
          $("#inputReason").val("");
          $("#addNotes").val("");
          showleadReminder(lid);
          $(".reminfoer").show();
        } else {
          swal({
            title: "Warning!",
            text: jsonData.message,
            icon: "warning",
          });
        }
      },
    });
  }
}

function updateNotes() {
  var rid = $(".usaveRem").attr("data-val");
  var name = $("#uremName").val();
  var phone = $("#uremPhone").val();
  var lid = $("#uleadID").val();
  var nttitle = $("#unttitle").val();
  var datetime = "-";
  var reason = "0";
  var notes = $("#unotetoadd").val();
  alert(notes);
  if (
    name == "" ||
    phone == "" ||
    lid == "" ||
    datetime == "" ||
    reason == "" ||
    notes == "" ||
    nttitle == "" ||
    rid == ""
  ) {
    $(".remErr").html("Please Fill all the details!");
  } else {
    $.ajax({
      type: "POST",
      url: "source/backend/update-reminder.php",
      data: {
        name: name,
        phone: phone,
        lid: lid,
        datetime: datetime,
        reason: reason,
        nttitle: nttitle,
        notes: notes,
        rid: rid,
      },
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status == "OK") {
          $(".untclose").click();
          swal({
            title: "Success!",
            text: jsonData.message,
            icon: "success",
          });
          $("#inputDate").val("");
          $("#inputReason").val("");
          $("#addNotes").val("");
          showleadReminder(lid);
          $(".reminfoer").show();
        } else {
          swal({
            title: "Warning!",
            text: jsonData.message,
            icon: "warning",
          });
        }
      },
    });
  }
}
function analytics() {
  $.ajax({
    type: "POST",
    url: "source/backend/dashboard.php?" + forurl,
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        $(".leadCount").text(jsonData.leadCount);
        $(".hlCount").text(jsonData.hlead);
        $(".mtb").text(jsonData.mtb);
        $(".invent").text(jsonData.invent);
        $(".agsite").text(jsonData.agsite);
        $(".remin").text(jsonData.remin);
      }
    },
  });
}
function setLID(e) {
  $("#unlid").val(e);
}
