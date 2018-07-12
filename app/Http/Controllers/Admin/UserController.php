<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use App\Models\Users;
use App\Models\UserDetails;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {   
        // 搜索
        $res = Users::leftjoin('userdetails','users.uid','=','userdetails.uid');
        $res = $res -> where('uname','like','%'.Input::get('search').'%') -> paginate(2);
        // 条件
        $search = Input::get('search');
        // 加载用户页
        return view('Admin.user.index',compact('res','search'));

    public function index()
    {
        // 加载用户列表页
        return view('Admin.user.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // return view('Admin.user.create');

        // 用户添加页面
        return view('Admin.user.create');

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

        // 用户修改   
        $user = Users::find($id);
        // dd($user);
        $user = $user['identity'];
        // dd($user);
        $ud = UserDetails::where('uid','=',$id)->first();
        // dd($ud);
        $ud = $ud['status'];
        // dd($ud);
        return view('Admin.user.edit',compact('user','ud','id'));

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
        // 用户审查   
        $res = $request -> except('_token','_method');
        // dd($res);
        //保存用户身份信息
        $user = Users::find($id);
        // dd($user);
        $user -> identity = $res['indentity'];
        $user -> save();
        //用户是否会禁用
        UserDetails::where('uid','=',$id) -> update(['status'=> $res['status']]);
        return redirect('admin/user');

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
}
