<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkRequest;
use App\Models\Link;

class linkController extends Controller
{
    /**
     * Display a listing of the resource..
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //echo " 1 ";
        $link = link::where('name','like','%'.$req['name'].'%')->paginate(3);
        $Name = $req -> input('name');
        return view("Admin.link.index",compact('link','Name'));
    }

    /**
     * Show the form for creating a new resource.
     ******
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("Admin.link.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinkRequest $request)
    {
        $links = new link;

        $links -> name = $request -> input('name','');
        $links -> url = $request -> input('url','');

        if($links -> save()){
            return redirect('/admin/link') -> with('success','添加成功');
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
        $link = link::find($id);
        return view('Admin.link.edit',['link' => $link]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LinkRequest $request, $id)
    {
        $links = link::find($id);

        $links -> name = $request -> input('name','');
        $links -> url = $request -> input('url','');

        if($links -> save()){
            return redirect('/admin/link') -> with('success','修改成功');
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
        $links = link::find($id); 
        $res = $links -> delete();
        if($res){
            return redirect('/admin/link') -> with('success','删除成功');
        }else{
            return back() -> with('error','删除失败');
        }
        
    }
}
