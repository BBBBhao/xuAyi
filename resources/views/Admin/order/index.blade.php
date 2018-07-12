@extends('admin.layout.index')

@section('content')
	<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i> 订单列表</span>
        </div>
        <div class="mws-panel-body no-padding">
        <form class="form-inline pull-right" action="/admin/order" method="get">
            <div class="form-group" style="background:#ddd">
                <input type="text" name="name" value="{{isset($Name) ? $Name : '' }}" class="form-control" placeholder="搜索名称">
                <button type="submit" class="btn btn-success">搜索</button>
            </div>
        </form>
             <table class="mws-table table-hover">
                 <thead>
                    <tr class="active">
                         <th>ID</th>
                         <th>订单号</th>
                         <th>下单时间</th>
                         <th>订单总额</th>
                         <th>下单用户</th>
                         <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($order as $k => $v)
                    <tr style = "text-align : center">
                        <td>{{ $v -> id }}</td>
                        <td>{{ $v -> guid }}</td>
                        <td>{{ $v -> created_at }}</td>
                        <td>{{ $v -> total }}</td>
                        <td>{{ $v -> recipients }}</td>
                        <td><a href = "/admin/order/details" class="btn btn-info">订单详情</a></td>
                    </tr>
                    @endforeach
                </tbody>          
            </table>
        </div>
    </div>		
@endsection