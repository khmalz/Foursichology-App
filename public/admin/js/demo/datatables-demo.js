// Call the dataTables jQuery plugin
$(document).ready(function () {
   $("#dataTable")
      .DataTable({
         buttons: [
            "copy",
            "excel",
            {
               extend: "pdf",
               customize: function (doc) {
                  doc.content[1].table.body.forEach(function (row) {
                     row.forEach(function (cell) {
                        cell.alignment = "center";
                     });
                  });
                  doc.content[1].table.widths = Array(doc.content[1].table.body[0].length).fill("*");
               },
               exportOptions: {
                  columns: [0, 1, 2, 3, 4, 5], // Hanya kolom yang akan diexport
               },
            },
         ],
      })
      .buttons()
      .container()
      .appendTo("#dataTable_wrapper .col-md-6:eq(0)");
});
