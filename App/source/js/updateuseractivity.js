function activitites(e) {
  $.ajax({
    type: "POST",
    url: "source/backend/check-useractivity.php",
    data: {
      data: e,
    },
    success: function (response) {
        var jsonData = JSON.parse(response);
    },
  });
}
