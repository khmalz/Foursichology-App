@extends('admin.layouts.main', ['title' => 'Report Detail'])

@section('content')
    <div class="container-fluid mt-4 px-4">
        <!-- Invoice-->
        <div class="card invoice">
            <div
                class="card-header p-md-5 border-bottom-0 text-white-50 {{ $report->status == 'pending' ? 'bg-gradient-warning' : ($report->status == 'progress' ? 'bg-gradient-info' : 'bg-gradient-success') }} p-4">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-auto mb-lg-0 text-lg-start mb-5 text-center">
                        <!-- Invoice branding-->
                        <img class="invoice-brand-img rounded-circle mb-4"
                            src="{{ asset('/admin/assets/img/demo/demo-logo.svg') }}" alt="">
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
                <div class="row">
                    <div class="col-12">
                        <div class="text-muted text-uppercase font-weight-bold mb-2">Image</div>
                        <div class="row" style="row-gap: 10px">
                            @foreach ($report->images as $image)
                                <div class="col-md-6 col-lg-4">
                                    <div style="width: 100%; height: 250px;">
                                        <img src="{{ $image->path === 'placeholder' ? "https://source.unsplash.com/random/?bullying&$loop->iteration" : \Illuminate\Support\Facades\Storage::url($image->path) }}"
                                            class="img-fluid img-thumbnail w-100 h-100 border border-2"
                                            style="object-fit:  cover" alt="...">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
