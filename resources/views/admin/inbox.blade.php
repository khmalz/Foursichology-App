@extends('admin.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="mb-3">
                    <a class="btn btn-primary btn-sm" href="{{ route('account.admin.create') }}">
                        Tandai semua sudah dibaca
                    </a>
                </div>
                <div class="card mb-4">
                    <div class="card-body d-flex justify-content-between align-items-center py-3">
                        <div>
                            <h6 class="text-dark m-0">
                                <span>Siswa mengirim permintaan untuk meninjau <a href="#reportLink"
                                        class="text-primary">Laporan</a>
                                </span>
                            </h6>
                            <small>
                                <p class="m-0">22 Agustus pada 11:30 | 5 jam yang lalu</p>
                            </small>
                        </div>

                        <div>
                            <a class="text-primary" href="{{ route('profile.edit') }}">
                                Tandai Dibaca
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
