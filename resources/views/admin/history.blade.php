@extends('admin.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="mb-3">
                    <form method="POST" action="{{ route('inbox.read') }}">
                        @csrf
                        <button class="btn btn-primary btn-sm" type="submit">
                            Tandai semua sudah dibaca
                        </button>
                    </form>
                </div>
                <div class="mb-2">
                    <h6 class="font-weight-bold">{{ now()->format('d F Y') }} - Today</h6>
                </div>
                <div class="card mb-2">
                    <div class="card-body d-flex justify-content-between align-items-center py-3">
                        <div class="col-3">
                            <p class="btn btn-sm m-0 border-0 bg-transparent" style="cursor: default">
                                Guru BK 1</p>
                        </div>
                        <div class="col-9">
                            <h6 class="text-dark m-0">
                                <span>Mengubah status dari pending ke progress untuk <a href="#"
                                        class="text-info">Laporan</a>
                                </span>
                            </h6>
                            <small>
                                <p class="m-0">26 September 2023, 07:19 | 15 seconds ago</p>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body d-flex justify-content-between align-items-center py-3">
                        <div class="col-3">
                            <p class="btn btn-sm m-0 border-0 bg-transparent" style="cursor: default">
                                Guru BK 2</p>
                        </div>
                        <div class="col-9">
                            <h6 class="text-dark m-0">
                                <span>Mengubah status dari progress ke solve untuk <a href="#"
                                        class="text-info">Laporan</a>
                                </span>
                            </h6>
                            <small>
                                <p class="m-0">26 September 2023, 07:19 | 21 minutes ago</p>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body py-3">
                        <div>
                            <h6 class="text-dark m-0 text-center">
                                Tidak ada History untuk hari ini
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
