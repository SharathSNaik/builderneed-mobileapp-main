var dataval,
  active = 0;
$(document).ready(function () {
  $(".multiple-items").slick({
    dots: false,
    prevArrow: $(".fa-arrow-left"),
    nextArrow: $(".fa-arrow-right"),
  });
  activitites(1);
  $("#largeModal")
    .on("show", function () {
      $("body").addClass("modal-open");
    })
    .on("hidden", function () {
      $("body").removeClass("modal-open");
    });
  setInterval(() => {
    $(".lg-download").hide();
  }, 1000);
});
