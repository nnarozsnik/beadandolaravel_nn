<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ContactMessage;

class MessageController extends Controller
{
    public function index()
{
    $messages = auth()->user()  ->receivedMessages() ->with('user')->latest()->orderBy('created_at', 'desc')->paginate(6);
    $contactMessages = ContactMessage::latest()->orderBy('created_at', 'desc')   ->paginate(6, ['*'], 'admin_page');

    return view('frontend.messages.index', compact('messages', 'contactMessages'));
}
    public function create()
    {
       
        $users = User::where('id', '!=', auth()->id())->get();
        return view('frontend.messages.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'recipient_id' => 'required|exists:users,id',
            'content' => 'required|string|max:1000',
        ]);

        Message::create([
            'user_id' => auth()->id(),
            'recipient_id' => $request->recipient_id,
            'content' => $request->content,
        ]);

        return redirect()->route('messages.index')->with('success', 'Üzenet elküldve!');
    }

    public function sent()
{
    $sentMessages = auth()->user()->sentMessages()
                        ->orderBy('created_at', 'desc')
                        ->paginate(6);

    return view('frontend.messages.sent', compact('sentMessages'));
}
}