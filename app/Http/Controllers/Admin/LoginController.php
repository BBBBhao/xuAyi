<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users;
use App\Models\UserDetails;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * 加载登录页
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.login.index');
    }

    /**
     * 加载注册页
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.login.create');
    }

    /**
     * 用户注册
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //判断用户输入
        $res = $request -> except('_token','face');
        // dd($res);
        $rule = [
            'uname' => 'between:5,10|alpha|unique:users,uname',
            'password' => 'required|between:6,12',
            'repwd' => 'same:password',
        ];

        $msg = [
            // 'uname.required' => '用户名必须输入',
            'uname.between' => '用户名格式不正确',
            'uname.alpha' => '用户名只允许为字母',
            'uname.unique' => '用户必须唯一',
            'password.required' => '密码必须输入',
            'password.between' => '密码格式不正确',
            'repwd.same' => '密码不一致',
        ];

        $validator = Validator::make($res,$rule,$msg);
        //如果验证失败
        if($validator->fails()){
            return back() -> withErrors($validator) -> withInput();
        }
        //存放数据
        $user = new Users();
        $user -> uname = $res['uname'];
        $user -> password = \Crypt::encrypt($res['password']);
        $user -> identity = 2;
        $user -> save();
        $id = $user -> uid;

        $userdetail = new UserDetails();
        $userdetail -> uid = $id;
        $userdetail -> status = 1;
        $userdetail -> save();

        return redirect('/admin/login');
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
     * 登录验证
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dologin()
    {
        $res = Input::except('_token');
        // dd($res);
        $user = Users::where('uname',$res['uname'])->first();
        // dd($user);
        $UserDetail = UserDetails::where('uid',$user['uid'])->first();
        // dd($UserDetail);
        //如果数据库中没有此用户，返回登录页面
        if(!$user){
            return back()->withErrors('没有这个用户') -> withInput();
        }
        //验证密码
        if(Crypt::decrypt($user['password']) != trim($res['password'])){
            return back()->withErrors('密码错误') -> withInput();
        }

        //验证码
        // if(session('code') != $res['captcha'])
        // {
        //     return back()->withErrors('验证码错误') -> withInput();
        // }
        
        //验证身份
        if($user['identity'] != 1){
            return back()->withErrors('您没有管理员权限') -> withInput();
        }
        if ( $UserDetail['status'] == 0){
            return back()->withErrors('当前用户已被禁用，请您联系客服。') -> withInput();
        }
        session(['user'=>$user]);
        return redirect('/admin');
    }
}
