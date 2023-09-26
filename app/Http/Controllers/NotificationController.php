<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    /**
     * Display view notification.
     */
    public function index()
    {
        $notifications = DatabaseNotification::whereJsonContains('data->role', 'siswa')
            ->whereDate('created_at', '>=', now())->oldest('read_at')->oldest()->get();

        return view('notification', compact('notifications'));
    }

    /**
     * Read all or specified notification
     */

    public function read(?string $id = null)
    {
        DatabaseNotification::whereJsonContains('data->role', 'siswa')->when($id, function ($query) use ($id) {
            $query->find($id);
        })->update(['read_at' => now()]);

        return to_route('notification.index');
    }
}
