$(document).ready(function () {
  $("#filter-row").hide();
  $("#_filter").click(function () {
    if ($("#filter-row").hasClass("d-none")) {
      $("#filter-row").removeClass("d-none");
    }
    $("#filter-row").toggle(400);
  });
  $(".edit").click(function () {
    const id = $(this).val();
    $(`#exampleModal${id}`).modal("show");
  });
  $(".close").click(function () {
    const id = $(this).val();
    $(`#exampleModal${id}`).modal("hide");
  });
});
