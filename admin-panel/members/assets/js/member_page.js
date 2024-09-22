$("#date").persianDatepicker({ formatDate: "YYYY/0M/0D" });

$("#state").change(function () {
  const id = $(this).val();
  cities(id);
});
if (current_city != "" && current_province != "") {
  cities(current_province, current_city);
}
if (current_city == "" && current_province != "") {
  cities(current_province);
}

function cities(province, city = null) {
  $.ajax({
    url: "members_list.php",
    type: "POST",
    data: {
      province_id: province,
      city_id: city,
    },
    success: function (msg) {
      $("#city").html(msg);
    },
  });
}

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
