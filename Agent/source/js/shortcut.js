var lid = 0;
$(document).ready(function () {
  getLeaddatas();
  $(".touchevent").attr("style", "pointer-events:none");
  $('.task').hide();
});

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}

//Leads
function getLeaddatas() {
  $.ajax({
    type: "POST",
    url: "source/backend/lander.php?lead=1",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        $('.loader-spin').hide();
        for (var i = 0; i < jsonData.data.length; i++) {
          var names = jsonData.data[i].name;
          var lid = jsonData.data[i].lid;
          // "<a data-val=" +
          //   names +
          //   "href=#" +
          //   names +
          //   " onclick=addTask(this," +
          //   lid +
          //   ")>" +
          //   names +
          //   "</a>";

          $(".listofleads").append(
            "<a data-val='" +
              names +
              "' onclick=addTask(this," +
              lid +')>' +
              names +
              "</a>"
          );
        }
      } else {
        $(".listofleads").append('<a href="#NoLeads">No Leads Found!</a>');
      }
    },
  });
}

function addTask(e, lid) {
  $('.task').show()
  $(".touchevent").attr("style", "pointer-events:cursor");
  $(".leadname").html($(e).attr("data-val"));
  lid = lid;
}
