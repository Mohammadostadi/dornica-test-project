const gender = $("#gender").find("option:selected").val();
if (gender == 0) $("#militaryService").removeClass("d-none");

$("#gender").click(function () {
  const id = $(this).val();
  if (id == 0 && id != "") {
    $("#militaryService").removeClass("d-none");
  } else if (!$("#militaryService").hasClass("d-none")) {
    $("#militaryService").addClass("d-none");
  }
})(() => {
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

// <!--توابع jquery-->

//اعداد
function number(input) {
  input.value = input.value.replace(/[^0-9]/g, "");
  if (input.value.length > 8) {
    input.value = input.value.slice(0, 8);
  }
}
//رمز
function passwordjs(input) {
  input.value = input.value.replace(/[^a-zA-Z0-9@_-]/g, "");
  if (input.value.length > 8) {
    input.value = input.value.slice(0, 8);
  }
}
//نام کاربری
function usernamejs(input) {
  input.value = input.value.replace(/[^a-zA-Z0-9@_-]/g, "");
}
