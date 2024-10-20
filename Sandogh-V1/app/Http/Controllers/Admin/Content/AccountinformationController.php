<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\admin\content\PostController;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Content\AccountInformation;
use App\Models\Content\User;
use App\Models\Hesabkol;


class AccountinformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountinformations = AccountInformation::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.content.accountinformation.index', compact('accountinformations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.content.accountinformation.create', compact('users'));
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
            $hesabkol->hesab_kol = $hesabkol->hesab_kol + $request->mojoodi;
            $hesabkol->update();
        }
        $accountinformations = AccountInformation::create($inputs);
        return redirect()->route('admin.content.accountinformation.index')->with('swal-success', ' حساب کاربری جدید شما با موفقیت ثبت شد');
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
    public function edit(AccountInformation $accountinformations)
    {
        $users = User::all();
        return view('admin.content.accountinformation.edit', compact('accountinformations', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountInformation $accountinformations)
    {
        $inputs = $request->all();
        $accountinformations->update($inputs);
        return redirect()->route('admin.content.accountinformation.index')->with('swal-success', ' حساب کاربری شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountInformation $accountinformations)
    {
        $result = $accountinformations->delete();
        return redirect()->route('admin.content.accountinformation.index')->with('swal-success', 'حساب کاربری  شما با موفقیت حذف شد');
    }
}
