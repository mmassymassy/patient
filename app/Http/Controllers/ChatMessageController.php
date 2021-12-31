<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatMessageController extends Controller
{
    public function index()
    {
        $messages = ChatMessage::limit(20)->get();

        return response([
            "status" => 200,
            "data" => [
                "messages" => $messages
            ]
        ]);
    }

    public function store(Request $request)
    {
        $fields = $request->validate(
            ["message" => 'required']
        );
        $user =  Auth::user() ;
        $message = $user->messages()->create([
            "message" => $fields["message"]
        ]);


        broadcast(new MessageSent($user, $message))->toOthers();

        return response(
            [
                "status" => 201,
                "data" => [
                    "message" => $message
                ]
            ]
        );
    }
}
