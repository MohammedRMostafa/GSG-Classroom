<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function markAsRead(string $id)
    {
        $notification = Auth::user()->unreadNotifications()->where('id', $id)->first();
        $notification->markAsRead();
        return redirect($notification->data['link']);
    }
    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}
