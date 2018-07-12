<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// 商品详情表
use App\Models\GoodsDetails;
use App\Models\Goods;
// 商品详情图表
use App\Models\GoodsImages;
use DB;
class GoodsDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
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

        // 商品详细信息数据
        $goodsdetails = GoodsDetails::where('gid','=',$id)->first();
        // dd($goodsdetails);
        // 商品详细图数据
        $goodsimages = GoodsImages::where('gid','=',$id)->get();
        //dd($goodsdetails -> goods_details);
        // dd($goodsimages);
        return view('Admin.goodsdetails.index',['goodsdetails' => $goodsdetails,'goodsimages' => $goodsimages]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $good_details = GoodsDetails::find($id);
        //dd($good_details);
        return view('Admin.goodsdetails.edit',['good_details' => $good_details]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $good_details_data = $request -> except('_token','_method');
        // dd($good_details_data);
        $good_details = GoodsDetails::find($id);
        $good_details_Udata = [
            'type' => $good_details_data['type'],
            'description' => $good_details_data['description'],
            'color' => $good_details_data['color']
        ];

        $res1 = DB::table('goods_details')->where('id','=',$id)-> update($good_details_Udata);
        // 获取商品详情表
        $good_details_gid = GoodsDetails::find($id);
        $gid = $good_details_gid -> gid;
        if($res1){
           return redirect('/admin/goodsdetails/'.$gid) -> with('success','商品详情修改成功');
        }else{
            return back() -> with('error','商品详情修改失败');
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
        //
    }
}
