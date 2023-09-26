<?php

namespace App\Http\Controllers\Admin;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\InboxNotification;

class ReportListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing with status pending of reports.
     */
    public function pending()
    {
        $reports = Report::whereStatus('pending', 'progress')->with('student')->get();
        return view('admin.reports.pending', compact('reports'));
    }

    /**
     * Display a listing with status solve of reports.
     */
    public function solve()
    {
        $reports = Report::whereStatus('solve')->with('student')->get();

        return view('admin.reports.solve', compact('reports'));
    }

    /**
     * Display a listing with canceled reports.
     */
    public function cancel()
    {
        $reports = Report::onlyTrashed()->with('student')->get();
        return view('admin.reports.cancel', compact('reports'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Report $report)
    {
        $report->load([
            'student',
            'images',
            'comments' => function ($query) {
                $query->whereNull('parent_id');
            },
            'comments.user',
        ]);

        /**
         * Reminder null, boleh
         * Reminder lebih dari 12 jam, boleh
         * Reminder kurang dari 12 jam, tidak boleh
         */
        $isReminderPassed = is_null($report->reminder_date) || $report->reminder_date->diffInHours(now()) >= 12;

        abort_if($request->user()->hasRole('siswa') && $report->student->user_id != $request->user()->id, 403);

        return view('admin.reports.detail', compact('report', 'isReminderPassed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        $request->validate([
            'status' => ['required']
        ]);

        $report->update([
            'status' => $request->status
        ]);

        $request->user()->notify(new InboxNotification('siswa', $report->id, $report->status));

        return to_route('report.pending')->with('success', 'Successfully edited status a report');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(Report $report)
    {
        if (!$report->trashed()) return back()->with('failed', 'The report was not canceled');

        $report->restore();
        return to_route('report.pending')->with('success', 'Successfully canceled a report');
    }

    /**
     * Remove soft the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        if ($report->trashed()) return back()->with('failed', 'The report was in canceled status');

        $report->delete();

        return to_route('report.pending')->with('success', 'Successfully canceled a report');
    }
}
