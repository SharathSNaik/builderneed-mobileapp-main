$(document).ready(function () {
  viewPushnotileads();
});

function viewPushnotileads() {
  $.ajax({
    type: "POST",
    url: "source/backend/getnotifiedleads.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        for (var i = 0; i < jsonData.data.length; i++) {
          $(".viewnotleads").append(
            '<div class="card mb-2"><div class="card-header" id="heading' +
              i +
              '"><h5 class="mb-0"><button class="btn text-dark collapsed' +
              jsonData.data[i].lid +
              '" data-toggle="collapse" data-target="#collapse' +
              i +
              '" aria-expanded="true" aria-controls="collapse' +
              i +
              '">' +
              jsonData.data[i].leadname +
              '</button></h5><i style="position:absolute;margin-top: -7%;margin-left: 85%;" class="fa fa-chevron-down"></i></div><div id="collapse' +
              i +
              '" class="collapse" aria-labelledby="heading' +
              i +
              '" data-parent="#accordion"><div class="card-body"><span style="font-size:18px; color:#000;">Notification Title :<span><input class="form-control nottitle' +
              jsonData.data[i].lid +
              '" placeholder="Enter Notification Title"/><span style="font-size:18px; color:#000;">Notification Body :<span><input class="form-control notbody' +
              jsonData.data[i].lid +
              '" placeholder="Enter Notification Body"/></div><hr><div class="col-12 mb-2 container"><center><button class="btn btn-success" data-lid="' +
              jsonData.data[i].lid +
              '" data-token="' +
              jsonData.data[i].token +
              '" onclick="sendNotification(this);">SEND <i class="fa fa-paper-plane"></i></button></center></div></div>'
          );
        }
        if(jsonData.data.length<=0){
          $(".nodatas").html(
            "<div class='col-12 py-3 mt-3 bg-white rounded'><center><span class='text-danger'><i class='fa fa-exclamation-circle'></i> No Leads found</span></center></div>"
          );
        }else{
          $(".nodatas").html("");
        }
      } else {
        swal({
          title: "Warning!",
          text: "" + jsonData.message,
          icon: "warning",
        });
      }
    },
  });
}

function sendNotification(e) {
  var token = $(e).attr("data-token");
  var lid = $(e).attr("data-lid");
  var nottitle = $(".nottitle" + lid + "").val();
  var notbody = $(".notbody" + lid + "").val();
  if (nottitle == "" || notbody == "") {
    swal({
      title: "Warning!",
      text: "Please Fill in all the details",
      icon: "warning",
    });
  } else {
    $.ajax({
      type: "POST",
      url: "../pushnotification/index.php",
      data: {
        token: token,
        body: notbody,
        title: nottitle,
      },
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.Status == "OK") {
          $('.collapsed'+lid+'').click();
          swal({
            title: "Success!",
            text: "" + jsonData.message,
            icon: "success",
          });
        }else{
          swal({
            title: "Error!",
            text: "" + jsonData.message,
            icon: "error",
          });
        }
      },
    });
  }
}
