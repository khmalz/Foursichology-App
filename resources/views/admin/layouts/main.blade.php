<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Foursichology" name="keywords" />
    <meta content="Provide information about the importance of mental health" name="description" />
    <meta name="author" content="Khairul Akmal">

    <title>{{ config('app.name') }} - {{ $title ?? 'Dashboard' }}</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/fontawesome-free/css/all.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    @stack('styles')

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('admin.layouts.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('admin.layouts.navbar')

                <!-- Begin Page Content -->
                @yield('content')

            </div>
            <!-- End of Main Content -->
            @include('admin.layouts.footer')
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="{{ url('#page-top') }}">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->

    <script>
        function generateDataTable(id) {
            $(id)
                .DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": [{
                            extend: "copy",
                            exportOptions: {
                                columns: ":not(:last-child)" // Mengabaikan kolom terakhir
                            }
                        },
                        {
                            extend: "excel",
                            exportOptions: {
                                columns: ":not(:last-child)" // Mengabaikan kolom terakhir
                            }
                        },
                        {
                            extend: "pdf",
                            exportOptions: {
                                columns: ":not(:last-child)" // Mengabaikan kolom terakhir
                            },
                            customize: function(doc) {
                                // Mengatur properti alignment menjadi center untuk seluruh teks dalam tabel
                                doc.content[1].table.body.forEach(function(row) {
                                    row.forEach(function(cell) {
                                        cell.alignment = 'center';
                                    });
                                });

                                // Mengatur lebar kolom agar semua kolom terlihat dalam satu halaman PDF
                                let colWidth = 100 / doc.content[1].table.body[0].length + '%';

                                doc.content[1].table.widths = Array(doc.content[1].table.body[0].length)
                                    .fill(colWidth);

                                // Menambahkan margin ke sisi kiri dan kanan
                                doc.pageMargins = [10, 10, 10, 10];
                            },
                        },
                    ],
                    "stateSave": true,
                    "stateDuration": 60 * 5,
                    "language": {
                        "infoEmpty": "No entries to show",
                        "search": "_INPUT_",
                        "searchPlaceholder": "Search...",
                    },
                    "columnDefs": [{
                        "searchable": false,
                        "orderable": false,
                        "targets": -1,
                    }]
                })
                .buttons()
                .container()
                .appendTo(`${id}_wrapper .col-md-6:eq(0)`);
        }
    </script>

    @stack('scripts')
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
</body>

</html>
