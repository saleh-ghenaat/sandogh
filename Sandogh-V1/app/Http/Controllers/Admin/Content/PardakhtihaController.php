<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\admin\content\PostController;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Content\AccountInformation;
use App\Models\Content\User;
use App\Models\Content\Vam;
use App\Models\Content\Pardakhtiha;
use App\Http\Services\Image\ImageService;


class PardakhtihaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pardakhtihas = Pardakhtiha::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.content.pardakhtiha.index', compact('pardakhtihas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $users)
    {
        return view('admin.content.pardakhtiha.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('akse_resid')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'akse_resid');
            $result = $imageService->save($request->file('akse_resid'));
            if ($result === false) {
                return redirect()->route('admin.content.pardakhtiha.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['akse_resid'] = $result;
        }
        $pardakhtihas = Pardakhtiha::create($inputs);
        return redirect()->route('admin.content.pardakhtiha.index')->with('swal-success', '  پرداختی جدید شما با موفقیت ثبت شد');
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
}
