<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Http\Requests\LunboRequest;
use App\Models\Lunbo;

class ShufflingController extends Controller
{
    // 主页
    public function index(Request $req)
    {
        // 轮播图数据获取

        $shuffling = Lunbo::where('name','like','%'.$req['name'].'%')->paginate(3);
        $Name = $req -> input('name');
        return view('Admin.banner.index',compact('shuffling','Name'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LunboRequest $request)
    {
        //添加轮播

       $data = $request -> except('_token');
        //dump($data);
        if($request -> hasFile('picture')){
            $file = $request -> file('picture');
            // dd($file);
            //获取文件后缀
            $hz = $file -> getClientOriginalExtension();
            //随机文件名
            $file_name = str_random(20);
            //拼接文件名
            $name = $file_name.'.'.$hz;
      
           
            //移动到指定位置
            $file -> move('./uploads/',$name);
         
             //执行添加
            $shuffling = new Lunbo;
            $shuffling -> picture = $name;
            $shuffling -> name = $data['name'];
            $shuffling -> banner_url = $data['banner_url'];
            $shuffling -> status = $data['status'];
            $shuffling -> save();
        }else{
            //执行添加
            $shuffling = new Lunbo;
            $shuffling -> name = $data['name'];
            $shuffling -> banner_url = $data['banner_url'];
            $shuffling -> status = $data['status'];
            $shuffling -> save();
        }

        // 判断是否添加成功
         if($shuffling -> save()){
            return redirect('/shuffling') -> with('success','添加成功');
        }else{
            return back() -> with('error','添加失败');
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
        //彻底删除
        
        $shuffling = Lunbo::onlyTrashed()->find($id);
        $res = $shuffling -> forceDelete();
        if($res == 0){
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shuffling = new Lunbo;
        $shuffling = Lunbo::find($id);

        return view('admin.banner.edit',['shuffling' => $shuffling]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LunboRequest $request, $id)
    {
       $res = $request -> except('_token');
        $shuffling = Lunbo::find($id);
        
        $file = $request -> file('picture');
       
        // 获取文件后缀
        $hz = $file -> getClientOriginalExtension();
        
        // 随机文件名
        $file_name = str_random();
        
        // 拼接文件名
        $name = $file_name.'.'.$hz;
        
      
       
       
        // 移动到指定位置
        $file -> move('./uploads/',$name);
      
        
        // 管理员修改
        $shuffling -> name = $res['name'];
        $shuffling -> banner_url = $res['banner_url'];
        $shuffling -> picture = $name;
        $shuffling -> status = $shuffling['status'];
        $respon = $shuffling -> save();
        //判断修改
         if($respon){
            return redirect('/shuffling') -> with('success','修改成功');
        }else{
            return back() -> with('error','修改失败');
        }
    }


    public function destroy($id)
    {
        $shuffling = Lunbo::find($id);
        $res = $shuffling -> delete();
        if($res){
            return redirect('/shuffling') -> with('success','删除成功');
        }else{
            return back() -> with('error','删除失败');
        }
        
    } 


     public function getDelete()
    {
        $data = Lunbo::all(); //获取所有数据
        $del_data = Lunbo::onlyTrashed()->get();// 获取删除数据

        return view('admin.banner.delete',['data'=>$data,'del_data'=>$del_data]);
        
    }

    //回收站还原
    
    public function getReset($id)
    {
        $res = Lunbo::withTrashed()->where('id','=',$id)->restore();
        if($res){
            return back();
        }
    }
}


