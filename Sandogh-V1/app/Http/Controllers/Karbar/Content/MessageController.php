<?php

namespace App\Http\Controllers\Karbar\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(){

        $user = Auth::user();
        $messages = Message::where('author_id' , $user->id)->orWhere('receiver_id' , $user->id)->orderBy('created_at', 'asc')
        ->get();
        $seenMessages = Message::where('receiver_id' , $user->id)->update(['seen' => 1]);
        return view('karbar.content.message' , compact('user' , 'messages'));
    }


    public function send(Request $request , Message $message){
        $request->validate([
            'body' => 'required|min:1|max:1000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u'
        ]);

        Message::create([
            'author_id' => Auth::user()->id,
            'body' => $request->body,
            'receiver_id' => $message->receiver_id,
        ]);

        return redirect()->back();

    }
}
