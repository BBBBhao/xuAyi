<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\Models\Addresss;
use App\Models\Users;
use App\Models\UserDetails;
use DB;

class AdressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    /**
     * 用户地址显示
     */
    public function adress()
    {
        // $addr = Addresss::where('user_id',session('user')['uid'])->first();
        $addr = Addresss::all();
        // dd($addr);

        return view('home.user.Member_Address',['addr' => $addr]);
    }
    
    /**
     * 用户地址添加
     */
    public function doaddr(Request $request)
    {
        //判断用户输入
        $res = $request -> except('_token');
        // dd($res);
        // $addr = Addresss::where('user_id',session('user')['uid'])->first();
        // dd($addr);
        $rule = [
            'consignee' => 'required',
            'tel'=>'required|regex:/^1[34578][0-9]{9}$/',
            'detailed_address' => 'required',
            'name1' => 'required',
            'name2' => 'required',
            'name3' => 'required',
        ];

        $msg = [
            'consignee.required' => '收货人必须输入',
            'tel.regex' => '手机号格式不正确',
            'tel.required' => '手机号必填',
            'detailed_address.required' => '详细地址必须输入',
            'name1.required' => '省份必须输入',
            'name2.required' => '城市必须输入',
            'name3.required' => '县必须输入',
        ];

        $validator = Validator::make($res,$rule,$msg);
        //如果验证失败
        if($validator->fails()){
            return back() -> withErrors($validator) -> withInput();
        }
        $id = session('user')['uid'];
        //存放数据
        $addr = new Addresss();
        $addr -> consignee = $res['consignee'];
        $addr -> tel = $res['tel'];
        $addr -> province = $res['name1'];
        $addr -> city = $res['name2'];
        $addr -> county = $res['name3'];
        $addr -> detailed_address = $res['detailed_address'];
        $addr -> status = 1;
        $addr -> user_id = $id;
        $addr -> save();
        
        return redirect('/home/adress');

    }
    /**
     * 用户地址添加页
     */
    public function addadress()
    {
        return view('home.user.Member_Addaddress');
    }
    /**
     * 用户地址修改
     */
    public function addrupdate(Request $request,$id)
    {
        //判断用户输入
        $res = $request -> except('_token');
        // dd($res);
        // $addr = Addresss::where('user_id',session('user')['uid'])->first();
        // dd($addr);
        $rule = [
            'consignee' => 'required',
            'tel'=>'required|regex:/^1[34578][0-9]{9}$/',
            'detailed_address' => 'required',
            'name1' => 'required',
            'name2' => 'required',
            'name3' => 'required',
        ];

        $msg = [
            'consignee.required' => '收货人必须输入',
            'tel.regex' => '手机号格式不正确',
            'tel.required' => '手机号必填',
            'detailed_address.required' => '详细地址必须输入',
            'name1.required' => '省份必须输入',
            'name2.required' => '城市必须输入',
            'name3.required' => '县必须输入',
        ];

        $validator = Validator::make($res,$rule,$msg);
        //如果验证失败
        if($validator->fails()){
            return back() -> withErrors($validator) -> withInput();
        }
        $addr = Addresss::find($id);
        $addr -> consignee = $res['consignee'];
        $addr -> tel = $res['tel'];
        $addr -> province = $res['name1'];
        $addr -> city = $res['name2'];
        $addr -> county = $res['name3'];
        $addr -> detailed_address = $res['detailed_address'];
        $addr -> save();
        return redirect('/home/adress');

    }
    /**
     * 用户地址修改页
     */
    public function doadress($id)
    {
        $addr = Addresss::find($id);
        // dd($addr);
        return view('home.user.Member_Doaddress',['addr' => $addr]);
    }

    /**
     *  默认地址修改页
     */
    public function addrdefault($id)
    {
        // $uid = session('user')['uid']
        // $addr = Addresss::where('user_id',$id);
        // $addr = DB::table('users')->join('Addresss','$uid','=','Addresss.user_id')->get();
        // foreach ($addr as $key => $value) {
        //     $status = $value -> status;
        //     $id = $value -> id;
        // }

        // dump(session('user'));
        // $addr = DB::select('select * from Addresss where $uid');
        
        // dd($addr->user_id);
        
        // dd($addr);
        // $addr = Addresss::where('user_id',session('user')['uid'])->first();
        // dump($addr);
        // $addr = Addresss::find($id);
        // $addr -> status = 2;
        // $addr -> save();
        // return redirect('/home/adress');
        // dump($addr);
        // return view('home.user.Member_Doaddress',['addr' => $addr]);
    }
    /**
     *  地址删除
     */
    public function addrdel($id)
    {
        // 获取数据
        $addr = Addresss::find($id);
        // dump($addr);
        // 删除数据
        $res = $addr -> delete();
        if($res){
            return redirect('/home/adress') -> with('success','删除成功');
        }else{
            return back() -> with('error','删除失败');
        }
    }
}
