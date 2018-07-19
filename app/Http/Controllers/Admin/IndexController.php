<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users;
use App\Models\UserDetails;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = UserDetails::where('uid',session('user')['uid'])->first();
        // dd($user -> nickname);
        // 加载后台首页模板
        return view('Admin.index.index',['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        //
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
        //
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
    /**
     * 修改个人信息页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function info()
    {
        $user = UserDetails::where('uid',session('user')['uid'])->first();
        // 获取信息
        $face = UserDetails::where('uid',session('user')['uid'])->first();
        // dd(session('user')['uname']);
        return view('admin.user.info',['face' => $face,'user' => $user ]);
    }
    /**
     * 修改信息
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function doinfo(Request $request )
    { 
        // 判断用户输入
        $res = $request -> except('_token','face');
        // dd($res['nickname']);
        $rule = [
            'tel' => 'required|regex:/^1[34578][0-9]{9}$/',
            'email' => 'required|email',
            'addr' => 'required',
        ];

        $msg = [
            'tel.required' => '手机号码必填',
            'tel.regex' => '手机号码格式不正确',
            'email.required' => '邮箱地址必填',
            'email.email' => '邮箱格式不正确',
            'addr.required' => '地址必填',
        ];
        $validator = Validator::make($res,$rule,$msg);
        // 如果验证失败
        if($validator->fails()){
            return back() -> withErrors($validator) -> withInput();
        }
        // 是否有上传文件
        // dd($request -> hasFile('face'));
        if($request -> hasFile('face')){
            // 文件上传
            $file = $request -> file('face');
            // 获取文件后缀
            $hz = $file -> getClientOriginalExtension();
            // 随机文件名
            $file_name = str_random(20);
            // 拼接文件名
            $name = $file_name.'.'.$hz;
            $file -> move('./uploads/',$name);
            $face = UserDetails::find(session('user')['uid']);
            $face -> tel = $res['tel'];
            $face -> nickname = $res['nickname'];
            $face -> email = $res['email'];
            $face -> addr = $res['addr'];
            $face -> face = $name;
            if($face -> save()){
                return redirect('/admin') -> with('success','修改成功');
            }else{
                return back() -> with('error','修改失败');
            }

        }else{
            $face = UserDetails::find(session('user')['uid']);
            $face -> nickname = $res['nickname'];
            $face -> tel = $res['tel'];
            $face -> email = $res['email'];
            $face -> addr = $res['addr'];
            if($face -> save()){
                return redirect('/admin') -> with('success','修改成功');
            }else{
                return back() -> with('error','修改失败');
            }
        }
    }
    /**
     * 修改密码页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pass()
    {
        $user = UserDetails::where('uid',session('user')['uid'])->first();
        return view('admin.user.repwd',[ 'user' => $user ]);
    }
    /**
     * 修改密码
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function dopass()
    {
        $res = Input::except('_token');
        // dd($res);
        // 获取密码
        $user = Users::where('uid',session('user')['uid'])->value('password');
        // dd($user);
        if(Crypt::decrypt($user) != $res['password']){
            return back() -> withErrors('密码输入不正确') -> withInput();
        }
        // 新密码
        $rule = [
            'newpwd' => 'required|between:6,12',
            'renewpwd' => 'same:newpwd',
        ];
        $msg = [
            'newpwd.required' => '密码必须输入',
            'newpwd.between' => '密码格式不正确',
            'renewpwd.same' => '密码不一致',
        ];
        unset($res['password']);
        $validator = Validator::make($res,$rule,$msg);
        if($validator -> fails()){
            return back() -> withErrors($validator) -> withInput();
        }
        //修改密码
        Users::where('uid',session('user')['uid']) ->update(['password'=>\Crypt::encrypt($res['newpwd'])]);

        return redirect('admin/login');
    }
    /**
     * 退出登录
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function quit()
    {
        session(['code'=> null]);
        session(['user'=> null]);

        return redirect('/admin/login');
    }

}
