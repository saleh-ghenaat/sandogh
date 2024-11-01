<?php

namespace App\Http\Controllers\Karbar\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('karbar.content.chat' , compact('user'));
    }


    public function send(Request $request){
        $request->validate([
            'body' => 'required|min:1|max:1000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u'
        ]);

        Chat::create([
            'author_id' => Auth::id(),
            'body' => $request->body,
        ]);

        return redirect()->back();

    }
}
