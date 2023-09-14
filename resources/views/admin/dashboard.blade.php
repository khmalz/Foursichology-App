@extends('admin.layouts.main')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        @hasanyrole('super admin|admin')
            <!-- Card Row -->
            <div class="row">
                @role('super admin')
                    <!-- Guru Card -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary h-100 py-2 shadow">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-primary text-uppercase mb-1 text-xs">
                                            Admin</div>
                                        <div class="h5 font-weight-bold mb-0 text-gray-800">{{ $adminCount }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endrole

                <!-- Siswa Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success h-100 py-2 shadow">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="font-weight-bold text-success text-uppercase mb-1 text-xs">
                                        Siswa</div>
                                    <div class="h5 font-weight-bold mb-0 text-gray-800">{{ $siswaCount }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-tag fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Report Report -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning h-100 py-2 shadow">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="font-weight-bold text-warning text-uppercase mb-1 text-xs">
                                        Pending Report</div>
                                    <div class="h5 font-weight-bold mb-0 text-gray-800">{{ $pendingReportCount }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Solve Report Report -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info h-100 py-2 shadow">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="font-weight-bold text-info text-uppercase mb-1 text-xs">
                                        Solve Report</div>
                                    <div class="h5 font-weight-bold mb-0 text-gray-800">{{ $solveReportCount }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endhasanyrole

        @hasrole('siswa')
            <!-- Profile Row -->
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <!-- Approach -->
                    <div class="card mb-4 shadow">
                        <div class="card-header py-3">
                            <h6 class="font-weight-bold text-primary m-0">Profile Detail</h6>
                        </div>

                        <div class="card-body">
                            <!-- Invoice table-->
                            <div class="table-responsive">
                                <table class="table-borderless mb-0 table">
                                    <tbody>
                                        <tr class="border-bottom">
                                            <td>
                                                <div class="font-weight-bold">Nama</div>
                                            </td>
                                            <td class="font-weight-bold">{{ $user->name }}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td>
                                                <div class="font-weight-bold">NIS</div>
                                            </td>
                                            <td class="font-weight-bold">{{ $user->student->nis }}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td>
                                                <div class="font-weight-bold">Gender</div>
                                            </td>
                                            <td class="font-weight-bold">
                                                {{ $user->student->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td>
                                                <div class="font-weight-bold">Kelas</div>
                                            </td>
                                            <td class="font-weight-bold">{{ $user->student->kelas }}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td>
                                                <div class="font-weight-bold">Jurusan</div>
                                            </td>
                                            <td class="font-weight-bold text-uppercase">{{ $user->student->jurusan }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endhasrole
    </div>
@endsection
