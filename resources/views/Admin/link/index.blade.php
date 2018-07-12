@extends('admin.layout.index')

@section('content')
	<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i> 友情链接</span>
        </div>
        <div class="mws-panel-body no-padding">
        <form class="form-inline pull-right" action="/admin/link" method="get">
            <div class="form-group" style="background:#ddd">
                <input type="text" name="name" value="{{ isset($Name) ? $Name : '' }}" class="form-control" placeholder="搜索名称">
                <button type="submit" class="btn btn-success">搜索</button>
            </div> 
        </form>
             <table class="mws-table table-hover">
                 <thead>
                    <tr class="active">
                         <th>ID</th>
                         <th>链接名称</th>
                         <th>链接路径</th>
                         <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($link as $k => $v)
                    <tr >
                        <td style = "text-align : center">{{ $v -> id }}</td>
                        <td style = "text-align : center">{{ $v -> name }}</td>
                        <td style = "text-align : center">{{ $v -> url }}</td>
                        <td>
                        <a href="/admin/link/{{ $v -> id }}/edit" class="btn btn-info" >修改</a>
                        <form class="form-inline pull-right" action="/admin/link/{{ $v -> id }}" method="post">
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
          {!! $link->appends(['name' => $Name]) -> render() !!}
    </nav>
    </div>		
@endsection