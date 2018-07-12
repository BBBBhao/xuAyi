@extends('admin.layout.index')

@section('content')
	<br>
	<div style= "text-align:center;"><h1>推荐位管理</h1></div>
	<br><br>
	<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>推荐列表</span>
        </div>
        <div class="mws-panel-body no-padding">

        <form class="form-inline pull-right" action="/recom" method="get">
            <div class="form-group" style="background:#fff">
               
                <input type="text" name="location" value="{{ isset($location) ? $location : '' }}" class="form-control" id="username" placeholder="名称">
                <button type="submit" class="btn btn-success">搜索</button>
            </div> 
        </form>

                        <table class="mws-table table-hover">
                            <thead>
                                <tr class="active">
                                    <th style="width:20px; height:35px;">推荐 ID</th>

                                    <th style="width:100px; height:35px;">推荐名称</th>

                                    <th style="width:100px; height:60px;">推荐图片</th>

                                    <th style="width:80px; height:35px;">推荐位置</th>

                                    <th style="width:30px; height:35px;">推荐导语</th>

                                    <th style="width:60px; height:35px;">操    作</th>

                                </tr>
                            </thead>
                            <tbody>

                            	@foreach($recom as $k => $v)
                                <tr style="text-align: center;">

                                    <td style="width:20px; height:35px;" >{{ $v -> id }}</td>

                                    <td style="width:100px; height:100px;">{{ $v -> goodrecommend ->gname }}</td>

                                    <td style="width:100px; height:60px;">{{ $v -> goodrecommend -> pic}}</td>

                                    <td style="width:100px; height:100px;">{{ $v -> location }}</td>

                                    <td style="width:100px; height:100px;">{{ $v -> introduction }}</td>
                                    
                                    <td style="width:60px; height:35px;">
                                    	<a class="btn btn-success" href="/recom/{{ $v -> id }}/edit">进行修改</a>

                                    <br >
                                    <br >

                                <form action="/recom/{{ $v -> id }}" method="post" >

                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            
                                    	 <input  type="submit" value="进行删除" class="btn btn-success">
                                </form><br>

                                        
                                        
                               
                                @endforeach
                               
                            </tbody>
                        </table>
                        
                    </div>
                    <nav class="center">
                        {!! $recom->appends(['location' => $location]) -> render() !!} 
                    </nav>
                </div>
			
@endsection