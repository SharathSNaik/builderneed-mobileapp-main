var getsource = "";
var iscom = "";
var flag = 1;
$(document).ready(function () {
  showSummary();
  $(".upcoming").click(function () {
    var val = "left";
    var count = 0;
    $(".target").each(function () {
      $(this).toggle($(this).text().toLowerCase().includes(val));
      if ($(this).text().toLowerCase().includes(val)) {
        count++;
      }
    });
    if (count <= 0) {
      $(".nodataSchedule").html(
        "<div class='col-12 py-3 mt-3 bg-white rounded'><center><span class='text-danger'><i class='fa fa-exclamation-circle'></i> No upcoming Events</span></center></div>"
      );
    } else {
      $(".nodataSchedule").html("");
    }
  });
  $(".all").click(function () {
    var val = "";
    var counts = 0;
    $(".target").each(function () {
      $(this).toggle($(this).text().toLowerCase().includes(val));
      if ($(this).text().toLowerCase().includes(val)) {
        counts++;
      }
    });
    if (counts <= 0) {
      $(".nodataSchedule").html(
        "<div class='col-12 py-3 mt-3 bg-white rounded'><center><span class='text-danger'><i class='fa fa-exclamation-circle'></i> No Events found</span></center></div>"
      );
    } else {
      $(".nodataSchedule").html("");
    }
  });
});

function cancelEvent(vid, div) {
  // $(".cancelbtn").attr("style", "pointer-events:none");
  $(".swal-overlay").show();
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
        url: "source/backend/delete-events.php",
        data: {
          vid: vid,
        },
        success: function (response) {
          var jsonData = JSON.parse(response);
          if (jsonData.status == "OK") {
            $(".target").remove();
            showSummary();
            // $(".div_" + div).remove();
            swal("Canceled!", jsonData.message, "success");
            if ($("div").hasClass("widget-style3")) {
              $(".cancelbtn").attr("style", "pointer-events:cursor");
            }
            // else {
            //   window.location.href = "schedule.php";
            // }
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
  window.swal({
    icon: "../assets/img/loader.gif",
    button: false,
    closeOnClickOutside: false,
  });
  $.ajax({
    type: "POST",
    url: "source/backend/summary-events.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        $(".swal-overlay").hide();
        for (var i = 0; i < jsonData.data.length; i++) {
          //Current Date
          var lid = jsonData.data[i].lid;
          var d = new Date();
          var button = "";
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
          var classtodel = jsonData.data[i].vid;
          var dbtime = jsonData.data[i].datatime;
          var getdate = dbtime.split(" ")[0];
          var date1 = new Date(output);
          var date2 = new Date(getdate);
          var dit = date2.getTime() - date1.getTime();
          var did = dit / (1000 * 3600 * 24);
          var cls = "";
          var agent = jsonData.data[i].agent;
          if (agent == null) {
            agent = "Not Assigned";
          } else {
            agent = jsonData.data[i].agent;
          }
          var btnurl = "";
          var link = "";
          if (
            jsonData.data[i].url == "null" ||
            jsonData.data[i].url == undefined ||
            jsonData.data[i].url == ""
          ) {
            link = "";
          } else {
            link = jsonData.data[i].url;
          }
          if (did <= 0) {
            did = "Completed";
            cls = "text-success";
            button =
              "<a href='conversations.php?name=" +
              jsonData.data[i].usname +
              "&pid=" +
              jsonData.data[i].pid +
              "&lid=" +
              lid +
              "&vid=" +
              jsonData.data[i].vid +
              "'><div class='btn w-100 bg-primary text-white'>CONVERSATION</div></a>";
          } else {
            did = dit / (1000 * 3600 * 24) + "  Days Left";
            iscom =
              "<a href='conversations.php?name=" +
              jsonData.data[i].usname +
              "&pid=" +
              jsonData.data[i].pid +
              "&lid=" +
              lid +
              "&vid=" +
              jsonData.data[i].vid +
              "'><div class='btn w-100 bg-primary text-white'>COMPLETED ?</div><div style='height:10px;'></div></a>";
            cls = "text-danger";
            if (jsonData.data[i].mode == "Virtual") {
              btnurl =
                "<input type='text' class='form-control' value='" +
                link +
                "' placeholder='Enter url for a Virtual site visit' onblur='updateUrl(" +
                jsonData.data[i].vid +
                "," +
                lid +
                ",this);'><button class='btn btn-sm btn-success btnpos'><i class='fa fa-link'></i></button><br>";
              button =
                "" +
                btnurl +
                "" +
                iscom +
                "<div class='btn w-100 bg-danger text-white cancelbtn' onclick='cancelEvent(" +
                jsonData.data[i].vid +
                "," +
                classtodel +
                ");'>CANCEL</div>";
            }
          }
          if (jsonData.data[i].canceled == "5") {
            cls = "text-danger";
            did = "Cancelled";
            flag = 0;
            button = "";
            getsource = jsonData.data[i].source;
          } else {
            if (jsonData.data[i].mode == "Virtual") {
              getsource = jsonData.data[i].source;
              if (flag == 0) {
                btnurl = "";
              }
            } else {
              getsource = jsonData.data[i].source;
            }
          }
          $(".get_summary").append(
            '<div style="margin-bottom:10px;" class="target bg-white box-shadow border-radius-10 widget-style3 div_' +
              jsonData.data[i].vid +
              '"><table class="table"><tbody><tr><th scope="row">Visit Date & Time</th><td class="font-weight-bold">:</td><td class="text-right">' +
              jsonData.data[i].datatime +
              '</td></tr><tr><th scope="row">Mode</th><td class="font-weight-bold">:</td><td class="text-right">' +
              getsource +
              "," +
              jsonData.data[i].mode +
              '</td></tr><tr><th scope="row">Lead Name</th><td class="font-weight-bold">:</td><td class="text-right">' +
              jsonData.data[i].usname +
              '</td></tr><tr><th scope="row">Status</th><td class="font-weight-bold">:</td><td class="text-right ' +
              cls +
              '">' +
              did +
              "</td></tr></tbody></table><center></center>" +
              button +
              "</div>"
          );
        }
      } else {
        $(".swal-overlay").show();
        window.location.href = "homepage.php";
      }
    },
  });
}

function updateUrl(vid, lid, e) {
  var linku = $(e).val();
  // $(".swal-overlay").show();
  $.ajax({
    type: "POST",
    url: "source/backend/update-url.php",
    data: {
      link: linku,
      lid: lid,
      vid: vid,
    },
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        $(".swal-overlay").hide();
        // alert("im gere");
      } else {
        $(".swal-overlay").hide();
      }
    },
  });
}
