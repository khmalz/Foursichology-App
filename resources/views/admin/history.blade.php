@extends('admin.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-4">
                @forelse ($activities->groupBy(fn($acty) => $acty->created_at->format('d-m-Y')) as $date => $groupedActivities)
                    <div class="mb-2">
                        {{ \App\Helpers\DateHelper::getActivityDateLabel($date) }}
                    </div>
                    @foreach ($groupedActivities as $activity)
                        <div class="card mb-2">
                            <div class="card-body d-flex justify-content-between align-items-center py-3">
                                <div class="col-3">
                                    <p class="btn btn-sm m-0 border-0 bg-transparent" style="cursor: default">
                                        {{ $activity->causer->name }}
                                    </p>
                                </div>
                                <div class="col-9">
                                    <h6 class="text-dark m-0">
                                        <span>{{ $activity->description }} ke status {{ $activity->properties['status'] }} -
                                            <a href="{{ route('report.show', $activity->subject->id) }}"
                                                class="text-info">Laporan</a>
                                        </span>
                                    </h6>
                                    <small>
                                        <p class="m-0">{{ $activity->created_at->format('d F Y') }},
                                            {{ $activity->created_at->format('H:i') }} |
                                            {{ $activity->created_at->diffForHumans() }}</p>
                                    </small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @empty
                    <div class="card mb-2">
                        <div class="card-body py-3">
                            <div>
                                <h6 class="text-dark m-0 text-center">
                                    Tidak ada History
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforelse

                <div class="d-flex justify-content-center my-2">
                    {{ $activities->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
