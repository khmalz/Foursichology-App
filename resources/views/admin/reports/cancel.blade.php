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
                <h6 class="font-weight-bold text-primary m-0">Cancel Reports</h6>
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
                                        @role('admin')
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#modalRestore{{ $report->id }}">
                                                <i class="fas fa-history"></i>
                                                Restore
                                            </button>
                                            <div class="modal fade" id="modalRestore{{ $report->id }}" tabindex="-1"
                                                aria-labelledby="modalRestoreLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalRestoreLabel">Restore Report</h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                            <form action="{{ route('report.restore', $report) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                <button type="submit" class="btn btn-primary">Restore
                                                                    Report</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endrole
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
            generateDataTable('#dataTable')
        });
    </script>
@endpush
