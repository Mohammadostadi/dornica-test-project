$(document).ready(function () {
  $("#filter-row").hide();
  $("#_filter").click(function () {
    if ($("#filter-row").hasClass("d-none")) {
      $("#filter-row").removeClass("d-none");
    }
    $("#filter-row").toggle(400);
  });
});

$("#price").number(true, 0);
