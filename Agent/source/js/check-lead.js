$(document).ready(function () {
  Show_users();
});
function Show_users() {
  $.ajax({
    type: "POST",
    url: "source/backend/get-users.php",
    success: function (response) {
      var res = JSON.parse(response);
      if (res.status == "OK") {
        $('.loadergif').hide();
        for (var i = 0; i < res.data.length; i++) {
          var sid = res.data[i].sid;
          var clas_text = "text-success";
          var s_id;
          if (sid == 1) {
            s_id = 1;
            sid = "Kundarcasa";
          } else if (sid == 2) {
            s_id = 2;
            sid = "Saritha Splendor";
          } else if (sid == 3) {
            s_id = 3;
            sid = "Damden divo";
          } else {
            sid = "Not Assigned";
            clas_text = "text-danger";
          }
          $("tbody").append(
            "<tr class='text-center'><td>" +
              res.data[i].name +
              "</td><td class="+clas_text+">" +
              sid +
              '</td><td><select id="mySelect" onChange=Changed(this); class="form-control-sm sites"><option selected disabled>SELECT</option><option value="1,' +
              res.data[i].lid +
              '">Kundur Casa</option><option value="2,' +
              res.data[i].lid +
              '">Saritha Splendor</option><option value="3,' +
              res.data[i].lid +
              '">Damden Divo</option></select></td></tr>'
          );
        }
      } else {
      }
    },
  });
}

function assign_users(lead_id, source_id) {
  $.ajax({
    type: "POST",
    url: "source/backend/assign-users.php",
    data: {
      lid: lead_id,
      sid: source_id,
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

function Changed(e) {
  var twovalues = $(e).val();
  var array = twovalues.split(",");
  var lead_id = parseInt(array[0]);
  var source_id = parseInt(array[1]);
  assign_users(source_id,lead_id);
}
