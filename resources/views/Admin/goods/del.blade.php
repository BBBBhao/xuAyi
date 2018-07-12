@extends('admin.layout.index')

@section('content')
	<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i> 分类列表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>商品名称</th>
                        <th>所属分类</th>
                        <th>图片</th>
                        <th>商品描述</th>
                        <th>原价</th>
                        <th>折扣现价</th>
                        <th>操作</th>
                    </tr>
                   
                </thead>
                <tbody class="mws-table">
                    @foreach($del_data as $k => $v)
                        <tr>
                        <td>{{ $v -> id }}</td>
                        <td>{{ $v -> gname }}</td>
                        <td>
                            @foreach($cates as $key => $val)
                                @if($v -> cid == $val -> id)
                                {{ $val -> cname }} 
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <img src="/image/uploads/{{ $v -> pic }}" alt="" style="width:70px" >
                        </td>
                        <td>{{ $v -> describe }}</td>
                        <td>{{ $v -> price }}</td>
                        <td>{{ $v -> discount }}</td>
                        <td>
                            <a href="/admin/goods/del/recover/{{ $v -> id }}" class="btn btn-warning">恢复</a> 
                            <a href="/admin/goods/del/delall/{{ $v -> id }}" onclick="return confirm('确认删除吗？')" class="btn btn-info">永久删除</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
    </div>
    <div class="center">
    	<nav>
           
        </nav>
    </div>

@endsection