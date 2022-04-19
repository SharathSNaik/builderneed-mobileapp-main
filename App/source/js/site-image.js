var flag = 0;
var prevVal = 0;
$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "source/backend/get-session.php",
    success: function (response) {
      var res = JSON.parse(response);
      if (res.status == "OK") {
        var sid = res.sid;
        $.ajax({
          type: "POST",
          url: "source/backend/getimages.php",
          data: {
            sid: sid,
          },
          success: function (response) {
            var jsonData = JSON.parse(response);
            $(".logo-image").attr("src", jsonData.logo);
            if (jsonData.status == "OK") {
              for (var i = 0; i < jsonData.data_img.length; i++) {
                $(".single-loader").hide();
                // $(".single-items").append(
                //   '<div><img class="shadow-1-strong rounded" src="' +
                //     jsonData.data_img[i].image +
                //     '" alt="Snow" style="height:260px;width:100%;"/><div style="position:relative;background: rgba(0, 0, 0, 0.5);word-break: break-word;white-space:normal;font-size:14px;color:white;margin-top:-32%;padding:0 10px 0px 10px;">' +
                //     jsonData.data_img[i].img_desc +
                //     "</div></div>"
                // );
                $(".single-items").append(
                  '<div class="containers"><img src="' +
                    jsonData.data_img[i].image +
                    '" alt="Snow" style="height:230px;width:100%;border-radius: 10px;"><div class="centered">' +
                    jsonData.data_img[i].img_desc +
                    "</div></div>"
                );
              }
              $(".single-items").slick({
                prevArrow: false,
                nextArrow: false,
                dots:true,
              });
            } else {
              console.log("No Images Found");
            }
          },
        });
      } else {
        window.location.href = "../";
      }
    },
  });
  //Image As per Btn Click
  $(".imgUP").click(function () {
    $(".single-itemdata").empty();
    $(".single-loadergif").show();
    var dataval = $(this).attr("data-val");
    console.log(prevVal);
    $(".titleInfo").text($(this).text());
    $.ajax({
      type: "POST",
      url: "source/backend/getimagesinfo.php",
      data: {
        imgid: dataval,
      },
      success: function (response) {
        var jsonData = JSON.parse(response);
        $(".single-loadergif").hide();
        prevVal = dataval;
        if (jsonData.status == "OK") {
          var len = jsonData.data_img.length;
          console.log(len);
          if (len == 0) {
            $(".single-itemdata").append(
              '<div class="containers">No Data Found</div>'
            );
          } else {
            flag = 0;
            $(".single-itemdata").empty();
            var active = "active";
            for (var i = 0; i < len; i++) {
              if (i == 0) {
                active = "active";
              } else {
                active = "active" + i;
              }
              $(".single-itemdata").append(
                '<div class="carousel-item ' +
                  active +
                  '"><img src="' +
                  jsonData.data_img[i].image +
                  '" alt="Snow" style="height:230px;width:100%;border-radius: 10px;"><div class="centered">' +
                  jsonData.data_img[i].img_desc +
                  "</div></div>"
              );
            }
          }
        } else {
          $(".single-itemdata").empty();
          $(".single-itemdata").append(
            '<div class="containers text-dark" style="font-size:30px;"><br><i class="text-danger fa fa-exclamation-triangle"></i>  No Data Found<br></div>'
          );
        }
      },
    });
  });
  //queens
  $(".infoconf").click(function () {
    $(".single-itemdata").empty();
    $(".single-loadergif").show();
    var dataval = $(this).attr("data-val");
    console.log(prevVal);
    $(".titleInfo").text($(this).text());
    $.ajax({
      type: "POST",
      url: "source/backend/getimagesinfo.php",
      data: {
        imgid: dataval,
      },
      success: function (response) {
        var jsonData = JSON.parse(response);
        $(".single-loadergif").hide();
        prevVal = dataval;
        if (jsonData.status == "OK") {
          var len = jsonData.data_img.length;
          console.log(len);
          if (len == 0) {
            $(".single-itemdata").append(
              '<div class="containers">No Data Found</div>'
            );
          } else {
            flag = 0;
            $(".single-itemdata").empty();
            var active = "active";
            for (var i = 0; i < len; i++) {
              if (i == 0) {
                active = "active";
              } else {
                active = "active" + i;
              }
              $(".single-itemdata").append(
                '<div class="carousel-item ' +
                  active +
                  '"><img src="' +
                  jsonData.data_img[i].image +
                  '" alt="Snow" style="height:230px;width:100%;border-radius: 10px;"><div class="centered">' +
                  jsonData.data_img[i].img_desc +
                  "</div></div>"
              );
            }
          }
        } else {
          $(".single-itemdata").empty();
          $(".single-itemdata").append(
            '<div class="containers text-dark" style="font-size:30px;"><br><i class="text-danger fa fa-exclamation-triangle"></i>  No Data Found<br></div>'
          );
        }
      },
    });
  });
});
