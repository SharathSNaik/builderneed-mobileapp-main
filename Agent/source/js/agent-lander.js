var forurl = "";
$(document).ready(function () {
  $(".dataLoad").attr("style", "pointer-events:none");
  $(".owl-carousel").owlCarousel({
    nav: true,
    items: 5,
  });
  // $.ajax({
  //   type: "POST",
  //   url: "source/backend/getimages.php",
  //   success: function (response) {
  //     var jsonData = JSON.parse(response);
  //     if (jsonData.status == "OK") {
  //       var len = jsonData.data_img.length;
  //       if (len > 5) {
  //         len = 5;
  //       } else {
  //         len = jsonData.data_img.length;
  //       }
  //       for (var i = 0; i < len; i++) {
  //         $(".hero-slides")
  //           .trigger("add.owl.carousel", [
  //             '<div class="single-hero-slide p-3 mb-2 bg-secondary" style="background-image: url(' +
  //               jsonData.data_img[i].image +
  //               ');"></div>',
  //           ])
  //           .trigger("refresh.owl.carousel");
  //       }
  //       $(".sliderremove").remove();
  //     } else {
  //       console.log("Owner needs to add image");
  //     }
  //   },
  // });
  if (window.location.toString().indexOf("archived") != -1) {
    $(".hidehere").hide();
  }
  $(".loader-spin").show();
  $(".add_lead").hide();
  $(".activel").hide();
  $(".closebar").hide();
  $(".view-name").hide();
  $(".status").hide();
  $(".showall").hide();
  $(".fixed").hide();
  $(".leads-assign").hide();
  $.ajax({
    type: "POST",
    url: "source/backend/get-sourceID.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        $(".loader-line").hide();
        $(".view-name").show();
        $(".header_name").text(jsonData.project);
      }
    },
  });
  //Home
  if (window.location.toString().indexOf("homepage") != -1) {
    analytics();
  } else {
    analytics();
    forurl = "lead=1";
  }
  var olen = 0;

  //URL Filter
  $.ajax({
    type: "POST",
    url: "source/backend/lander.php?" + forurl,
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        if (jsonData.data.length == 0) {
          $(".loader-spin").hide();
          $(".input-container").hide();
          $(".noLeads").hide();
          $(".nodata").html(
            "<div class='col-12 py-3 mt-3 bg-white rounded'><center><span class='text-danger'><i class='fa fa-exclamation-circle'></i> No Leads found</span><br><a href='lead-register.php'>Add Lead</a></center></div>"
          );
          $(".add_lead").show();
        } else {
          $(".input-container").show();
          $(".activel").show();
        }
        $(".hideLeadCard").fadeIn().hide();
        if (jsonData.data.length >= 5) {
          olen = 5;
        } else {
          olen = jsonData.data.length;
        }
        for (var i = 0; i < olen; i++) {
          var names = jsonData.data[i].name;
          var array = names.split(" ");
          var name = array[0];
          $(".loader-spin").hide();
          $(".showall").show();
          $(".dataCard")
            .trigger("add.owl.carousel", [
              '<div class="card flash-sale-card"><div class="card-body"><a href="user-profile.php?lid=' +
                jsonData.data[i].lid +
                '"><center><div class="circleDATA"><span class="nameOfUser">' +
                names.trim()[0].toUpperCase() +
                '</span></div></center><br><span class="product-title">' +
                jsonData.data[i].name +
                '</span><span class="progress-title">' +
                jsonData.data[i].percentage +
                '% Lead Score</span><div class="progress"><div class="progress-bar" role="progressbar" style="width: ' +
                jsonData.data[i].percentage +
                '%" aria-valuenow="' +
                jsonData.data[i].percentage +
                '" aria-valuemin="0" aria-valuemax="100"></div></div></a></div></div>',
            ])
            .trigger("refresh.owl.carousel");
        }
        for (var i = 0; i < jsonData.data.length; i++) {
          var colors = "style ='border: 3px solid red'";
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
          $(".loader-spin").hide();
          $(".showall").show();

          if (jsonData.agent_role === "1") {
            $('.sidebardetail').hide();
            $(".leads-assign").show();
            var style = "";
            var class_ = "";
            if (jsonData.data[i].agentassn == "Not Defined") {
              style = "border:0.5px solid #ff00004a";
              class_ = "text-danger";
            }

            $(".afterActive").append(
              '<div class="target bg-white text-dark mt-2" style="border-radius:13px;' +
                style +
                '""><div style="border-radius:13px;margin-left:5px;" class="py-2 bg-white"><div class="row" style="padding-left:10px;padding-right:10px;"><div class="divtest col-6 mt-2" id="headingOne' +
                leadid +
                '" data-toggle="collapse" data-target="#collapseOne' +
                leadid +
                '" aria-expanded="true" aria-controls="collapseOne' +
                leadid +
                '"><span class="font-weight-bold">&nbsp;' +
                name +
                '</span></div><div class="col"></div><div class="col"><a  target="_blank"  href=tel:' +
                jsonData.data[i].phone +
                '><div class="circle" ' +
                colors +
                '><i class="fa fa-phone"></i></div></a></div></div></div><div id="collapseOne' +
                leadid +
                '" class="collapse" aria-labelledby="headingOne' +
                leadid +
                '" data-parent="#accordionExample"><hr><div class="px-3"><span class="font-weight-bold"><i class="fa fa-info-circle text-success"></i> Status :</span> <span  class="status_db' +
                leadid +
                '">' +
                status +
                '</span></div><br><div><div class="row text-center"><div class="col-3"><center><div  class="status-info" data-lid="' +
                leadid +
                '"style="background: white;height:50px;width:50px;border-radius:50%;box-shadow: 2px 2px 10px #888888;"><i class="fa fa-info-circle"  style="color: #100DD1;line-height:2.5;"></i></div></center></div><div class="col-3"><center><a href="schedule.php?leadid=' +
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
          } else {
            $(".leads-assign").hide();
            $(".afterActive").append(
              '<div class="target bg-white text-dark mt-2" style="border-radius:13px;"><div style="border-radius:13px;margin-left:5px;" class="py-2 bg-white"><div class="row" style="padding-left:10px;padding-right:10px;"><div class="divtest col-6 mt-2" id="headingOne' +
                leadid +
                '" data-toggle="collapse" data-target="#collapseOne' +
                leadid +
                '" aria-expanded="true" aria-controls="collapseOne' +
                leadid +
                '"><span class="font-weight-bold">&nbsp;' +
                name +
                '</span></div><div class="col"></div><div class="col"><a  target="_blank"  href=tel:' +
                jsonData.data[i].phone +
                '><div class="circle" ' +
                colors +
                '><i class="fa fa-phone"></i></div></a></div></div></div><div id="collapseOne' +
                leadid +
                '" class="collapse" aria-labelledby="headingOne' +
                leadid +
                '" data-parent="#accordionExample"><hr><div class="px-3"><span class="font-weight-bold"><i class="fa fa-info-circle text-success"></i> Status :</span> <span  class="status_db' +
                leadid +
                '">' +
                status +
                '</span></div><br><div><div class="row text-center"><div class="col-3"><center><div class="status-info" data-lid="' +
                leadid +
                '" style="background: white;height:50px;width:50px;border-radius:50%;box-shadow: 2px 2px 10px #888888;"><i class="fa fa-info-circle"  style="color: #100DD1;line-height:2.5;"></i></div></center></div><div class="col-3"><center><a href="schedule.php?leadid=' +
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
                ");><span>Not Interested</span></div></div><div class='py-2'><span style='display:none;'>"+jsonData.data[i].pnamedata+"</span></div></div></div></div></div></div></div></div>"
            );
          }
        }
        $(".updated").hide();
        if (window.location.toString().indexOf("hotlead") != -1) {
          val = "v6";
          filter(val);
        }
        $(".dataLoad").attr("style", "pointer-events:cursor");
        if (window.location.toString().indexOf("homepage") != -1) {
          val = "v6";
          filter(val);
        }

        if (window.location.toString().indexOf("completed") != -1) {
          val = "v4";
          filter(val);
        }

        if (window.location.toString().indexOf("firstcall") != -1) {
          val = "v7";
          filter(val);
        }

        if (window.location.toString().indexOf("archived") != -1) {
          $(".hidehere").hide();
          val = "v5";
          filter(val);
        } else {
          $(".target").each(function () {
            if ($(".target").find(".v5").text().length > 0) {
              // $(".target").find(".v5").addClass("d-none");
              $(".target p.v5")
                .parent()
                .parent()
                .parent()
                .parent()
                .addClass("d-none");
            }
          });
        }

        $(".divtest").click(function (e) {
          $(".status").hide();
        });
        $(".status-info").click(function (e) {
          var lead_id = $(this).attr("data-lid");
          window.location.href = "user-profile.php?lid=" + lead_id;
        });

        $(".agents").append("<option selected hidden disabled>SELECT</option>");
        for (var i = 0; i < jsonData.datasales.length; i++) {
          $(".agents").append(
            "<option value=" +
              jsonData.datasales[i].agentid +
              ">" +
              jsonData.datasales[i].name +
              "</option>"
          );
        }
      } else {
      }
    },
  });

  $("#Search").on("keyup", function () {
    var count = 0;
    val = $(this).val().toLowerCase();
    $(".target").each(function () {
      $(this).toggle($(this).text().toLowerCase().includes(val));
      if ($(this).text().toLowerCase().includes(val)) {
        count++;
      }
    });
    if (count <= 0) {
      $(".nodatas").html(
        "<div class='col-12 py-3 mt-3 bg-white rounded'><center><span class='text-danger'><i class='fa fa-exclamation-circle'></i> No Leads found</span></center></div>"
      );
    } else {
      $(".nodatas").html("");
    }
  });

  $('.slectproject').on('change', function() {
    var count = 0;
    val = $(this).val().toLowerCase();
    $(".target").each(function () {
      $(this).toggle($(this).text().toLowerCase().includes(val));
      if ($(this).text().toLowerCase().includes(val)) {
        count++;
      }
    });
    if (count <= 0) {
      $(".nodatas").html(
        "<div class='col-12 py-3 mt-3 bg-white rounded'><center><span class='text-danger'><i class='fa fa-exclamation-circle'></i> No Leads found</span></center></div>"
      );
    } else {
      $(".nodatas").html("");
    }
  });

  $(".sitevisitfil").click(function () {
    val = "visit1";
    filter(val);
  });
  $(".hotleads").click(function () {
    val = "v6";
    filter(val);
  });
  $(".fcall").click(function () {
    val = "v7";
    filter(val);
  });
  $(".notAns").click(function () {
    val = "v8";
    filter(val);
  });
  $(".naInt").click(function () {
    val = "15";
    filter(val);
  });
  $(".all").click(function () {
    val = "move";
    filter(val);
  });
});

