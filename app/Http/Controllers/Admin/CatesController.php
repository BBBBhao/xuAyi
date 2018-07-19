<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CatesInsertRequest;
use App\Models\Cates;
use DB;

class CatesController extends Controller
{
    public static function getCates()
    {
        //$cates = Cates::paginate();
        $cates = Cates::select('id','cname','pid','path','status',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
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
        $search = $request -> input('search','');
		$cates = Cates::where('cname','like','%'.$search.'%')
                        ->orWhere('id','like','%'.$search.'%')
                        ->orWhere('pid','like','%'.$search.'%')
                        ->select('id','cname','pid','path','status',DB::raw("concat(path,',',id) as paths"))
                        ->orderBy('paths','asc')
                        ->paginate(5)
                        ->appends($request->input());
        foreach($cates as $k => $v){
            // 统计逗号出现的次数
            $n = substr_count($v -> path,',');
            $cates[$k] -> cname = str_repeat('|---',$n).$cates[$k] -> cname;
        }
        return view('Admin.cates.index',['cates' => $cates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载分类添加模板
        return view('Admin.cates.create',['cates' => self::getCates()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatesInsertRequest $request)
    {
        $cates = new Cates;
        // 检测当前分类是否是顶级分类
        $pid = $request ->  input('pid','');
        if($pid == 0){
            // 等级分类
            $cates -> path = '0';
        }else{
            $parent_data = Cates::find($pid);
            $cates -> path = $parent_data -> path.','.$parent_data -> id;
        }

        $cates -> cname = $request ->  input('cname','');
        $cates -> pid = $request ->  input('pid','');

        if($cates -> save()){
            return redirect('/admin/cates') -> with('success','添加成功');
        }else{
            return back() -> with('error','添加失败');
        }
    }



 //$search = $request -> input('search','');
            //$cate = self::getCates();/*->where('cname','like','%'.$search.'%')
                                    /* ->orWhere('pid','like','%'.$search.'%')
                                     ->orWhere('id','like','%'.$search.'%')
                                     ->paginate(3)->appends($request->input());*/












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
        //
        $cates = new Cates;
        $cate = Cates::find($id);
       
        return view('Admin.cates.edit',['cate' => $cate,'cates' => self::getCates()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CatesInsertRequest $request, $id)
    {
        $cates = Cates::find($id);

        // 检测当前分类是否是顶级分类
        $pid = $request ->  input('pid','');
        if($pid == 0){
            // 等级分类
            $cates -> path = '0';
        }else{
            $parent_data = Cates::find($pid);
            $cates -> path = $parent_data -> path.','.$parent_data -> id;
        }

        $cates -> cname = $request ->  input('cname','');
        $cates -> pid = $request ->  input('pid','');

        if($cates -> save()){
            return redirect('/admin/cates') -> with('success','修改成功');
        }else{
            return back() -> with('error','修改失败');
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
        $data = Cates::where('pid',$id) -> first();
        if(empty($data)){
            $res = Cates::destroy($id);
            if($res){
                return redirect('/admin/cates') -> with('success','删除成功');
            }else{
                return back() -> with('error','删除失败');
            }
        }else{
            return back() -> with('error','当前分类下有子分类，不允许删除');
        }

    }
}
