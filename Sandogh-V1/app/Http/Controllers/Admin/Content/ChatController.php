<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(){
        $author_ids = Message::pluck('author_id')->unique();
        //those users that have chat
        $users = User::WhereIn('id' ,$author_ids)->where('status' , 'user')->get();
        return view('admin.content.chats.index' , compact('users'));
    }


    public function show($id){
        $admin = Auth::user();
        $user = User::find($id);
        $user->messages()->update(['receiver_id' => $admin->id , 'seen' => 1]);
        $messages = Message::where('author_id' , $user->id)->where('receiver_id' , $admin->id)->orWhere('author_id' , $admin->id)->where('receiver_id' , $user->id)->orderBy('created_at', 'asc')
        ->get();
        // $messages = Message::where(function($query) use ($userId, $adminId) {
        //     $query->where('author_id', $userId)->where('reference_id', $adminId);
        // })
        // ->orWhere(function($query) use ($userId, $adminId) {
        //     $query->where('author_id', $adminId)->where('reference_id', $userId);
        // })
        // ->orderBy('created_at', 'asc')
        // ->get();
        // dd($messages);



        return view('admin.content.chats.show' , compact('user' , 'admin' , 'messages'));
    }


    public function send(Request $request , $userId , $adminId){
        $request->validate([
            'body' => 'required|min:1|max:1000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u'
        ]);

        Message::create([
            'author_id' => $adminId,
            'body' => $request->body,
            'receiver_id' => $userId,
        ]);
        $user = User::find($userId)->messages()->update(['receiver_id' => $adminId, 'seen' => 1]);


        return redirect()->back();

    }

    public function destroy($user){
        $user->delete();
        return redirect()->back();
    }
}
