<?php

namespace App\Http\Controllers\Administrator;
use App\Http\Controllers\Controller;
use App\Models\Notification;

class NotificationController extends Controller
{

    public function index()
    {
        $notifications = Notification::all();
        return view('administrator.notification.index', [
            "notifications" => $notifications
        ]);
    }
}
