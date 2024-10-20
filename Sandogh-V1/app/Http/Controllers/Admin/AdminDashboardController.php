<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content\Vam;
use Illuminate\Http\Request;
use App\Models\Hesabkol;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $hesabkols = Hesabkol::get()->all();
        $vams = Vam::where('status', 0)->count();
        return view('admin.index',compact('hesabkols','vams'));
    }
}
