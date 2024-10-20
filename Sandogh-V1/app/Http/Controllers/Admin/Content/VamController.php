<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\admin\content\PostController;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Content\AccountInformation;
use App\Models\Content\User;
use App\Models\Content\Vam;
use App\Models\Hesabkol;


class VamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vams = Vam::orderBy('created_at', 'desc')->where('status',0)->simplePaginate(15);
        return view('admin.content.vam.index', compact('vams'));
    }
    public function listvam()
    {
        $vams = Vam::orderBy('created_at', 'desc')->where('status',1)->simplePaginate(15);
        return view('admin.content.vam.listvam', compact('vams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.content.vam.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $hesabkols = Hesabkol::get()->all();
        foreach ($hesabkols as $hesabkol) {
            $hesabkol->hesab_kol = $hesabkol->hesab_kol - $request->mablagh_vam;
            $hesabkol->update();
        }
        $vams = Vam::create($inputs);
        return redirect()->route('admin.content.vam.index')->with('swal-success', '  وام جدید شما با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vam $vams)
    {
        $users = User::all();
       return view('admin.content.vam.edit', compact('vams','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Vam $vams)
    {
        $inputs = $request->all();
        $vams->update($inputs);
        return redirect()->route('admin.content.vam.index')->with('swal-success', ' وام  شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vam $vams)
    {
       $result = $vams->delete();
       return redirect()->route('admin.content.vam.index')->with('swal-success', 'وام شما با موفقیت حذف شد');
    }

    public function status(Vam $vams)
    {

        $vams->status = $vams->status == 0 ? 1 : 0;
        $result = $vams->save();
        if ($result) {
            if ($vams->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
