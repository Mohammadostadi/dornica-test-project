const path = "product_delete.php";

$("#date").persianDatepicker({
  formatDate: "YYYY/0M/0D",
  "timePicker.enabled": true,
  "timePicker.step": 2,
});

$("#price").number(true, 0);

$(document).ready(function () {
    $("#filter-row").hide();
    $("#_filter").click(function () {
      if ($("#filter-row").hasClass("d-none")) {
        $("#filter-row").removeClass("d-none");
      }
      $("#filter-row").toggle(400);
    });
  });
  $(".edit").click(function () {
    const id = $(this).val();
    $(`#exampleModal${id}`).modal("show");
  });
  $(".close").click(function () {
    const id = $(this).val();
    $(`#exampleModal${id}`).modal("hide");
  });
  
  $(document).ready(function () {
    $("#alert")
      .fadeTo(2000, 500)
      .slideUp(500, function () {
        $("#alert").slideUp(500);
      });
  });
  