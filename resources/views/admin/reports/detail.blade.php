@extends('admin.layouts.main', ['title' => 'Report Detail'])

@section('content')
    <div class="container-fluid mt-4 px-4">
        <!-- Invoice-->
        <div class="card">
            <div
                class="card-header p-md-5 border-bottom-0 text-white-50 {{ $report->status == 'pending' ? 'bg-gradient-warning' : ($report->status == 'progress' ? 'bg-gradient-info' : 'bg-gradient-success') }} p-4">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-auto mb-lg-0 text-lg-start mb-5 text-center">
                        <div class="h2 mb-0 text-white">Report</div>
                    </div>
                    <div class="col-12 col-lg-auto text-lg-end text-center">
                        <!-- Invoice details-->
                        <div class="h3 text-capitalize text-white">{{ $report->status }}</div>
                        Tanggal Pengaduan
                        <br>
                        {{ $report->created_at->format('d F Y') }}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Invoice table-->
                <div class="table-responsive">
                    <table class="table-borderless mb-0 table">
                        <tbody>
                            <!-- Invoice item 1-->
                            <tr class="border-bottom">
                                <td>
                                    <div class="font-weight-bold">NIS</div>
                                </td>
                                <td class="font-weight-bold text-end">{{ $report->student->nis }}</td>
                            </tr>
                            <!-- Invoice item 2-->
                            <tr class="border-bottom">
                                <td>
                                    <div class="font-weight-bold">Name</div>
                                </td>
                                <td class="font-weight-bold text-end">{{ $report->student->user->name }}</td>
                            </tr>
                            <!-- Invoice item 3-->
                            <tr class="border-bottom">
                                <td>
                                    <div class="font-weight-bold">Kelas</div>
                                </td>
                                <td class="font-weight-bold text-end">{{ $report->student->kelas }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td>
                                    <div class="font-weight-bold">Jurusan</div>
                                </td>
                                <td class="font-weight-bold text-uppercase text-end">{{ $report->student->jurusan }}</td>
                            </tr>
                            <!-- Invoice subtotal-->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer border-top-0">
                <div class="row mb-4">
                    <div class="col-12">
                        <!-- Invoice - additional notes-->
                        <div class="text-muted text-uppercase font-weight-bold mb-2">Description</div>
                        <div class="mb-0">{{ $report->description }}</div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="text-muted text-uppercase font-weight-bold mb-2">Image</div>
                        <div class="row" style="row-gap: 10px">
                            @foreach ($report->images as $image)
                                <div class="col-md-6 col-lg-4">
                                    <div style="width: 100%; height: 250px;">
                                        <img src="{{ $image->path === 'placeholder' ? "https://source.unsplash.com/random/?bullying&$loop->iteration" : \Illuminate\Support\Facades\Storage::url($image->path) }}"
                                            class="img-fluid img-thumbnail w-100 h-100 border border-2"
                                            style="object-fit:  cover" alt="gambar bukti {{ $loop->iteration }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modalDelete{{ $report->id }}">
                            Cancel Report
                        </button>
                    </div>
                    <div class="modal fade" id="modalDelete{{ $report->id }}" tabindex="-1"
                        aria-labelledby="modalDeleteLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalDeleteLabel">Apakah kamu yakin untuk membatalkan
                                        laporan?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form action="{{ route('report.destroy', $report) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Cancel Report</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">Comment Section</div>

            <div class="comment-content p-3">
                @foreach ($report->comments as $comment)
                    <div class="card mb-2 shadow">
                        <div class="card-header d-flex align-items-center justify-content-between flex-row py-3">
                            <h6 class="m-0"><span class="font-weight-bold">{{ $comment->user->name }}</span>
                                <small>{{ $comment->created_at->diffForHumans() }}</small>
                            </h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right animated--fade-in shadow"
                                    aria-labelledby="dropdownMenuLink" style="">
                                    <button type="button" class="dropdown-item" data-toggle="modal"
                                        data-target="#modalDeleteComment{{ $comment->id }}">
                                        Delete Comment
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <small>
                                <p class="h6">
                                    {{ $comment->content }}
                                </p>
                            </small>
                        </div>
                    </div>

                    <div class="modal fade" id="modalDeleteComment{{ $comment->id }}" tabindex="-1"
                        aria-labelledby="modalDeleteLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalDeleteLabel">Apakah kamu yakin untuk menghapus
                                        komentar?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form action="{{ route('comment.destroy', [$report, $comment]) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="send-comment">
                <form action="{{ route('comment.store', $report) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <textarea name="content" id="content" rows="2" class="form-control @error('content') is-invalid @enderror"
                                placeholder="Leave a comment"></textarea>
                            @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-sm rounded" type="submit">Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
