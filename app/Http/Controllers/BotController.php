<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BotController extends Controller
{
    public function handleMessage(Request $request)
    {
        $message = $request->input('message');
        // Implement your bot's logic here

        // Generate the reply message
        $reply = 'Hello! You sent: ' . $message;

        // Return an enhanced response
        return response()->json(['status' => 'success', 'reply' => $reply]);
    }
}   
