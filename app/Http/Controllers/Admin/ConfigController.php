<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigRequest;
use App\Models\Config;

class ConfigController extends Controller
{
    
    public function index(Request $req)
    {
        // 轮播图数据获取

        $config = Config::where('name','like','%'.$req['name'].'%')->paginate(3);
        $Name = $req -> input('name');
        return view('Admin.config.index',compact('config','Name'));

    }


    public function edit($id)
    {

        // dump ($id);
        $config = new Config;
        $config = Config::find($id);

        return view('admin.config.edit',['config' => $config]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConfigRequest $request, $id)
    {
       $res = $request -> except('_token');

        $config = Config::find($id);

        $file = $request -> file('logo');
        // 获取文件后缀
        $hz = $file -> getClientOriginalExtension();
        // 随机文件名
        $file_name = str_random();
        // 拼接文件名
        $name = $file_name.'.'.$hz;
        // 移动到指定位置
        $file -> move('./uploads/',$name);
        // 修改
            $config -> logo = $name;
            $config -> name = $res['name'];
            $config -> describe = $res['describe'];
            $config -> phone = $res['phone'];
            $config -> number = $res['number'];
            $config -> url = $res['url'];
            $config -> copyright = $res['copyright'];
        //判断修改

         if($config -> save()){
            return redirect('/config') -> with('success','修改成功');
        }else{
            return back() -> with('error','修改失败');
        }
    }


}


