<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;

class ChatController extends Controller
{
    public function index(){


        // $authorsIds = Message::whereNull('reference_id')->pluck('author_id')->unique();
        // dd($authorsIds);

        // $users = User::whereIn('id' , $authorsIds)->where('status' , 'user')->get();

        $messages = Message::whereNull('reference_id')->get();

        return view('admin.content.chats.index' , compact('messages'));
    }

    public function create(){
        $users = User::where('status' , 'user')->get();
        return view('admin.content.chats.create' , compact('users'));

    }

    public function store(Request $request){
        $inputs = $request->validate([
            'body' => 'required|min:1|max:1000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r&?:،؟ ]+$/u'
        ]);
        $receiver = User::find($request->user_id);
        $inputs['author_id'] = Auth::user()->id;
        $inputs['body'] =  $request->body;
        $inputs['receiver_id'] =  $request->user_id;
        $inputs['receiver_firstname'] =  $receiver->first_name;
        $inputs['receiver_lastname'] =  $receiver->last_name;
       Message::create($inputs);
        return redirect()->route('admin.content.chats.index')->with('swal-success' , 'پیام با موفقیت ارسال شد');
    }


    public function show(User $user){




        $admin = Auth::user();
        // $user = User::find($user->id);

        // if($user->messages() != null){
        //     $user->messages()->update(['receiver_id' => $admin->id , 'seen' => 1]);
        // }
        // if($user->status == 'admin'){
        //     $user->messages()->update(['seen' => 1]);
        // }else{
        //     $user->messages()->update(['receiver_id' => $admin->id , 'seen' => 1]);

        // }



        $messages = Message::where('author_id' , $user->id)->orWhere('receiver_id' , $user->id)->orderBy('created_at', 'asc')
        ->get();
        return view('admin.content.chats.show' , compact('user' , 'admin' , 'messages'));






    }


    public function send(Request $request , User $user){
        $inputs = $request->validate([
            'body' => 'required|min:1|max:1000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r&?:،؟ ]+$/u'

        ]);

        if($user->status == 'admin'){
        $firstMessage = Message::where('author_id' , $user->id)->first();


            $inputs['receiver_id'] = $firstMessage->receiver_id;
            $inputs['receiver_firstname'] = $firstMessage->receiver_firstname;
            $inputs['receiver_lastname'] = $firstMessage->receiver_lastname;
            if($firstMessage->reference_id !== null){
                $inputs['reference_id'] = $firstMessage->reference_id;
            }else{
                $inputs['reference_id'] = $firstMessage->id;
            }
            $allMessages = Message::where(['receiver_id'=> $user->id , 'seen' => 0])->get();

            foreach($allMessages as $message){

                $message->seen = 1;
                $result = $message->save();
            }
        }else{
        $firstMessage = Message::where('author_id' , $user->id)->first();

            $inputs['receiver_id'] = $user->id;
            $inputs['receiver_firstname'] = $user->first_name;
            $inputs['receiver_lastname'] = $user->last_name;
            if($firstMessage->reference_id !== null){
                $inputs['reference_id'] = $firstMessage->reference_id;
            }else{
                $inputs['reference_id'] = $firstMessage->id;
            }
            $allMessages = Message::where('author_id' , $user->id)->where('seen' , 0)->get();

            foreach($allMessages as $message){
                $message->seen = 1;
                $message->save();
            }

        }
        $inputs['author_id'] = Auth::user()->id;
        $inputs['body'] = $request->body;
        $inputs['seen'] = 0;



        Message::create($inputs);


        return redirect()->back();

    }

    public function destroy(User $user){
        $messagesIds = [];
        $receivedMessagesIds = Message::where('receiver_id' , $user->id)->pluck('id');
        foreach($receivedMessagesIds as $receivedMessagesId){
            array_push($messagesIds , $receivedMessagesId);
        }
        $sendMessagesIds = $user->sentMessages()->pluck('id');
        foreach($sendMessagesIds as $sendMessagesId){
            array_push($messagesIds , $sendMessagesId);
        }
        $messages = Message::whereIn('id' ,$messagesIds)->delete();
        return redirect()->back();
    }

}
