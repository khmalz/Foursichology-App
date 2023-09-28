@extends('admin.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="mb-3">
                    <form method="POST" action="{{ route('notification.read') }}">
                        @csrf
                        <button class="btn btn-primary btn-sm" type="submit">
                            Tandai semua sudah dibaca
                        </button>
                    </form>
                </div>
                @forelse ($notifications as $notification)
                    <div class="card mb-2">
                        <div class="card-body d-flex justify-content-between align-items-center py-3">
                            <div>
                                <h6 class="text-dark m-0">
                                    @if ($notification->data['status'] == 'pending')
                                        <span><a href="{{ route('report.show', $notification->data['report_id']) }}"
                                                class="text-warning">Laporan</a>
                                            anda yang dilaporkan kembali ke status {{ $notification->data['status'] }}
                                        </span>
                                    @elseif ($notification->data['status'] == 'progress')
                                        <span><a href="{{ route('report.show', $notification->data['report_id']) }}"
                                                class="text-info">Laporan</a>
                                            anda yang dilaporkan sedang dalam {{ $notification->data['status'] }}
                                        </span>
                                    @elseif ($notification->data['status'] == 'cancel')
                                        <span><a href="{{ route('report.show', $notification->data['report_id']) }}"
                                                class="text-danger">Laporan</a>
                                            anda yang dilaporkan telah dibatalkan
                                        </span>
                                    @elseif ($notification->data['status'] == 'restore')
                                        <span><a href="{{ route('report.show', $notification->data['report_id']) }}"
                                                class="text-info">Laporan</a>
                                            anda yang dibatalkan telah dikembalikan
                                        </span>
                                    @else
                                        <span><a href="{{ route('report.show', $notification->data['report_id']) }}"
                                                class="text-success">Laporan</a>
                                            anda yang dilaporkan sudah diselesaikan
                                        </span>
                                    @endif
                                </h6>
                                <small>
                                    <p class="m-0">{{ $notification->created_at->format('d F Y') }},
                                        {{ $notification->created_at->format('H:i') }} |
                                        {{ $notification->created_at->diffForHumans() }}</p>
                                </small>
                            </div>

                            <div>
                                @if ($notification->unread())
                                    <form method="POST" action="{{ route('notification.read', $notification->id) }}">
                                        @csrf
                                        <button class="btn btn-sm text-primary m-0 border-0 bg-transparent" type="submit">
                                            Tandai Dibaca
                                        </button>
                                    </form>
                                @else
                                    <p class="btn btn-sm text-secondary m-0 border-0 bg-transparent"
                                        style="cursor: default">Tandai Dibaca</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card mb-2">
                        <div class="card-body py-3">
                            <div>
                                <h6 class="text-dark m-0 text-center">
                                    Tidak ada Notifikasi untuk hari ini
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
