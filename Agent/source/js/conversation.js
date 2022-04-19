var vid = "";
$(document).ready(function () {
  $(".edit").hide();
  var params = new window.URLSearchParams(window.location.search);
  $(".conbuyname").val(params.get("name"));
  $(".lid").val(params.get("lid"));
  $(".pid").val(params.get("pid"));
  $(".vid").val(params.get("vid"));
  vid = params.get("vid");
  $(".datatoconv").hide();
  loadAll();
  $(".edit").click(function () {
    $(".sv_conv").show();
    $(".edit").hide();
    $('.help').removeAttr("readonly","")
  });
  $("input.typeahead").typeahead({
    source: function (query, process) {
      return $.get(
        "source/backend/unit-no.php",
        { query: query },
        function (data) {
          $(".dropdown-menu").hide();
          data = $.parseJSON(data);
          return process(data);
        }
      );
    },
  });
  $("input.typeahead").on("change", viewData);
  $(".sv_conv").click(function () {
    saveConv();
  });
});

function viewData(event) {
  $(".dropdown-menu").hide();
  $.ajax({
    type: "POST",
    url: "source/backend/getconversation.php",
    data: {
      cid: event.target.value,
      conid: vid,
    },
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        $(".datatoconv").show();
        $(".cname").val(jsonData.cname);
        $(".aprice").val(jsonData.base_price);
        $(".mfee").val(jsonData.maintenance_fee);
        $(".uds").val(jsonData.uds);
      } else {
        $(".datatoconv").hide();
        $(".cname").val("");
        $(".aprice").val("");
        $(".oprice").val("");
        $(".mfee").val("");
        $(".pplan").val("");
        $(".mticket").val("");
        $(".uds").val("");
        swal({
          title: "Warning!",
          text: jsonData.message,
          icon: "warning",
        });
      }
    },
  });
}

function saveConv() {
  var cid = $(".cid").val();
  var lid = $(".lid").val();
  var pid = $(".pid").val();
  var sid = $(".vid").val();
  var cname = $(".cname").val();
  var aprice = $(".aprice").val();
  var oprice = $(".oprice").val();
  var mfee = $(".mfee").val();
  var pplan = $(".pplan").val();
  var mticket = $(".mticket").val();
  var uds = $(".uds").val();
  if (
    cid == "" ||
    lid == "" ||
    pid == "" ||
    cname == "" ||
    aprice == "" ||
    oprice == "" ||
    mfee == "" ||
    pplan == "" ||
    mticket == "" ||
    uds == ""
  ) {
    swal({
      title: "Warning!",
      text: "Please Fill all the details",
      icon: "warning",
    });
  } else {
    $.ajax({
      type: "POST",
      url: "source/backend/save-conversation.php",
      data: {
        lid: lid,
        pid: pid,
        cid: cid,
        sid: sid,
        cname: cname,
        aprice: aprice,
        oprice: oprice,
        mfee: mfee,
        pplan: pplan,
        mticket: mticket,
        uds: uds,
      },
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status == "OK") {
          swal({
            title: "Success!",
            text: jsonData.message,
            icon: "success",
          });
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
}

function loadAll() {
  $.ajax({
    type: "POST",
    url: "source/backend/loadconversation.php",
    data: {
      conid: vid,
    },
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status == "OK") {
        $(".sv_conv").hide();
        $('.help').attr("readonly","")
        $(".edit").show();
        $(".datatoconv").show();
        $(".uid").val(jsonData.data.uid);
        $(".cname").val(jsonData.data.config_name);
        $(".aprice").val(jsonData.data.cbase_price);
        $(".mfee").val(jsonData.data.cmaintenance_fee);
        $(".oprice").val(jsonData.data.coffering_price);
        $(".pplan").val(jsonData.data.payment_plan);
        $(".mticket").val(jsonData.data.modification_ticket);
        $(".uds").val(jsonData.data.cuds);
      } else {
      }
    },
  });
}
