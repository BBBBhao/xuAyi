<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisingRequest;
use App\Models\Advertising;

class AdvertisingController extends Controller
{
    
    public function index(Request $req)
    {
        //
        $advertising = advertising::where('name','like','%'.$req['name'].'%')->paginate(3);
        $Name = $req -> input('name');
         return view("Admin.advertising.index",compact('advertising','Name'));
    }

    
    public function create()
    {
        //
        return view('admin.advertising.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertisingRequest $request)
    {
        //
        $data = $request -> except('_token');
        if($request -> hasFile('img')){
            $file = $request -> file('img');
            // dd($file);
            //获取文件后缀
            $hz = $file -> getClientOriginalExtension();
            //随机文件名
            $file_name = str_random(20);
            //拼接文件名
            $name = $file_name.'.'.$hz;
      
           
            //移动到指定位置
            $file -> move('./GGimg/',$name);
         
             //执行添加
            $advertising = new advertising;
            $advertising -> image = $name;
            $advertising -> url = $data['url'];
            $advertising -> describe = $data['describe'];
            $advertising -> position = $data['position'];
            $advertising -> name = $data['name'];
            $advertising -> type = $data['type'];
            $advertising -> save();
        }else{
            //执行添加
            $advertising = new advertising;
            $advertising -> name = $data['name'];
            $advertising -> describe = $data['describe'];
            $advertising -> position = $data['position'];
            $advertising -> url = $data['url'];
            $advertising -> type = $data['type'];
            $advertising -> save();
        }

        // 判断是否添加成功
         if($advertising -> save()){
            return redirect('/admin/advertising') -> with('success','添加成功');
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
        $advertising = advertising::find($id);
        return view('Admin.advertising.edit',['advertising' => $advertising]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertisingRequest $request, $id)
    {
        //dd($id);
        $advertising = Advertising::find($id);
        //dd($advertising);
        $data = $request -> except('_token');
        //dd($data);
        if($request -> hasFile('img')){
            $file = $request -> file('img');
            // dd($file);
            //获取文件后缀
            $hz = $file -> getClientOriginalExtension();
            //随机文件名
            $file_name = str_random(20);
            //拼接文件名
            $name = $file_name.'.'.$hz;
      
           
            //移动到指定位置
            $file -> move('./GGimg/',$name);
         
             //修改修改
            $advertising = new Advertising;
            $advertising -> image = $name;
            $advertising -> url = $data['url'];
            $advertising -> describe = $data['describe'];
            $advertising -> position = $data['position'];
            $advertising -> name = $data['name'];
            $advertising -> type = $data['type'];

        }else{
            //执行修改
            $advertising = new Advertising;
            $advertising -> name = $data['name'];
            $advertising -> describe = $data['describe'];
            $advertising -> position = $data['position'];
            $advertising -> url = $data['url'];
            $advertising -> type = $data['type'];

        }

        // 判断是否修改成功
         if($advertising -> save()){
            return redirect('/admin/advertising') -> with('success','修改成功');
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
        //
        $advertising = Advertising::find($id); 
        $res = $advertising -> delete();
        if($res){
            return redirect('/admin/advertising') -> with('success','删除成功');
        }else{
            return back() -> with('error','删除失败');
        }
    }
}
