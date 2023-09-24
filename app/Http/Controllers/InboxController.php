<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class InboxController extends Controller
{
    /**
     * Display view inbox.
     */
    public function index()
    {
        $notifications = DatabaseNotification::whereDate('created_at', '>=', now())
            ->orWhere(function ($query) {
                $query->whereNull('read_at');
            })
            ->oldest('read_at')->get();

        return view('admin.inbox', compact('notifications'));
    }

    /**
     * Read all or specified notification
     */

    public function read(?string $id = null)
    {
        DatabaseNotification::when($id, function ($query) use ($id) {
            $query->find($id);
        })->update(['read_at' => now()]);

        return to_route('inbox.index');
    }
}
