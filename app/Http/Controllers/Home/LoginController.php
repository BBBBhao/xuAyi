<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\UserDetails;
use app\Helper\functions;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder; 

class LoginController extends Controller
{
    /**
     * 前台登陆页
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        // dump(randStr(10));
        return view('home.login.login');
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

    // 注册页
    public function register()
    {
        return view('home.login.Regist');
    }

    // 用户注册
    public function doregister()
    {
        $res = Input::except('_token');
        // dd($res);
        $rule = [
            'uname' => 'between:5,10|alpha|unique:users,uname',
            'email' => 'required|email',
            'phone'=>'required|regex:/^1[34578][0-9]{9}$/',
            'password' => 'required|between:6,12',
            'repwd' => 'same:password',
            'captcha' => 'required|captcha',
        ];
        $msg = [
            'uname.between' => '用户名格式不正确',
            'uname.alpha' => '用户名只允许为字母',
            'uname.unique' => '用户已被注册',
            'email.required' => '邮箱必填',
            'email.email' => '邮箱格式不正确',
            'phone.regex' => '手机号格式不正确',
            'phone.required' => '手机号必填',
            'password.required' => '密码必须输入',
            'password.between' => '密码格式不正确',
            'repwd.same' => '密码不一致',
            'captcha.required' => '请输入验证码',
            'captcha.captcha' => '验证码错误',
        ];
        $validator = Validator::make($res,$rule,$msg);
        //如果验证失败
        if($validator->fails()){
            return back() -> withErrors($validator) -> withInput();
        }
        // 生成随机用户名
        $username = randStr(10);
        //存放数据
        $user = new Users();
        $user -> uname = $res['uname'];
        $user -> password = \Crypt::encrypt($res['password']);
        $user -> identity = 2;
        $user -> save();
        $id = $user -> uid;

        $userdetail = new UserDetails();
        $userdetail -> uid = $id;
        $userdetail -> username = $username;
        $userdetail -> nickname = $username;
        $userdetail -> email = $res['email'];
        $userdetail -> status = 1;
        $userdetail -> tel = $res['phone'];
        $userdetail -> user_token = $user -> password;
        $userdetail -> save();
        $userdetail -> uname = $user -> uname;

        // Mail::send('emails.active', ['user' => $userdetail], function ($m) use ($userdetail) {
        //     $m->to($userdetail->emill,$userdetail -> uname)->subject('邮箱激活');
        // });

        return redirect('/home/login');

    }
    /**
     * 前台登陆验证
     *
     * @return \Illuminate\Http\Response
     */
    public function dologin(Request $request)
    {
        $res = Input::except('_token');
        // dd($res);
        $user = Users::where('uname',$res['uname'])->first();
        // dd($user);
        $UserDetail = UserDetails::where('uid',$user['uid'])->first();
        // dd($UserDetail);
        // 如果数据库中没有此用户，返回登录页面
        if(!$user){
            return back()->withErrors('没有这个用户') -> withInput();
        }
        // 验证密码
        if(Crypt::decrypt($user['password']) != trim($res['password'])){
            return back()->withErrors('密码错误') -> withInput();
        }
        
        // 验证用户是否被禁用
        if ( $UserDetail['status'] == 0){
            return back()->withErrors('当前用户已被禁用，请您联系客服。') -> withInput();
        }

        session(['user'=>$user]);
        $user -> logintime = date("Y-m-d H:i:s",time());
        $user -> save();
        return redirect('/');
    }
    /**
     * 退出登录
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function loginout()
    {
        $user = Users::where('uid',session('user')['uid'])->first();
        // dd(session('user')['logintime']);
        $user -> lastlogintime = session('user')['logintime'];
        $user -> save();
        session(['code'=> null]);
        session(['user'=> null]);

        return redirect('/home/login');
    }


    // // 手机号注册
    // public function dotelregister()
    // {
    //     $res = Input::except('_token');
    //     // dd($res);
    //     // $yzcode = $res['yzcode'];
    //     // unset($res['yzcode']);
    //     // 手机号验证
    //     $rule = [
    //         'tel'=>'required|regex:/^1[34578][0-9]{9}$/|unique:userdetails,tel',
    //         'password' => 'required|between:6,12',
    //         'repwd' => 'same:password',
    //     ];
    //     $msg = [
    //         'tel.required' => '用户名必填',
    //         'tel.regex' => '用户名格式不正确',
    //         'tel.unique' => '该用户已注册',
    //         'password.required' => '密码必须输入',
    //         'password.between' => '密码格式不正确',
    //         'repwd.same' => '密码不一致',
    //     ];
    //     $validator = Validator::make($res,$rule,$msg);
    //     //如果验证失败
    //     if($validator->fails()){
    //         return back() -> withErrors($validator) -> withInput();
    //     }
    //     // if(session('yzcode') != $yzcode)
    //     // {
    //     //     return back()->withErrors('验证码错误') -> withInput();
    //     // }

    //     //存放数据
    //     $user = new Users();
    //     $user -> uname = $res['tel'];
    //     $user -> password = \Crypt::encrypt($res['password']);
    //     $user -> identity = 2;
    //     $user -> save();
    //     $id = $user -> uid;

    //     $userdetail = new UserDetails();
    //     $userdetail -> uid = $id;
    //     $userdetail -> tel = $res['tel'];
    //     $userdetail -> status = 1 ;
    //     $userdetail -> save();

    //     return redirect('/home/login');
    // }
}
