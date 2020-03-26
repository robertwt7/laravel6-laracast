<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationController extends Controller
{
    public function show()
    {
        // All of this can be simplified with tap!!

        // We can get the unread notifications as well!
        // $notifications = auth()->user()->notifications
        $notifications = auth()->user()->unreadNotifications;

        // DatabaseCollection has this method to read all of the notifications
        $notifications->markAsRead();

        // Instead of using the notifications variable, we can use the tap variable to get the object and call another applications.
        return view('notifications.show', [
            'notifications' => tap(auth()->user()->unreadNotifications)->markAsRead(),
        ]);
    }
}
