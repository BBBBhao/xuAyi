<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Cates;
use App\Models\GoodsDetails;
use App\Models\GoodsImages;

use App\Http\Requests\GoodsRequest;

use DB;

class GoodsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request -> input('search');
        $goods = Goods::where('gname','like','%'.$search.'%')
        				-> orwhere('id','like','%'.$search.'%')
        				-> paginate(2);
        $cates = Cates::all();
        return view('Admin.goods.index',['cates' => $cates,'goods' => $goods,'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
  
        // 加载商品添加模板
        return view('Admin.goods.create',['cates' => self::getCates()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodsRequest $request)
    {
        $data = $request -> except('_token');
        // 商品列表 添加
        // 获取商品列表展示图
        $pic = $request -> file('pic'); 
		// 获取文件后缀
        $hz = $pic -> getClientOriginalExtension();
        // 随机文件名
        $pic_file_name = str_random(20);
        // 拼接文件名
        $pic_name = $pic_file_name.'.'.$hz;
        // 将文件移动到指定目录
        $pic -> move('./image/uploads/',$pic_name);

        // 定义数组  存放要添加数据
        $goods = [
            'gname' => $data['gname'],
            'cid' => $data['cid'],
            'describe' => $data['describe'],
            'pic' => $pic_name,
            'price' => $data['price'],
            'discount' => $data['discount']
        ];
  		// 执行商品列表数据添加  返回当前添加数据的ID 
        $gid = DB::table('goods')->insertGetId($goods);
        /*dd($gid); */

        // 商品详情表添加
        $goods_details_data = [
            'type' => $data['type'],
            'description' => $data['description'],
            'gid' => $gid,
            'color' => $data['color'],
        ];
        $res1 = DB::table('goods_details') -> insert($goods_details_data);
            
        // 商品图片表添加

        // 获取商品列表展示图
        $images = $request -> file('images'); 
        // dd($images);
        foreach($images as $k => $v){
        	// 获取文件后缀
        	$ext = $v -> getClientOriginalExtension();
        	// 随机文件名
            $images_file_name = str_random(20);
            // 拼接文件名
            $images_name = $images_file_name.'.'.$ext;
            // 将文件移动到指定目录
            $v -> move('./image/uploads/',$images_name);

            $goods_images_data = [
            	'gid' => $gid,
            	'images' => $images_name
            ];

            $res2 = DB::table('goods_images') -> insert($goods_images_data);
        }

        if($gid && $res1 && $res2){
        	return redirect('/admin/goods') -> with('success','商品添加成功');
        }else{
        	return back() -> with('error','商品添加失败');
        }
           
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
        $goods = Goods::find($id);
       // dd($goods -> GoodsImages);
        $goods_details = GoodsDetails::where('gid','=',$id) -> first();
       // dd($goods_details);
        return view('Admin.goods.edit',['cates' => self::getCates(),'goods' => $goods]);
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
        $good = Goods::find($id);
        $data = $request -> except('_token');
        if($request -> hasFile('pic')){
            $file = $request -> file('pic');
            
            //获取文件后缀
            $hz = $file -> getClientOriginalExtension();
            //随机文件名
            $file_name = str_random(20);
            //拼接文件名
            $name = $file_name.'.'.$hz;
            $file -> move('./image/uploads/',$name);
            $good -> gname = $data['gname'];
            $good -> cid = $data['cid'];
            $good -> describe = $data['describe'];
            $good -> price = $data['price'];
            $good -> discount = $data['discount'];
            $good -> pic = $name;
            if($good -> save()){
                return redirect('/admin/goods') -> with('success','商品修改成功');
            }else{
                return back() -> with('error','商品修改失败');
            }
            
        }else{
            $good -> gname = $data['gname'];
            $good -> cid = $data['cid'];
            $good -> describe = $data['describe'];
            $good -> price = $data['price'];
            $good -> discount = $data['discount'];
            if($good -> save()){
                return redirect('/admin/goods') -> with('success','商品修改成功');
            }else{
                return back() -> with('error','商品修改失败');
            }
        }
    }

    /**
     * 删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
        $good = Goods::find($id);
        if($good ->  delete()){
            return redirect('/admin/goods') -> with('success','商品删除成功');
        }
    }*/

    public function getShow()
    {
        // 获取分类数据
        $cates = Cates::all();
        //dd($cates);
        //获取所有被删除的数据
        $del_data = Goods::onlyTrashed() -> get();
  /*      $del_data[] = GoodsDetails::onlyTrashed()->get();
        $del_data[] = GoodsImages::onlyTrashed()->get();*/

       
        // 加载回收站列表模板
        return view('Admin.goods.del',['del_data' => $del_data, 'cates' => $cates]);
    }

    public function getDel($id)
    {
        //软删除
        // 商品表的修改
        $good = Goods::find($id);
        $res = $good -> delete();

        if($res){
            return redirect('/admin/goods') -> with('success','已放入回收站');
        }else{
            return back() -> with('error','删除失败');
        }
    }

    public function getDelall($id)
    {
    	// 对应详情的永久删除
    	$goods_details = GoodsDetails::where('gid','=',$id) -> first();
    	$res2 = $goods_details -> delete();

    	// 对应图片的永久删除
    	$goods_images = GoodsImages::where('gid','=',$id) -> first();
    	$res3 = $goods_images -> delete();

        $good = Goods::onlyTrashed() -> find($id);
        // 永久删除
        $res = $good -> forceDelete();

        if($res == 0 && $res2 && $res3){
            return redirect('/admin/goods/del/show') -> with('success','删除成功');
        }else{
            return back() -> with('error','删除失败');
        }
    }

    public function getRecover($id)
    {
        // 恢复数据
        $res =  Goods::withTrashed() -> where('id','=',$id) -> restore();
        if($res){
            return redirect('/admin/goods') -> with('success','数据已恢复');
        }else{
            return back() -> with('error','数据恢复失败');
        }
    }

}
