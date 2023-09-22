@extends('admin.layouts.main', ['title' => 'Report'])

@push('styles')
    <link href="{{ asset('admin/vendor/datatables/datatables.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Reports</h1>

        <!-- DataTales Example -->
        <div class="card mb-4 shadow">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary m-0">Solve Reports</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Name</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Pengaduan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>NIS</th>
                                <th>Name</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Pengaduan</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->student->nis }}</td>
                                    <td>{{ $report->student->user->name }}</td>
                                    <td>{{ $report->student->kelas }}</td>
                                    <td class="text-uppercase">{{ $report->student->jurusan }}</td>
                                    <td>{{ $report->student->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                    <td>{{ $report->created_at->format('d F Y') }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('report.show', $report->id) }}">
                                            <i class="fas fa-info">
                                            </i>
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin/vendor/datatables/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#dataTable")
                .DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": [
                        "copy",
                        "excel",
                        {
                            extend: "pdf",
                            customize: function(doc) {
                                // Mengatur properti alignment menjadi center untuk seluruh teks dalam tabel
                                doc.content[1].table.body.forEach(function(row) {
                                    row.forEach(function(cell) {
                                        cell.alignment = 'center';
                                    });
                                    row.splice(-1, 1);
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
                        "targets": -1
                    }]
                })
                .buttons()
                .container()
                .appendTo("#dataTable_wrapper .col-md-6:eq(0)");
        });
    </script>
@endpush
