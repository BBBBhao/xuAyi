@extends('admin.layout.index')

@section('content')
	<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i> 商品详情页</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>商品名称</th>
                        <th>商品列表展示图</th>
                        <th>参数</th>
                        <th>颜色</th>
                        <th>详情页商品描述</th>
                        <th>操作</th>
                    </tr>
                   
                </thead>
                <tbody class="mws-table">
               
                    <tr>
                        <td>{{ $goodsdetails -> id }}</td>
                        <td>{{ $goodsdetails -> goods_details -> gname }}</td>
                        <td>
                            <img src="/image/uploads/{{ $goodsdetails -> goods_details -> pic }}" alt="" style="width:80px">
                        </td>
                        <td>{{ $goodsdetails -> type }}</td>
                        <td>{{ $goodsdetails -> description }}</td>
                        <td>{{ $goodsdetails -> color }}</td>
                        <td>
                           <a href="/admin/goodsdetails/{{ $goodsdetails -> id }}/edit" class="btn btn-inverse btn-small">修改</a>
                           <a href="/admin/goods/" class="btn btn-inverse btn-small">返回</a>
                        </td>
                    </tr>
              
                </tbody>
            </table>
        </div> 

    </div>
   
    <div class="mws-panel-body">
        <ul class="thumbnails mws-gallery">
        @foreach($goodsimages as $k => $v)
            <li>
                <span >
                    <img src="/image/uploads/{{ $v -> images }}" alt="">
                </span>
                <span class="mws-gallery-overlay">
                    <a href="/admin/goodsimages/{{ $v -> id }}/edit" class="mws-gallery-btn"><i class="icon-pencil"></i></a>
                    
                    <form action="/admin/goodsimages/{{ $v -> id }}" method="post" style="display: inline;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button value="删除" class="mws-gallery-btn"><i class="icon-trash"></i></button>
                    </form>
                </span>
            </li>
        @endforeach
        </ul>
    </div>
   
    <div class="center">
    	<nav>
           
        </nav>
    </div>

@endsection