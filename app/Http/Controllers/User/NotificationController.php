<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Notification;
class NotificationController extends Controller
{
  public function showNotifications()
    {
        // Fetch the latest 10 notifications
        $notifications = Notification::latest()->take(10)->get();

        // Pass notifications to the view
        return view('user.pages.header', compact('notifications'));
    }
    
}
