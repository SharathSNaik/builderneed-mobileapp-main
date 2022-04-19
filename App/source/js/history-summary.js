$(document).ready(function () {
  showSummary();
});

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
          var mstatus = jsonData.data[i].canceled;
          if (did < 0 || mstatus == 5) {
            var button = "";
            if (mstatus == 5) {
              did = "Cancelled";
              cls = "text-danger";
            } else {
              did = "Completed";
              cls = "text-success";

              button =
                "<button class='btn w-100 mt-2 bg-primary text-white' data-toggle='modal' onclick=getConv(" +
                jsonData.data[i].vid +
                ") data-target='#exampleModal'><i class='fa fa-comments'></i> VIEW CONVERSATIONS</button>";
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
        }
      } else {
        $(".swal-overlay").show();
        swal({
          title: "Warning!",
          text: "No data found",
          icon: "warning",
        });
        window.location.href = "schedule.php";
      }
    },
  });
}

function getConv(vid) {
  $(".updateConvo").empty();
  $(".loadconv").show();
  $.ajax({
    type: "POST",
    url: "source/backend/getconvscheduled.php",
    data: {
      vid: vid,
    },
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        $(".updateConvo").empty();
        $(".updateConvo").append(
          '<table class="table table-sm table-light table-bordered"><tbody><tr><th scope="row">Configuration name</th><td>' +
            jsonData.config_name +
            '</td></tr><tr><th scope="row">Base price</th><td>' +
            jsonData.base_price +
            '</td></tr><tr><th scope="row">Offering price</th><td>' +
            jsonData.offering_price +
            '</td></tr><tr><th scope="row">Maintenance fee</th><td>' +
            jsonData.maintenance_fee +
            '</td></tr><tr><th scope="row">Payment Plan</th><td>' +
            jsonData.payment_plan +
            '</td></tr><tr><th scope="row">UDS</th><td>' +
            jsonData.uds +
            '</td></tr><tr><th scope="row">Modification ticket</th><td>' +
            jsonData.modification_ticket +
            '</td></tr><tr><th scope="row">FAQ</th><td>' +
            jsonData.faqs +
            "</td></tr></tbody></table>"
        );
      } else {
        $(".loadconv").hide();
        $(".updateConvo").append(
          '<div class="col-md-12 text-dark text-center" style="font-size:30px;"><br><i class="text-danger fa fa-exclamation-triangle"></i>  No Data Found<br></div><br>'
        );
      }
    },
  });
}
