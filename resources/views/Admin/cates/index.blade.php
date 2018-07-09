@extends('admin.layout.index')

@section('content')
	<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i> 分类列表</span>
        </div>
        <div class="mws-panel-body no-padding">

        <form class="form-inline pull-right" action="/admin/cates" method="get">
            <div class="form-group" style="background:#ddd">
               
                <input type="text" name="search" class="form-control" id="username" placeholder="用户名">
                <button type="submit" class="btn btn-success">搜索</button>
            </div> 
        </form>




                        <table class="mws-table table-hover">
                            <thead>
                                <tr class="active">
                                    <th>ID</th>
                                    <th>分类名称</th>
                                    <th>父级分类ID</th>
                                    <th>分类路径</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($cates as $k => $v)
                                <tr>
                                    <td>{{ $v -> id }}</td>
                                    <td>{{ $v -> cname }}</td>
                                    <td>{{ $v -> pid }}</td>
                                    <td>{{ $v -> path }}</td>
                                    <td>{{ $v -> status == 1 ? '开启' : '禁用' }}</td>
                                    <td>
                                    	<a href="/admin/cates/{{ $v -> id }}/edit">修改</a>
                                    	<a href="">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- 
                                                    <nav >
                                                      {!! $cates->render() !!}
                                                        </nav> -->
                      
                    </div> 
                </div>
			
@endsection