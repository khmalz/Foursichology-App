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
                                @foreach ($reports->where('status', 'pending') as $report)
                                    <tr>
                                        @if ($report->anonim)
                                            <td>-</td>
                                            <td>Anonim</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        @else
                                            <td>{{ $report->student->nis }}</td>
                                            <td>{{ $report->student->user->name }}</td>
                                            <td>{{ $report->student->kelas }}</td>
                                            <td class="text-uppercase">{{ $report->student->jurusan }}</td>
                                            <td>{{ $report->student->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                        @endif
                                        <td>{{ $report->created_at->format('d F Y') }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('report.show', $report->id) }}">
                                                <i class="fas fa-info">
                                                </i>
                                                Detail
                                            </a>
                                            @role('admin')
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#modalUpdate{{ $report->id }}">
                                                    <i class="fas fa-clipboard-check"></i>
                                                    </i>
                                                    Resolve
                                                </button>
                                                <div class="modal fade" id="modalUpdate{{ $report->id }}" tabindex="-1"
                                                    aria-labelledby="modalUpdateLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalUpdateLabel">Ganti Status</h5>
                                                            </div>
                                                            <form action="{{ route('report.update', $report->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('patch')
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="statusSelect">Status:</label>
                                                                        <select class="form-control" id="statusSelect"
                                                                            name="status">
                                                                            <option
                                                                                {{ old('status', $report->status) == 'pending' ? 'selected' : null }}
                                                                                value="pending">Pending</option>
                                                                            <option
                                                                                {{ old('status', $report->status) == 'progress' ? 'selected' : null }}
                                                                                value="progress">Progress</option>
                                                                            <option
                                                                                {{ old('status', $report->status) == 'solve' ? 'selected' : null }}
                                                                                value="solve">Solve</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-info">Update</button>
                                                                </div>
                                                            </form>
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
                                @foreach ($reports->where('status', 'progress') as $report)
                                    <tr>
                                        @if ($report->anonim)
                                            <td>-</td>
                                            <td>Anonim</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        @else
                                            <td>{{ $report->student->nis }}</td>
                                            <td>{{ $report->student->user->name }}</td>
                                            <td>{{ $report->student->kelas }}</td>
                                            <td class="text-uppercase">{{ $report->student->jurusan }}</td>
                                            <td>{{ $report->student->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                        @endif
                                        <td>{{ $report->created_at->format('d F Y') }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('report.show', $report->id) }}">
                                                <i class="fas fa-info">
                                                </i>
                                                Detail
                                            </a>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#modalUpdate{{ $report->id }}">
                                                <i class="fas fa-clipboard-check"></i>
                                                </i>
                                                Resolve
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modalUpdate{{ $report->id }}" tabindex="-1"
                                        aria-labelledby="modalUpdateLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalUpdateLabel">Ganti Status</h5>
                                                </div>
                                                <form action="{{ route('report.update', $report->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('patch')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="statusSelect">Status:</label>
                                                            <select class="form-control" id="statusSelect" name="status">
                                                                <option
                                                                    {{ old('status', $report->status) == 'pending' ? 'selected' : null }}
                                                                    value="pending">Pending</option>
                                                                <option
                                                                    {{ old('status', $report->status) == 'progress' ? 'selected' : null }}
                                                                    value="progress">Progress</option>
                                                                <option
                                                                    {{ old('status', $report->status) == 'solve' ? 'selected' : null }}
                                                                    value="solve">Solve</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-info">Update</button>
                                                    </div>
                                                </form>
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
