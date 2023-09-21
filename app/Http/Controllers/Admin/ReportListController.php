<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

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
    public function show(Report $report)
    {
        $report->load('student.user', 'images', 'comments.user');

        return view('admin.reports.detail', compact('report'));
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

        return to_route('report.pending')->with('success', 'Successfully edited status a report');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
