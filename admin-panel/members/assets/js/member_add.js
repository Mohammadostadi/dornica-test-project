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
    url: "member_add.php",
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

$(".date").persianDatepicker({ formatDate: "YYYY/0M/0D" });

(() => {
  "use strict";
  const forms = document.querySelectorAll(".needs-validation");
  Array.from(forms).forEach((form) => {
    form.addEventListener(
      "submit",
      (event) => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add("was-validated");
      },
      false
    );
  });
})();
