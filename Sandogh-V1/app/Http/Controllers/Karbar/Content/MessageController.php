<?php

namespace App\Http\Controllers\Karbar\Content;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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


    public function send(Request $request ,Message $message){
        $inputs = $request->validate([
            'body' => 'required|min:1|max:1000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u'
        ]);
        $firstMessage = Message::where('receiver_id' , Auth::user()->id)->first();
        $receiver = User::find($firstMessage->author_id);
        $inputs['author_id'] = Auth::user()->id;
        $inputs['body'] = $request->body;
        $inputs['receiver_id'] = $firstMessage->author_id;
        $inputs['receiver_firstname'] = $receiver->first_name;
        $inputs['receiver_lastname'] = $receiver->last_name;
        if($firstMessage->reference_id !== null){
            $inputs['reference_id'] == $firstMessage->reference_id;
        }else{
            $inputs['reference_id'] = $firstMessage->id;
        }

        $message = Message::create($inputs);
        // Message::create([
        //     'author_id' => Auth::user()->id,
        //     'body' => $request->body,
        //     'receiver_id' => $message->receiver_id,
        // ]);

        return redirect()->back();

    }
}
