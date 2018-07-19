<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecomRequest;
use App\Models\Recom;
use DB;
use App\Models\Goods;

class RecomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        

        $recom = Recom::where('location','like','%'.$req['location'].'%')-> paginate(5);
        $location = $req -> input('location');
        return view('Admin.recom.index',compact('recom','location'));
           // 推荐数据获取

        // $req = $request -> input('search','');
        //     $recom = DB::table('recoms as e')
        //         ->join('goods as g','e.cid','=','g.id')
        //         ->where('g.gname','like','%'.$req.'%')
        //         ->where('e.deleted_at','=', null)
        //         ->select('e.id','g.gname','g.pic','e.location','e.introduction')
        //         ->paginate(14)->appends($request->input());
        //          //dump($recom);
        //             //dump($recom);
        //          return view('Admin.recom.index',compact('recom'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       $recom = Goods::all();
       // dump($recom);
        return view('admin.recom.create',['recom' => $recom]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecomRequest $request)
    {
         $req = $request -> all();
         //dump($req);      
        $recom = new Recom;
        $recom -> cid = $req['cid'];
        $recom -> location = $req['location'];
        $recom -> introduction = $req['introduction'];
        $res = $recom -> save();
        if($res){
            return redirect('/recom')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recom = Recom::find($id);
        $cid = $recom -> cid;

        $good = Goods::where('id', '=', $cid)->first();
        //dd($recom -> goodrecommend);

        return view('admin.recom.edit',['recom' => $recom, 'good' => $good]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecomRequest $request, $id)
    {
        //dump($id);
         $req = $request -> all();
        // //dump($req);      
        $recom = Recom::find($id);

        //$recom -> cid = $req['cid'];
        $recom -> location = $req['location'];
        $recom -> introduction = $req['introduction'];
        $res = $recom -> save();
        if($res){
            return redirect('/recom')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        } 
    }    

    public function destroy($id)
    {
        // 删除数据
        $recom = Recom::find($id);
        //dump($recom);
        $res = $recom -> delete();
        if($res){
            return redirect('/recom') -> with('success','删除成功');
        }else{
            return back() -> with('error','删除失败');
        }
        
    } 


     public function getDelete()
    {
        

        // $data = Recom::all(); //获取所有数据

        $del_data = Recom::onlyTrashed()->get();// 获取删除数据 

        return view('admin.recom.delete',['del_data'=>$del_data]);
        
    }

    
    public function getReset($id)
    {   
        //回收站还原

        $res = Recom::withTrashed()->where('id','=',$id)->restore();
        if($res){
            return back();
        }
    }

    public function cheshan($id)
    {   
       // echo '1';
        $recom = Recom::onlyTrashed()->find($id);
        $res = $recom -> forceDelete();
        if($res == 0){
            return back();
        }
    }


}


