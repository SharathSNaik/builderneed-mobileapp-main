var val = "";
$(document).ready(function () {
  viewInventory();
  $("#Search").on("keyup", function () {
    val = $(this).val().toLowerCase();
    $(".target").each(function () {
      $(this).toggle($(this).text().toLowerCase().includes(val));
    });
  });
  $(".Booked").click(function () {
    val = "booked";
    $(".target").each(function () {
      $(this).toggle($(this).text().toLowerCase().includes(val));
    });
  });
  $(".Open").click(function () {
    val = "open";
    $(".target").each(function () {
      $(this).toggle($(this).text().toLowerCase().includes(val));
    });
  });
  $(".all").click(function () {
    val = "all";
    $(".target").each(function () {
      $(this).toggle($(this).text().toLowerCase().includes(val));
    });
  });
});

function viewInventory() {
  window.swal({
    icon: "../assets/img/loader.gif",
    button: false,
    closeOnClickOutside: false,
  });
  $.ajax({
    type: "POST",
    url: "source/backend/view-inventory.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        $(".swal-overlay").hide();
        for (var i = 0; i < jsonData.data.length; i++) {
          var status = jsonData.data[i].status;
          if (status == "1") {
            status = "Booked";
          } else {
            status = "Open";
          }
          $("tbody").append(
            '<tr scope="row" class="target"><td scope="row">' +
              jsonData.data[i].unit +
              "</td><td>" +
              jsonData.data[i].cname +
              "</td><td>" +
              jsonData.data[i].floor +
              '</td><td style="display: none;">all</td><td>' +
              status +
              "</td></tr>"
          );
        }
      } else {
        $(".swal-overlay").show();
        swal({
          title: "Warning!",
          text: jsonData.message,
          icon: "warning",
        });
      }
    },
  });
}
