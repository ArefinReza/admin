<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactMessageController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validatedData);

        return response()->json(['message' => 'Contact message sent successfully!'], 200);
    }


    // Restrict viewing messages for users with "user" role
    public function index()
    {
        $messages = ContactMessage::select('id', 'name', 'subject', 'email', 'created_at', 'status')
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('pages.messages.index', compact('messages'));
    }

    public function show($id)
{
    $message = ContactMessage::findOrFail($id);
    $message->status = 'read';
    $message->save();
    return view('pages.messages.show', compact('message'));
}

}