function assignedAgent(e) {
  var aid = $(e).val();
  var lid = $(e).attr("data-val");
  assign_agent(aid, lid);
}

function firstcall() {
  val = "v7";
  filter(val);
}
function hotleadData() {
  val = "v6";
  filter(val);
}

function checkThis() {
  setTimeout(function () {
    $(".target").each(function () {
      if ($(".target").find(".v5").text().length > 0) {
        // alert("im here");
        $(".target p.v5")
          .parent()
          .parent()
          .parent()
          .parent()
          .fadeIn()
          .addClass("d-none");
      }
    });
  }, 1000);
  // swal({
  //   position: "top-end",
  //   icon: "success",
  //   title: "Your work has been saved",
  //   showConfirmButton: false,
  //   timer: 1500,
  // });
  swal({
    position: "top-end",
    title: "Lead Moved to archived list.",
    showConfirmButton: false,
    timer: 2000,
  });
}

function assign_agent(aid, lid) {
  $.ajax({
    type: "POST",
    url: "source/backend/assign-agenttolead.php",
    data: {
      lid: lid,
      aid: aid,
    },
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        location.reload();
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

// $(".closebar").click(function () {
//   $(".closebar").fadeOut().hide();
//   $(".fixed").hide();
// });

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
        analytics();
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

function reminderShow(e) {
  var name = $(e).attr("data-name");
  var phone = $(e).attr("data-phone");
  var lid = $(e).attr("data-lid");
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
          analytics();
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

function filter(val) {
  var count = 0;
  $(".target").each(function () {
    $(this).toggle($(this).text().toLowerCase().includes(val));
    if ($(this).text().toLowerCase().includes(val)) {
      count++;
    }
  });
  if (count <= 0) {
    $(".nodatas").html(
      "<div class='col-12 py-3 mt-3 bg-white rounded'><center><span class='text-danger'><i class='fa fa-exclamation-circle'></i> No Leads found</span></center></div>"
    );
  } else {
    $(".nodatas").html("");
  }
}

function setLID(e) {
  $("#unlid").val(e);
}

function setUnit() {
  var uno = $("#uno").val();
  var lid = $("#unlid").val();
  var price = $("#amtdsc").val();

  if (uno == "" || lid == "" || price == "") {
    $(".remErre").html("Please Fill all the details!");
  } else {
    $.ajax({
      type: "POST",
      url: "source/backend/add-toinven.php",
      data: {
        lid: lid,
        uno: uno,
        price: price,
      },
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status == "OK") {
          $(".close").click();
          swal({
            title: "Success!",
            text: jsonData.message,
            icon: "success",
          });
          $("#unlid").val("");
          $("#amtdsc").val("");
          analytics();
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
