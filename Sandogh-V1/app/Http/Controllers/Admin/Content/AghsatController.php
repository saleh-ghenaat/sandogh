<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\admin\content\PostController;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Content\AccountInformation;
use App\Models\Content\User;
use App\Models\Hesabkol;
use App\Models\Content\Vam;
use App\Models\Content\Pardakhtiha;
use Illuminate\Support\Facades\Log;
use Psy\Readline\Hoa\Console;

class AghsatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pardakhtihas = Pardakhtiha::orderBy('created_at', 'desc')->where('ghabele_taiid', 0)->simplePaginate(15);
        return view('admin.content.aghsat.index', compact('pardakhtihas'));
    }
    public function listaghsat()
    {
        $pardakhtihas = Pardakhtiha::orderBy('created_at', 'desc')->where('ghabele_taiid', 1)->simplePaginate(15);
        return view('admin.content.aghsat.listaghsat', compact('pardakhtihas'));
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
    public function edit(Pardakhtiha $pardakhtihas)
    {

        return view('admin.content.aghsat.edit', compact('vams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pardakhtiha $pardakhtihas)
    {
        $inputs = $request->all();
        $pardakhtihas->update($inputs);
        return redirect()->route('admin.content.aghsat.index')->with('swal-success', ' قسط  شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pardakhtiha $pardakhtihas)
    {
        $result = $pardakhtihas->delete();
        return redirect()->route('admin.content.aghsat.index')->with('swal-success', 'قسط شما با موفقیت حذف شد');
    }

    public function emaltaghir(Pardakhtiha $pardakhtihas )
    {

        $vams_id = $pardakhtihas->vam_id;

        $vams = Vam::get()->where('id', $vams_id);
        foreach ($vams as $vam) {
            $BaghimandeTedadAghsat = $vam->baghimande_aghsat - 1;
            $vam->baghimande_aghsat = $BaghimandeTedadAghsat;
            $baghimandevam = $vam->baghimande_vam - $pardakhtihas->mablagh_ghest;
            $vam->baghimande_vam = $baghimandevam;
            $vam->update();
        }

        $hesabkols = Hesabkol::get()->all();
        foreach($hesabkols as $hesabkol){
            $hesab = $pardakhtihas->mablagh_ghest;
            $hesabkol->hesab_kol = $hesabkol->hesab_kol + $hesab;
            $hesabkol->hesab_kol = $hesabkol->hesab_kol + $pardakhtihas->shahriye;
            $hesabkol->update();
        }
        $user_id = $pardakhtihas->user_id;
        $accountinformations =AccountInformation::get()->where('user_id',$user_id);
        foreach($accountinformations as $accountinformation){
            $shahriye = $accountinformation->mojoodi + $pardakhtihas->shahriye;
            $accountinformation->mojoodi = $shahriye;
            $accountinformation->update();

        }
        return redirect()->route('admin.content.aghsat.index')->with('swal-success', 'تغییرات با موفقیت اعمال شد ');
    }
    public function status(Pardakhtiha $pardakhtihas)
    {

        $pardakhtihas->ghabele_taiid = $pardakhtihas->ghabele_taiid == 0 ? 1 : 0;
        $result = $pardakhtihas->save();
        if ($result) {
            if ($pardakhtihas->ghabele_taiid == 0) {
                return response()->json(['ghabele_taiid' => true, 'checked' => false]);
            } else {

                return response()->json(['ghabele_taiid' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['ghabele_taiid' => false]);
        }
    }
}
