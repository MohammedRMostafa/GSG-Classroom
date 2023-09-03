<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class UserNotificationsList extends Component
{
    public $notifications, $unreadCount;
    /**
     * Create a new component instance.
     */
    public function __construct($count = 5)
    {
        $user = Auth::user();
        $this->notifications = $user->unreadNotifications()->take($count)->get();
        $this->unreadCount = $user->unreadNotifications()->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user-notifications-list');
    }
}