<?php

namespace App\Http\Controllers\Karbar\Content;

use App\Http\Controllers\admin\content\PostController;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\pardakhtghestrequest;
use App\Models\Content\AccountInformation;
use App\Models\Content\User;
use App\Models\Content\Vam;
use App\Models\Content\Pardakhtiha;
use App\Http\Services\Image\ImageService;

class PardakhtghestController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pardakhtihas = Pardakhtiha::all();
        return view('karbar.content.pardakhtghest.create', compact('pardakhtihas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(pardakhtghestrequest $request, ImageService $imageService)
    {
        $user_id = auth()->user()->id;
        $vams = Vam::get()->where('user_id', $user_id);
        foreach($vams as $key => $vam){
            $vams_id = $vam->id;

        }
        $inputs = $request->all();
        
        $realTimestampStart = substr($request->tarikh, 0, 10);
        $inputs['tarikh'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        // dd($inputs);

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.content.post.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        // dd($inputs['akse_resid']);
        $inputs['user_id'] = $user_id;
        $inputs['vam_id'] = $vams_id;
        // dd($inputs);
        

        $Pardakhtihas = Pardakhtiha::create($inputs);
        return redirect()->route('karbar.home')->with('swal-success', '  وام جدید شما با موفقیت ثبت شد');
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
        return view('admin.content.vam.edit', compact('vams', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vam $vams)
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
