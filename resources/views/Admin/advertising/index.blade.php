@extends('admin.layout.index')

@section('content')
	<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i> 广告列表</span>
        </div>
        <div class="mws-panel-body no-padding">
        <form class="form-inline pull-right" action="/admin/advertising" method="get">
            <div class="form-group" style="background:#ddd">
                <input type="text" name="name" value="{{ isset($Name) ? $Name : '' }}" class="form-control" placeholder="搜索名称">
                <button type="submit" class="btn btn-success">搜索</button>
            </div> 
        </form>
             <table class="mws-table table-hover">
                 <thead>
                    <tr class="active">
                         <th>ID</th>
                         <th>广告名称</th>
                         <th>广告描述</th>
                         <th>图片位置</th>
                         <th>图片</th>
                         <th>链接地址</th>
                         <th>状态</th>
                         <th>操作</th>
                    </tr>
                </thead>  
                <tbody>
                     @foreach($advertising as $k => $v)
                    <tr >
                        <td style = "text-align : center">{{ $v -> id }}</td>
                        <td style = "text-align : center">{{ $v -> name }}</td>
                        <td style = "text-align : center">{{ $v -> describe }}</td>
                        <td style = "text-align : center">{{ $v -> position }}</td>
                        <td style = "text-align : center">{{ $v -> image }}</td>
                        <td style = "text-align : center">{{ $v -> url }}</td>
                        <td style = "text-align : center">{{ $v -> type }}</td>
                        <td>
                        <a href="/admin/advertising/{{ $v -> id }}/edit" class="btn btn-info" >修改</a>
                        <form class="form-inline pull-right" action="/admin/advertising/{{ $v -> id }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }} 
                            <button class="btn btn-info">删除</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>                 
            </table>
        </div>
        <nav class="center">
          {!! $advertising->appends(['name' => $Name]) -> render() !!}
        </nav>
    </div>		
@endsection