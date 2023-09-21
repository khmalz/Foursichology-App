<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use RyanChandler\Comments\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Report $report)
    {
        $request->validate([
            'content' => ['required']
        ]);

        $report->comment($request->content, user: $request->user());

        return to_route('report.show', $report);
    }
}
