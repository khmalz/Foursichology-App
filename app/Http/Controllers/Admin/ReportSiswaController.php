<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportSiswaController extends Controller
{
    /**
     * Display a listing with status pending of reports.
     */
    public function pending()
    {
        $reports = Report::whereStatus('pending')->where('student_id', auth()->user()->student->id)->get();

        return $reports;
    }

    /**
     * Display a listing with status solve of reports.
     */
    public function solve()
    {
        $reports = Report::whereStatus('solve')->where('student_id', auth()->user()->student->id)->get();

        return $reports;
    }
}
