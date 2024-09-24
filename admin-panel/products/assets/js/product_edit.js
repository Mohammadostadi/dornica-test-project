$(document).ready(function () {
  $("#editor1").ckeditor();
});

$("#date").persianDatepicker({ formatDate: "YYYY/0M/0D" });
$("#endTime").persianDatepicker({ formatDate: "YYYY/0M/0D" });

$("#price").number(true, 0);
$("#qty").number(true, 0);
$("#special").number(true, 0);
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
  