<?php

namespace App\Http\Controllers\Karbar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content\Vam;
use App\Models\Content\Pardakhtiha;
use App\Models\Content\AccountInformation;

class KarbarDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user()->id;
        $AccountInformations = AccountInformation::get()->where( 'user_id',$user );
        $vams = Vam::get()->where( 'user_id',$user );
        $pardakhtihas = Pardakhtiha::where('user_id',$user)->get();
        return view('karbar.index', compact('AccountInformations','vams','pardakhtihas'));
    }


}
