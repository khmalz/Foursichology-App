@extends('admin.layouts.main')

@push('styles')
    <link href="{{ asset('admin/vendor/datatables/datatables.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Account</h1>

        <!-- DataTales Example -->
        <div class="card mb-4 shadow">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
                <h6 class="font-weight-bold text-primary m-0">Student</h6>

                <div>
                    <a class="btn btn-success" href="{{ route('account.student.create') }}">
                        <i class="fas fa-plus">
                        </i>
                        Add
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>NIS</th>
                                <th>Email</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Jenis Kelamin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>NIS</th>
                                <th>Email</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Jenis Kelamin</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->user->name }}</td>
                                    <td>{{ $student->nis }}</td>
                                    <td>{{ $student->user->email }}</td>
                                    <td>{{ $student->kelas }}</td>
                                    <td class="text-uppercase">{{ $student->jurusan }}</td>
                                    <td>{{ $student->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm"
                                            href="{{ route('account.student.edit', $student->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#modalDelete{{ $student->id }}">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modalDelete{{ $student->id }}" tabindex="-1"
                                    aria-labelledby="modalDeleteLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalDeleteLabel">Apakah Kamu Yakin?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                                <form action="{{ route('account.student.destroy', $student->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                doc.content[1].table.body.forEach(function(row) {
                                    row.forEach(function(cell) {
                                        cell.alignment = "center";
                                    });
                                    row.splice(-1, 1);
                                });
                                doc.content[1].table.widths = Array(doc.content[1].table.body[0].length)
                                    .fill("*");
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
