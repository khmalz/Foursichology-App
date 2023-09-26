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
        $notifications = DatabaseNotification::whereJsonContains('data->role', 'admin')
            ->where(function ($query) {
                $query->whereDate('created_at', '>=', now())
                    ->orWhere(function ($query) {
                        $query->whereDate('created_at', '<=', now())
                            ->whereNull('read_at');
                    });
            })->oldest('read_at')->oldest()->get();

        return view('admin.inbox', compact('notifications'));
    }

    /**
     * Read all or specified notification
     */

    public function read(?string $id = null)
    {
        DatabaseNotification::whereJsonContains('data->role', 'admin')->when($id, function ($query) use ($id) {
            $query->find($id);
        })->update(['read_at' => now()]);

        return to_route('inbox.index');
    }
}
