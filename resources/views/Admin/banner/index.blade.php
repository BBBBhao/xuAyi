@extends('admin.layout.index')

@section('content')
	<br>
	<div style= "text-align:center;"><h1>轮播图管理</h1></div>
	<br><br>
	<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>轮播列表</span>
        </div>
        <div class="mws-panel-body no-padding">

        <form class="form-inline pull-right" action="/shuffling" method="get">
            <div class="form-group" style="background:#fff">
               
                <input type="text" name="name" value="{{ isset($Name) ? $Name : '' }}" class="form-control" id="username" placeholder="名称">
                <button type="submit" class="btn btn-success">搜索</button>
            </div> 
        </form>

                        <table class="mws-table table-hover">
                            <thead>
                                <tr class="active">
                                    <th style="width:20px; height:35px;">轮播 ID</th>
                                    <th style="width:100px; height:35px;">轮播名称</th>
                                    <th style="width:100px; height:60px;">轮播图片</th>
                                    <th style="width:80px; height:35px;">链接路径</th>
                                    <th style="width:30px; height:35px;">轮播状态</th>
                                    <th style="width:60px; height:35px;">操    作</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($shuffling as $k => $v)
                                <tr style="text-align: center;">
                                    <td style="width:20px; height:35px;" >{{ $v -> id }}</td>
                                    <td style="width:100px; height:100px;">{{ $v -> name }}</td>

                                    <td style="width:100px; height:60px;"><a href="{{ $v -> banner_url }}"><img style="" src="./uploads/{{ $v -> picture }}"></a></td>

                                    <td style="width:80px; height:35px;" ><a href="{{ $v -> banner_url }}">{{ $v -> banner_url }}</a></td>

                                    <td style="width:30px; height:35px;">{{ $v -> status == 1 ? '开启' : '禁用' }}</td>
                                    
                                    <td style="width:60px; height:35px;">
                                    	<a class="btn btn-success" href="/shuffling/{{ $v -> id }}/edit">进行修改</a>
                                    <br >
                                    <br >

                                <form action="/shuffling/{{ $v -> id }}" method="post" >

                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                    	 <input  type="submit" value="进行删除" class="btn btn-success"></form><br>

                                        
                                        
                                    </td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                        
                    </div>
                    <nav class="center">
                        {!! $shuffling->appends(['name' => $Name]) -> render() !!} 
                    </nav>
                </div>
			
@endsection