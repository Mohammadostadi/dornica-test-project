$(document).ready(function () {
  $("#file").change(function () {
    const fd = new FormData();
    const files = $("#file")[0].files[0];
    fd.append("file", files);
    $.ajax({
      url: "../../app/Controller/profile_upload.php",
      type: "post",
      data: fd,
      contentType: false,
      processData: false,
      success: function (response) {
        if (response != 0) {
          $("#img").attr("src", response);
          $(".preview img").show(); // Display image element
        } else {
          alert("file not uploaded");
        }
      },
    });
  });
});

$("#alert")
  .fadeTo(3000, 500)
  .slideUp(500, function () {
    $("#alert").slideUp(600);
  });

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

const gender = $("#gender").find("option:selected").val();
if (gender == 0) $("#militaryService").removeClass("d-none");

$("#gender").click(function () {
  const id = $(this).val();
  if (id == 0 && id != "") {
    $("#militaryService").removeClass("d-none");
  } else if (!$("#militaryService").hasClass("d-none")) {
    $("#militaryService").addClass("d-none");
  }
});

// <!--توابع jquery-->

//نام کاربری
function usernamejs(input) {
  input.value = input.value.replace(/[^a-zA-Z0-9@_-]/g, "");
}
