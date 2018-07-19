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
use App\Models\Cates;
use DB;
class GoodsDetailsController extends Controller
{
    public static function getCates()
    {
        //$cates = Cates::paginate();
        $cates = Cates::select('id','cname','pid','path','status',DB::raw("concat(path,',',id) as paths"))
                        -> orderBy('paths','asc') -> get();
        foreach($cates as $k => $v){
            // 统计逗号出现的次数
            $n = substr_count($v -> path,',');
            $cates[$k] -> cname = str_repeat('|---',$n).$cates[$k] -> cname;
        }
        return $cates;
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
        // dd($goodsdetails -> goods_details -> state);
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
        $gid = $good_details -> gid;
        $goods = DB::table('goods')->where('id','=',$gid) -> first();
        $cates = DB::table('cates') -> get();

        //dd($cates);
        return view('Admin.goodsdetails.edit',['good_details' => $good_details,'goods' => $goods,'cates' => self::getCates()]);
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
        $gid = $good_details -> gid;
        // 商品表的修改
        if($request -> hasfile('pic')){
            $pic = $request -> file('pic'); 
            // 获取文件后缀
            $hz = $pic -> getClientOriginalExtension();
            // 随机文件名
            $pic_file_name = str_random(20);
            // 拼接文件名
            $pic_name = $pic_file_name.'.'.$hz;
            // 将文件移动到指定目录
            $pic -> move('./image/uploads/',$pic_name);
            $goods = [
                'state' => $good_details_data['state'],
                'gname' => $good_details_data['gname'],
                'cid' => $good_details_data['cid'],
                'describe' => $good_details_data['describe'],
                'price' => $good_details_data['price'],
                'discount' => $good_details_data['discount'],
                'pic' => $pic_name,
            ];
        }else{
            $goods = [
                'state' => $good_details_data['state'],
                'gname' => $good_details_data['gname'],
                'cid' => $good_details_data['cid'],
                'describe' => $good_details_data['describe'],
                'price' => $good_details_data['price'],
                'discount' => $good_details_data['discount'],
            ];
        }
        
        $res = DB::table('goods')->where('id','=',$gid)-> update($goods);

      
        // 商品详情表的修改
        $good_details_Udata = [
            'type' => $good_details_data['type'],
            'description' => $good_details_data['description'],
            'color' => $good_details_data['color']
        ];

        $res1 = DB::table('goods_details')->where('id','=',$id)-> update($good_details_Udata);
        // 获取商品详情表
        $good_details_gid = GoodsDetails::find($id);
        $gid = $good_details_gid -> gid;
        if($res1 || $res == 1){
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


