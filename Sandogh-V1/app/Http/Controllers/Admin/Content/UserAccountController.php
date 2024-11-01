<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\Content\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    public function index(){
        $user = Auth()->user();
        return view('karbar.content.update-password-form' , compact('user'));
    }

    public function update(Request $request , User $user){
        $request->validate(['old_password' => 'required']);
        if(Hash::check($request->old_password , $user->password))
        {
            $request-> validate([

                'new_password' => 'required|min:8|max:20',
                'new_confirm_password' => 'required|same:new_password',
            ]);
            $request->user()->fill([
                'password' =>Hash::make($request->new_password),
            ])->save();
            return redirect()->route('karbar.home')->with('swal-success' , 'تغییر رمز عبور با موفقیت انجام شد.');
        }
        else{
            return redirect()->back()->with('swal-error' , 'رمز عبور فعلی اشتباه است!');
        }


    }
}
