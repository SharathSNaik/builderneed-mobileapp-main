$(document).ready(function () {
  showSummary();
});

function cancelEvent(vid, div) {
  $(".cancelbtn").attr("style", "pointer-events:none");
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
            $(".div_" + div).remove();
            swal("Canceled!", jsonData.message, "success");
            if ($("div").hasClass("widget-style3")) {
              $(".cancelbtn").attr("style", "pointer-events:cursor");
            } else {
              window.location.href = "schedule.php";
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
          var d = new Date();

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
          var arr = getdate.split("-");
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
          if (did < 0) {
            did = "Completed";
            cls = "text-success";
            var button = "";
          } else {
            did = dit / (1000 * 3600 * 24) + "  Days Left";
            cls = "text-danger";
            var classtodel = jsonData.data[i].vid;
            if (jsonData.data[i].canceled == "5") {
              did = "Cancelled";
              button = "";
            } else {
              var link = jsonData.data[i].url;
              var join = "";
              if (link == "" || link == null || link == undefined) {}else{
                join =
                  "<a href=" +
                  link +
                  "><button class='btn w-100 bg-success text-white'><i class='fa fa-link'></i> JOIN MEETING</button></a>";
              }
              var button =
                "<div>" +
                join +
                "<a href='schedule.php?visit=" +
                jsonData.data[i].vid +
                "&date=" +
                arr[2] +
                "&month=" +
                arr[1] +
                "&year=" +
                arr[0] +
                "'><button class='btn w-100 mt-2 bg-primary text-white cancelbtn'><i class='fa fa-clock-o'></i>  RESCHEDULE</button></a><button class='btn w-100 mt-2 bg-danger text-white cancelbtn' onclick='cancelEvent(" +
                jsonData.data[i].vid +
                "," +
                classtodel +
                ");'><i class='fa fa-times'></i>  CANCEL</button></div>";
            }
          }
          $(".get_summary").append(
            '<div class="bg-white box-shadow border-radius-10 widget-style3 div_' +
              jsonData.data[i].vid +
              '"><table class="table"><tbody><tr><th scope="row">Visit Date & Time</th><td class="font-weight-bold">:</td><td class="text-right">' +
              jsonData.data[i].datatime +
              '</td></tr><tr><th scope="row">Mode</th><td class="font-weight-bold">:</td><td class="text-right">' +
              jsonData.data[i].mode +
              '</td></tr><tr><th scope="row">Agent</th><td class="font-weight-bold">:</td><td class="text-right">' +
              agent +
              '</td></tr><tr><th scope="row">Status</th><td class="font-weight-bold">:</td><td class="text-right ' +
              cls +
              '">' +
              did +
              "</td></tr></tbody></table><center></center>" +
              button +
              "</div><br>"
          );
        }
      } else {
        window.location.href = "schedule.php";
      }
    },
  });
}
