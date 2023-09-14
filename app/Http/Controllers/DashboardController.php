<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->user()->hasRole('siswa')) {
            $user = $request->user()->load('student');

            return view('admin.dashboard', compact('user'));
        }

        $adminCount = User::role('admin')->count();
        $siswaCount = User::role('siswa')->count();
        $pendingReportCount = Report::whereStatus('pending')->count();
        $solveReportCount = Report::whereStatus('solve')->count();

        return view('admin.dashboard', compact('adminCount', 'siswaCount', 'pendingReportCount', 'solveReportCount'));
    }
}
