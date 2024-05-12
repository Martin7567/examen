<?php

namespace App\Http\Controllers;

use App\Models\notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // retrieve the unread notifications from the user
        $unreadNotifications = notification::where('user_id', $user->id)
            ->where('read', false)
            ->get();

        
        $readNotifications = notification::where('user_id', $user->id)
            ->where('read', true)
            ->get();

        $notifactions = $unreadNotifications->merge($readNotifications);

        return view('message.index', ['notifications' => $notifactions]);
    }

    public function destroy($id)
    {
        $notification = notification::findOrFail($id);

        $notification->delete();

        return redirect()->route('message.index');
    }

    public function markAsRead($id)
    {
        $notifaction = notification::findOrFail($id);

        $notifaction->read = true;
        $notifaction->save();

        return redirect()->route('message.index');
    }

    public function store(Request $request)
    {
        // Je moet dus nog bij index ervoor zorgen dat je alle "role" info terug geeft
        // Je laat alle "role" namen zien in een dropdown. 
        // Wanneer je role hebt gekozen zorg je ervoor dat alleen zij een notificatie krijgen
        
        // Je moet waarschijnlijk hieronder een foreach plaatsen omdat je meerdere ID's gaat hebben.

        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $notification = new Notification();
        $notification->user_id = auth()->id();
        $notification->title = $request->input('title');
        $notification->message = $request->input('message');
        $notification->read = false;
        $notification->save();

        return redirect()->route('message.index')->with('success', 'Notificatie succesvol gemaakt');
    }
}
