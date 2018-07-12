<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// 商品详情图表
use App\Models\GoodsImages;

use App\Http\Requests\GoodsImagesRequest;

class GoodsImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        $images = GoodsImages::find($id);
        return view('Admin.goodsimages.edit',['images' => $images]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoodsImagesRequest $request, $id)
    {
        // 查询指定图片
        $image = GoodsImages::find($id);   
        $gid = $image -> gid;
        // 文件上传
        $images = $request -> file('images'); 
        // 获取文件后缀
        $hz = $images -> getClientOriginalExtension();
        // 随机文件名
        $images_file_name = str_random(20);
        // 拼接文件名
        $pic_name = $images_file_name.'.'.$hz;
        // 将文件移动到指定目录
        $images -> move('./image/uploads/',$pic_name);
        // 执行修改
        $image -> images = $pic_name;
        if($image -> save()){
            return redirect('/admin/goodsdetails/'.$gid) -> with('success','图片修改成功');
        }else{
            return back() -> with('error','图片修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = GoodsImages::find($id);
        //dd($image);
        //$gid = $image -> gid;
        if($image -> delete()){
            return back() -> with('success','图片删除成功');
        }else{
            return back() -> with('error','图片删除失败');
        }
    }
}
