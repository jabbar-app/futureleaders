<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function markAsRead($id)
    {
        Notification::where('user_id', Auth::id())->where('id', $id)->update(['is_read' => true]);
        return back();
    }

    public function delete($id)
    {
        Notification::where('user_id', Auth::id())->where('id', $id)->delete();
        return back();
    }

    public function markAllAsRead()
    {
        Notification::where('user_id', Auth::id())->update(['is_read' => true]);
        return back();
    }

    public function index()
    {
        $notifications = Notification::where('user_id', Auth::id())->latest()->paginate(20);
        return view('notifications.index', compact('notifications'));
    }
}
