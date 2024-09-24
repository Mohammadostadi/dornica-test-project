$("#report").click(function () {
  $("body").load("report_members_filter.php");
});

// <!-- city ajax -->
$(document).ready(function () {
  $("#province").change(function () {
    const province = $("#province").val();
    if (province != "") {
      get_city_change(province);
    }
  });

  if (current_province != "" && current_city != "")
    get_city_change(current_province, current_city);

  if (current_province != "" && current_city == "")
    get_city_change(current_province);

  function get_city_change(province, city = null) {
    $.ajax({
      url: "report_members_filter.php",
      type: "POST",
      data: {
        province_id: province,
        city_id: city,
      },
      success: function (res) {
        $("#city").html(res);
      },
    });
  }
});
$(document).ready(function () {
  $("#start_date").persianDatepicker({
    formatDate: "YYYY/0M/0D",
    selectedBefore: !1,
    alwaysShow: !1,
    onShow: function () {
      console.log("Datepicker is now visible");
    },
    onSelect: function () {
      if ($("#end_date").val() == "")
        $("#end_date").val($("#start_date").val());
    },
    onHide: function () {
      console.log("Datepicker is now hidden");
    },
  });
});
$(document).ready(function () {
  $("#end_date").persianDatepicker({
    formatDate: "YYYY/0M/0D",
    selectedBefore: !1,
    alwaysShow: !1,
    onShow: function () {
      console.log("Datepicker is now visible");
    },
    onSelect: function () {
      if ($("#start_date").val() == "")
        $("#start_date").val($("#end_date").val());
    },
    onHide: function () {
      console.log("Datepicker is now hidden");
    },
  });
});
