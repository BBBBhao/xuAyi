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
                @foreach($order as $k => $v)
                    <td>收货地址</td>
                    <td><input type="text" readonly>{{ $v -> address_message }}</td>
                    <td>订单信息</td>
                    <td><input type="text" readonly>订单号：{{ $v -> guid }}</td>
                 <thead>
                    <tr class="active">
                         <th>商品</th>
                         <th>商品图片</th>
                         <th>商品描述</th>
                         <th>单价</th>
                         <th>总价</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style = "text-align : center">
                        <td>{{ $v -> id }}</td>
                        <td>{{ $v -> guid }}</td>
                        <td>{{ $v -> created_at }}</td>
                        <td>{{ $v -> total_amount }}</td>
                        <td>{{ $v -> user_id }}</td>
                    </tr>
                @endforeach
                </tbody>          
            </table>
        </div>
    </div>		
@endsection