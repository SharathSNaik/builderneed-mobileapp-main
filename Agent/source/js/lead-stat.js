$(document).ready(function () {
  window.swal({
    icon: "../assets/img/loader.gif",
    button: false,
    closeOnClickOutside: false,
  });
  $.ajax({
    type: "POST",
    url: "source/backend/check-stat.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        $(".swal-overlay").hide();
        for (var i = 0; i < jsonData.data.length; i++) {
          var prop = jsonData.data[i].property;
          var Nearby = jsonData.data[i].Nearby;
          var Images = jsonData.data[i].Images;
          var SiteVisit = jsonData.data[i].SiteVisit;
          var Explore = jsonData.data[i].Explore;
          var phone = jsonData.data[i].phone;
          if (prop == null || prop == "null") {
            prop = "text-danger";
          } else {
            prop = "text-success";
          }
          if (Nearby == null || Nearby == "null") {
            Nearby = "text-danger";
          } else {
            Nearby = "text-success";
          }
          if (Images == null || Images == "null") {
            Images = "text-danger";
          } else {
            Images = "text-success";
          }
          if (SiteVisit == null || SiteVisit == "null") {
            SiteVisit = "text-danger";
          } else {
            SiteVisit = "text-success";
          }
          if (Explore == null || Explore == "null") {
            Explore = "text-danger";
          } else {
            Explore = "text-success";
          }
          var per = "";
          if (
            jsonData.data[i].percentage >= 50 ||
            jsonData.data[i].percentage >= "50"
          ) {
            per = "bg-warning";
          } else if (
            jsonData.data[i].percentage == 100 ||
            jsonData.data[i].percentage == "100"
          ) {
            per = "bg-success";
          } else {
            per = "bg-primary";
          }

          $(".getstat").append(
            '<div class="container mt-4 d-flex justify-content-center"><div class="card p-3"><div class="d-flex align-items-center"><div class="image"> <img src="../assets/img/features/user-profile.png" class="rounded" width="155"> </div><div class="ml-3 w-100"><h4 class="mb-0 mt-0 username">' +
              jsonData.data[i].name +
              '</h4> <span class="score"><div class="' +
              per +
              ' w-10 rounded" style="height:10px;width:' +
              jsonData.data[i].percentage +
              '%"></div>Score :' +
              jsonData.data[i].percentage +
              '%</span><div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats"><div class="d-flex flex-column"><span class="articles">Property</span> <span class="number1 text-center"><i class="fa fa-circle ' +
              prop +
              '" aria-hidden="true"></i></span> </div><div class="d-flex flex-column"> <span class="followers">Nearby</span> <span class="number2 text-center"><i class="fa fa-circle ' +
              Nearby +
              '" aria-hidden="true"></i></span> </div><div class="d-flex flex-column"> <span class="rating">Images</span> <span class="number3 text-center"><i class="fa fa-circle ' +
              Images +
              '" aria-hidden="true"></i></span> </div></div><div class="p-2 bg-primary d-flex justify-content-between rounded text-white stats"><div class="d-flex flex-column"><span class="articles">Site Visit</span> <span class="number4 text-center"><i class="fa fa-circle ' +
              SiteVisit +
              '" aria-hidden="true"></i></span> </div><div class="d-flex flex-column"> <span class="followers">Explore</span> <span class="number5 text-center"><i class="fa fa-circle ' +
              Explore +
              '" aria-hidden="true"></i></span> </div></div><div class="button mt-2 d-flex flex-row align-items-center"><li class="dropdown" style="list-style-type: none;"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="margin-left:24%;">Floor Plan Viewed<span class="caret"></span></a><br><br><span><i class="fa fa-eye"></i>  Most Viewed : ' +
              jsonData.data[i].maxTimer +
              '</span><ul class="dropdown-menu fpmenu' +
              jsonData.data[i].cl +
              '" role="menu"><!--- Put your menu-item here --></ul></li></div><div class="button mt-2 d-flex flex-row align-items-center"><a class="w-100" href="https://api.whatsapp.com/send?phone=91' +
              phone +
              '"><button class="btn btn-sm btn-outline-primary w-100">Chat</button></div></a></div></div></div></div>'
          );
          if (jsonData.data[i].floorplan.length <= 0) {
            $(".fpmenu" + jsonData.data[i].cl).append(
              '<li class="text-center">None</li>'
            );
          } else {
            for (var e = 0; e < jsonData.data[i].floorplan.length; e++) {
              $(".fpmenu" + jsonData.data[i].cl).append(
                '<li class="text-center" data-valFP="' +
                  jsonData.data[i].floorplan[e].fp_id +
                  '">' +
                  jsonData.data[i].floorplan[e].fptitle +
                  "</li>"
              );
            }
          }
        }
      } else {
        $(".swal-overlay").show();
        console.log("No data Found");
        window.location.href = "homepage.php";
      }
    },
  });
});
