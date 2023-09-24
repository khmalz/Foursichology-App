<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Notifications\InboxNotification;
use Illuminate\Http\Request;

class ReportSiswaController extends Controller
{

    /**
     * Display a listing with canceled reports.
     */
    public function cancel()
    {
        $reports = Report::onlyTrashed()->where('student_id', auth()->user()->student->id)->get();
        return view('reports.cancel', compact('reports'));
    }

    /**
     * Display a listing with status pending of reports.
     */
    public function pending()
    {
        $reports = Report::whereStatus('pending', 'progress')->where('student_id', auth()->user()->student->id)->get();

        return view('reports.pending', compact('reports'));
    }

    /**
     * Display a listing with status solve of reports.
     */
    public function solve()
    {
        $reports = Report::whereStatus('solve')->where('student_id', auth()->user()->student->id)->get();

        return view('reports.solve', compact('reports'));
    }

    /**
     * Send reminder report for admin
     */
    public function reminder(Request $request, Report $report)
    {
        $request->validate([
            'reminder' => ['required']
        ]);

        $report->update([
            'reminder_date' => now()
        ]);

        $request->user()->notify(new InboxNotification($report->id, $report->status));

        return to_route('report.show', $report)->with('success', 'Successfully send reminder report for admin');
    }
}
