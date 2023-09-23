@extends('admin.layouts.main', ['title' => 'Report'])

@push('styles')
    <link href="{{ asset('admin/vendor/datatables/datatables.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Reports</h1>

        <!-- DataTales Example -->
        <div class="card mb-2 shadow">
            <a href="#collapseCardPending" class="d-block card-header py-3" data-toggle="collapse" role="button"
                aria-expanded="true" aria-controls="collapseCardPending">
                <h6 class="font-weight-bold text-primary m-0">Pending Reports</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="show collapse" id="collapseCardPending">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-bordered table" id="dataTablePending" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pengaduan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pengaduan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($reports->where('status', 'pending') as $report)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $report->created_at->format('d F Y') }}</td>
                                        <td class="text-capitalize">{{ $report->anonim ? 'anonim' : 'tidak anonim' }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('report.show', $report->id) }}">
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
        <div class="card mb-4 shadow">
            <a href="#collapseCardProgress" class="d-block card-header collapsed py-3" data-toggle="collapse" role="button"
                aria-expanded="true" aria-controls="collapseCardProgress">
                <h6 class="font-weight-bold text-primary m-0">Progress Reports</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseCardProgress">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-bordered table" id="dataTableProgress" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pengaduan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pengaduan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($reports->where('status', 'progress') as $report)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $report->created_at->format('d F Y') }}</td>
                                        <td class="text-capitalize">{{ $report->anonim ? 'anonim' : 'tidak anonim' }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('report.show', $report->id) }}">
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
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin/vendor/datatables/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            generateDataTable('#dataTablePending')
            generateDataTable('#dataTableProgress')
        });
    </script>
@endpush
