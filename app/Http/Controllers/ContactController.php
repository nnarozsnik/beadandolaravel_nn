<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'nullable|string|max:50',
            'message' => 'required|string|min:5',
        ]);

        if (auth()->check()) {
            $validated['user_id'] = auth()->id();
        }
        
        
        $contactMessage = ContactMessage::create($validated);

        return back()->with('success', 'Üzenet sikeresen elküldve!');

        Mail::raw(
            "Új üzenet érkezett:\n\n".
            "Név: {$validated['name']}\n".
            "Email: {$validated['email']}\n".
            "Telefon: {$validated['phone']}\n\n".
            "Üzenet:\n{$validated['message']}",
            function($mail) {
                $mail->to('elek1234666@gmail.com')
                     ->subject('Új kapcsolat üzenet');
            }
        );

        return back()->with('success', 'Üzenet sikeresen elküldve!');
    }

    public function index()
    {
        $messages = ContactMessage::where('user_id', auth()->id())
                        ->orWhere('user_id', null)
                        ->latest()
                        ->paginate(3);
    
        return view('messages.index', compact('messages'));
    }

}