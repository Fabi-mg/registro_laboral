<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        // Lógica para cargar mensajes anteriores
        $messages = ChatMessage::orderBy('created_at')->get();

        return view('chat.index', compact('messages'));
    }

    public function store(Request $request)
    {
        // Lógica para enviar un nuevo mensaje
        ChatMessage::create([
            'user_id' => auth()->user()->id,
            'message' => $request->input('message'),
        ]);

        return redirect()->back();
    }
}
