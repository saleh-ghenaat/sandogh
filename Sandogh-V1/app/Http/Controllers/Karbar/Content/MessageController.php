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
            'body' => 'required|min:1|max:1000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r&?:،؟ ]+$/u'

        ]);
        $admin = User::where('status' , 'admin')->first();
        $firstMessage = Message::where('receiver_id' , Auth::user()->id)->orWhere('author_id' , Auth::user()->id)->first();
        if($firstMessage){
            // $receiver = User::find($firstMessage->author_id);
            if($firstMessage->author_id == Auth::user()->id){
                $inputs['receiver_id'] = $firstMessage->receiver_id;
            $inputs['receiver_firstname'] = $firstMessage->receiver_firstname;
            $inputs['receiver_lastname'] = $firstMessage->receiver_lastname;
            }elseif($firstMessage->receiver_id == Auth::user()->id){
                $author = User::where('id' , $firstMessage->author_id)->first();
                $inputs['receiver_id'] = $author->id;
                $inputs['receiver_firstname'] = $author->first_name;
                $inputs['receiver_lastname'] = $author->last_name;
            }

            if($firstMessage->reference_id !== null){
                $inputs['reference_id'] = $firstMessage->reference_id;
            }else{
                $inputs['reference_id'] = $firstMessage->id;

            }
        }else{
            $inputs['receiver_id'] = $admin->id;
            $inputs['receiver_firstname'] = $admin->first_name;
            $inputs['receiver_lastname'] = $admin->last_name;
        }
        $inputs['author_id'] = Auth::user()->id;
        $inputs['body'] = $request->body;



        $message = Message::create($inputs);
        // Message::create([
        //     'author_id' => Auth::user()->id,
        //     'body' => $request->body,
        //     'receiver_id' => $message->receiver_id,
        // ]);

        return redirect()->back();

    }
}
