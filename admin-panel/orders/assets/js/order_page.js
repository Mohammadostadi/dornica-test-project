$("#date").persianDatepicker({ formatDate: "YYYY/0M/0D" });

$(document).ready(function () {
  $("#filter-row").hide();
  $("#_filter").click(function () {
    if ($("#filter-row").hasClass("d-none")) {
      $("#filter-row").removeClass("d-none");
    }
    $("#filter-row").toggle(400);
  });
});
