var c = 0;
var t;
var timer_is_on = 0;

$(document).ready(function () {
  showFloorPlans();
  $(".single-fpload").hide();
  $(".nxpr").hide();
});

function showFloorPlans() {
  window.swal({
    icon: "../assets/img/loader.gif",
    button: false,
    closeOnClickOutside: false,
  });
  var colsize = "";
  $.ajax({
    type: "POST",
    url: "source/backend/getfloorplans.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        $(".swal-overlay").hide();
        $(".addhr").show();
        for (var i = 0; i < jsonData.data.length; i++) {
          if (jsonData.data.length == 1) {
            colsize = "col-12 ";
          } else {
            colsize = "col-6";
          }
          $(".getfloorplans").append(
            '<div class="mb-2 ' +
              colsize +
              ' "><button type="button" onclick="loadFloorplan(' +
              jsonData.data[i].fid +
              ',this);" class="btn btn-primary btn-block btnn" data-toggle="modal" data-target="#largeModal">' +
              jsonData.data[i].title +
              "</button></div>"
          );
        }
      } else {
        $(".swal-overlay").hide();
        $(".addhr").hide();
        $(".data-title").addClass("text-danger");
        $(".fdesc").addClass("text-center");
        $(".fdesc").html("No Floor Plans Added");
        $(".data-title").html("<i class='fa fa-exclamation-triangle'></i>");
      }
    },
  });
}

function loadFloorplan(fid, e) {
  $(".datavalFid").attr("data-Fid", fid);
  startCount();
  $(".single-fpload").show();
  $(".aniimated-thumbnials").empty();
  var title = $(e).text();
  $(".data-title").html(title);
  $(".tinfo").html(title);
  $(".fdesc").html("");
  $.ajax({
    type: "POST",
    url: "source/backend/getfloorplandesc.php",
    data: {
      fid: fid,
    },
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        $(".swal-overlay").hide();
        if (jsonData.desc != null || jsonData.desc != "null") {
          $(".fdesc").html(jsonData.desc);
        }
        var arrayofimg = jsonData.img;
        if (arrayofimg == null || arrayofimg == "null") {
          $(".single-fpload").hide();
          $("#lightgallery").html(
            "<div class='text-center'><i class='fa fa-exclamation-triangle text-danger'></i><br><p>No Floor Plans Added</p><div>"
          );
          $("#lightgallery").attr(
            "style",
            "pointer-events:none;grid-template-columns: auto;"
          );
        } else {
          $("#lightgallery").html("");
          $("#lightgallery").attr(
            "style",
            "pointer-events:cursor;grid-template-columns: auto auto auto;"
          );
          var liarray = arrayofimg.split("$");
          var active = "";
          for (var e = 0; e < liarray.length; e++) {
            if (liarray.length == 1) {
              $(".nxpr").hide();
            } else {
              $(".nxpr").show();
            }
            if (e == 0) {
              active = "active";
            } else {
              active = "";
            }
            $(".aniimated-thumbnials").append(
              '<a  href="' +
                liarray[e] +
                '"><img src="' +
                liarray[e] +
                '" /></a>'
            );
            lightGallery(document.getElementById("lightgallery"));
          }
          $(".single-fpload").hide();
        }
        // setTimeout(() => {
        //   zoom();
        // }, 1000);
      } else {
        $(".single-fpload").hide();
        console.log("No Floor Plans Added");
      }
    },
  });
}

function closemymodal() {
  var fpid = $(".datavalFid").attr("data-Fid");
  $.ajax({
    type: "POST",
    url: "source/backend/updatefloorplan_activity.php",
    data: {
      fpid: fpid,
      timr: c,
    },
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        console.log(jsonData.message);
      }else{
        console.log(jsonData.message);
      }
    },
  });

  timer_is_on = 0;
  c = 0;
  clearTimeout(t);
}

function timedCount() {
  console.log(c);
  c = c + 1;
  t = setTimeout(timedCount, 1000);
}

function startCount() {
  if (!timer_is_on) {
    timer_is_on = 1;
    timedCount();
  }
}
