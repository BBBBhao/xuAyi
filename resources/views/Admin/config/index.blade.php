@extends('admin.layout.index')

@section('content')
	<br>
	<div style= "text-align:center;"><h1>网站配置管理</h1></div>
	<br><br>
	<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>网站配置列表</span>
        </div>
        <div class="mws-panel-body no-padding">

        <form class="form-inline pull-right" action="/config" method="get">
            <div class="form-group" style="background:#fff">
               
                <input type="text" name="name" value="{{ isset($Name) ? $Name : '' }}" class="form-control" id="username" placeholder="名称">
                <button type="submit" class="btn btn-success">搜索</button>
            </div> 
        </form>

                        <table class="mws-table table-hover">
                            <thead>
                                <tr class="active">
                                    <th>网站 ID</th>
                                    <th>网站名称</th>
                                    <th style="width:190px; height:80px;">网站LOGO</th>
                                    <th>网站地址</th>
                                    <th>网站电话</th>
                                    <th>网站版权</th>
                                    <th>网站描述</th>
                                    <th>网站备案</th>
                                    <th>操    作</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($config as $k => $v)
                                <tr style="text-align: center;">
                                    <td>{{ $v -> id }}</td>

                                    <td>{{ $v -> name }}</td>

                                    <td ><a href="{{ $v -> url }}">
                                        <img style="" src="./uploads/{{ $v -> logo }}">
                                    </a>
                                    </td>

                                    <td><a href="{{ $v -> url }}">{{ $v -> url }}</a></td>

                                    <td>{{ $v -> phone }}</td>

                                    <td>{{ $v -> copyright }}</td>

                                    <td>{{ $v -> describe }}</td>

                                    <td>{{ $v -> number }}</td>

                                    
                                    <td>
                                    	<a class="btn btn-success" href="/config/{{ $v -> id }}/edit">进行修改</a>
                                    </td>
                                @endforeach
                               
                            </tbody>
                        </table>
                        
                    </div>
                    <nav class="center">
                        {!! $config->appends(['name' => $Name]) -> render() !!} 
                    </nav>
                </div>
			
@endsection