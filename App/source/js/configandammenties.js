$(document).ready(function () {
  showConfig();
  showAmmenties();
});

//Configuration per per project
function showConfig() {
  $.ajax({
    type: "POST",
    url: "source/backend/config-data.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        var icons = "";
        var style = "";
        for (var i = 0; i < jsonData.data.length; i++) {
          var arrayofdesc = jsonData.data[i].desc;
          1;
          var liarray = arrayofdesc.split("$");
          for (var e = 0; e < liarray.length; e++) {
            if (liarray[e] == "") {
              icons = "";
              style= "style='pointer-events:none;'";
            } else {
              style="";
              icons = "fa-chevron-down";
            }
          }
          $(".config").append(
            '<div class="" onclick="changeIcon(this);" '+style+'><div class="card-header" id="heading' +
              i +
              '" data-toggle="collapse" data-target="#collapse' +
              i +
              '" aria-expanded="true" aria-controls="collapse' +
              i +
              '"><button class="btn text-dark text-center drpdownfea" type="button">' +
              jsonData.data[i].title.toUpperCase() +
              '</button><span style="float: right; color:black; padding-top: 5px;"><i class="faicon fa ' +
              icons +
              '"></i></span></div><div id="collapse' +
              i +
              '" class="collapse" aria-labelledby="heading' +
              i +
              '" data-parent="#accordionExample"><div class="card-body"><div class="row no-gutters staircase"><div class="col"><div class="card-block px-2"><ul class="entry-content ul' +
              jsonData.data[i].ulclass +
              '" style="list-style-type: circle; color:black;"></ul></div></div></div></div></div></div>'
          );
          for (var e = 0; e < liarray.length; e++) {
            $(".ul" + jsonData.data[i].ulclass).append(
              "<li>" + liarray[e] + "</li>"
            );
          }
        }
      } else {
      }
    },
  });
}

function showAmmenties() {
  $.ajax({
    type: "POST",
    url: "source/backend/ammen-data.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        var icon = "";
        var style = "";
        for (var i = 0; i < jsonData.data.length; i++) {
          var arrayofdesc = jsonData.data[i].desc;
          var liarray = arrayofdesc.split("$");
          for (var e = 0; e < liarray.length; e++) {
            if (liarray[e] == "") {
              icon = "";
              style= "style='pointer-events:none;'";
            } else {
              style="";
              icon = " fa-chevron-down";
            }
          }
          $(".amen").append(
            '<div class="" onclick="changeIcon(this);"  '+style+'><div class="card-header" id="aheading' +
              i +
              '" data-toggle="collapse" data-target="#acollapse' +
              i +
              '" aria-expanded="true" aria-controls="acollapse' +
              i +
              '"><button class="btn text-dark text-center drpdownfea" type="button">' +
              jsonData.data[i].title.toUpperCase() +
              '</button><span style="float: right; color:black; padding-top: 5px;"><i class="faicon fa ' +
              icon +
              '"></i></span></div><div id="acollapse' +
              i +
              '" class="collapse" aria-labelledby="aheading' +
              i +
              '" data-parent="#accordionExample"><div class="card-body"><div class="row no-gutters staircase"><div class="col"><div class="card-block px-2"><ul class="entry-content ulu' +
              jsonData.data[i].ulclass +
              '" style="list-style-type: circle; color:black;"></ul></div></div></div></div></div></div>'
          );
          for (var e = 0; e < liarray.length; e++) {
            if (liarray[e] == "") {
              icon = "";
            } else {
              icon = " fa-chevron-down";
            }
            $(".ulu" + jsonData.data[i].ulclass).append(
              "<li>" + liarray[e] + "</li>"
            );
          }
        }
      } else {
      }
    },
  });
}

function changeIcon(e){
   $(e).find('i').toggleClass('fa-chevron-down fa-chevron-up');
}
