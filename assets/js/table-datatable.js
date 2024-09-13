$(function () {
  "use strict";

  $(document).ready(function () {
    $("#example").DataTable();
  });

  $(document).ready(function () {
    var table = $("#example2").DataTable({
        
      bFilter: false,
      bInfo: false, //Dont display info e.g. "Showing 1 to 4 of 4 entries"
      paging: false, //Dont want paging
      bPaginate: false, //Dont want paging
      buttons: [
        {
          extend: "print",
          customize: function (win) {
            $(win.document.body).css("direction", "rtl");
          },
        },
        "copy",
        "excel",
      ],
    });

    table.buttons().container().appendTo("#example2_wrapper .col-md-6:eq(0)");
  });
});
