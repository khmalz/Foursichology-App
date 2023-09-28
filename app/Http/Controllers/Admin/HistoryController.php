<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class HistoryController extends Controller
{
    public function index()
    {
        $activities = Activity::with('causer', 'subject:id,status')->latest()->paginate(10);

        return view('admin.history', compact('activities'));
    }
}
