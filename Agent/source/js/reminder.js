$(document).ready(function () {
  showSummary();
  $(".completed").click(function () {
    var count = 0;
    var val = "completed";
    $(".target").each(function () {
      $(this).toggle($(this).text().toLowerCase().includes(val));
      if ($(this).text().toLowerCase().includes(val)) {
        count++;
      }
    });
    if (count <= 0) {
      $(".nodatas").html(
        "<div class='col-12 py-3 mt-3 bg-white rounded'><center><span class='text-danger'><i class='fa fa-exclamation-circle'></i> No Tasks found</span></center></div>"
      );
    } else {
      $(".nodatas").html("");
    }
  });
  $(".upcoming").click(function () {
    var count = 0;
    var val = "upcoming";
    $(".target").each(function () {
      $(this).toggle($(this).text().toLowerCase().includes(val));
      if ($(this).text().toLowerCase().includes(val)) {
        count++;
      }
    });
    if (count <= 0) {
      $(".nodatas").html(
        "<div class='col-12 py-3 mt-3 bg-white rounded'><center><span class='text-danger'><i class='fa fa-exclamation-circle'></i> No Tasks found</span></center></div>"
      );
    } else {
      $(".nodatas").html("");
    }
  });
  $(".all").click(function () {
    var count = 0;
    var val = "visit";
    $(".target").each(function () {
      $(this).toggle($(this).text().toLowerCase().includes(val));
      if ($(this).text().toLowerCase().includes(val)) {
        count++;
      }
    });
    if (count <= 0) {
      $(".nodatas").html(
        "<div class='col-12 py-3 mt-3 bg-white rounded'><center><span class='text-danger'><i class='fa fa-exclamation-circle'></i> No Tasks found</span></center></div>"
      );
    } else {
      $(".nodatas").html("");
    }
  });
});

function cancelEvent(vid, div) {
  $(".cancelbtn").attr("style", "pointer-events:none");
  swal({
    title: "Are you Sure ?",
    text: "You will not be able to recover this!",
    icon: "warning",
    buttons: {
      confirm: { text: "Ok", className: "sweet-warning" },
      cancel: "cancel",
    },
  }).then((will) => {
    if (will) {
      $.ajax({
        type: "POST",
        url: "source/backend/delete-reminder.php",
        data: {
          vid: vid,
        },
        success: function (response) {
          var jsonData = JSON.parse(response);
          if (jsonData.status == "OK") {
            $(".div_" + div).remove();
            swal("Canceled!", jsonData.message, "success");
            if ($("div").hasClass("widget-style3")) {
              $(".cancelbtn").attr("style", "pointer-events:cursor");
            } else {
              window.location.href = "reminders.php";
            }
          } else {
            swal("Error!", jsonData.message, "warning");
          }
        },
      });
    } else {
      swal("Canceled!", "Your Event is not canceled", "success");
    }
  });
}

function showSummary() {
  swal({
    icon: "../assets/img/loader.gif",
    button: false,
    closeOnClickOutside: false,
    timer: 5000,
  });
  $.ajax({
    type: "POST",
    url: "source/backend/reminder.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        for (var i = 0; i < jsonData.data.length; i++) {
          //Current Date
          var d = new Date();
          var name = jsonData.data[i].name;
          var phone = jsonData.data[i].lphone;
          var lid = jsonData.data[i].lid;
          var month = d.getMonth() + 1;
          var day = d.getDate();

          var output =
            d.getFullYear() +
            "-" +
            (month < 10 ? "0" : "") +
            month +
            "-" +
            (day < 10 ? "0" : "") +
            day;
          var dbtime = jsonData.data[i].datatime;
          var getdate = dbtime.split(" ")[0];
          var date1 = new Date(output);
          var date2 = new Date(getdate);
          var dit = date2.getTime() - date1.getTime();
          var did = dit / (1000 * 3600 * 24);
          var cls = "";
          var style = "";
          var sendmail = "";
          var agent = jsonData.data[i].agent;
          if (agent == null) {
            agent = "Not Assigned";
          } else {
            agent = jsonData.data[i].agent;
          }
          if (did < 0) {
            style =
              'style="border-style: solid;border-color: #04F404;border-width: thin;"';
            did = "Completed";
            cls = "text-success";
            var button = "";
          } else {
            did =
              dit / (1000 * 3600 * 24) +
              "  Days Left<p style='display:none'>upcoming</p>";
            cls = "text-danger";
            var classtodel = jsonData.data[i].vid;
            if (jsonData.data[i].canceled == "5") {
              did = "Cancelled";
              var button = "";
            } else {
              var button =
                "<div class='mt-2 btn w-100 bg-danger text-white'  data-name='" +
                name +
                "' data-lid='" +
                lid +
                "' data-phone='" +
                phone +
                "' onclick='reminderShow(this);' data-toggle='modal' data-target='#basicModal'>EDIT</div><div class='mt-2 btn w-100 bg-danger text-white cancelbtn' onclick='cancelEvent(" +
                jsonData.data[i].vid +
                "," +
                classtodel +
                ");'>CANCEL</div>";
              sendmail =
                "<div class='mt-2 btn w-100 bg-success text-white'>SEND MAIL</div>";
            }
          }
          $(".get_reminder").append(
            "<div " +
              style +
              ' class="target bg-white box-shadow border-radius-10 widget-style3 div_' +
              jsonData.data[i].vid +
              '"><table class="table"><tbody><tr><th scope="row">Visit Date & Time</th><td class="font-weight-bold">:</td><td class="text-right">' +
              jsonData.data[i].datatime +
              '</td></tr><tr><th scope="row">Reason</th><td class="font-weight-bold">:</td><td class="text-right">' +
              jsonData.data[i].reason +
              '</td></tr><tr><th scope="row">Status</th><td class="font-weight-bold">:</td><td class="text-right ' +
              cls +
              '">' +
              did +
              "</td></tr></tbody></table><span style='word-break: break-word;' class='mx-2'><b>Notes : </b>" +
              jsonData.data[i].notes +
              "</span>" +
              sendmail +
              "" +
              button +
              "</div><br>"
          );
        }
      } else {
        console.log(jsonData.message);
        $(".nodatas").html(
          "<div class='col-12 py-3 mt-3 bg-white rounded'><center><span class='text-danger'><i class='fa fa-exclamation-circle'></i> No Tasks found</span></center></div>"
        );
        // window.location.href = "homepage.php";
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
