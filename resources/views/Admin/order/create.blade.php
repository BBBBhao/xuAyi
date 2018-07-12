@extends('admin.layout.index')

@section('content')

	@if (count($errors) > 0)
	    <div class="mws-form-message error">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<div class="mws-panel grid_8">
		<div class="mws-panel-header">
        	<span>暂时性订单添加</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/order" method="post">
                {{ csrf_field() }}
                <div class="mws-form-inline">
	                <div class="mws-form-row">
	                    <label class="mws-form-label">订单号</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="guid" value="">
	                    	</div>
	                    <label class="mws-form-label">订单总额</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="total" value="">
	                    	</div>
	                    <label class="mws-form-label">下单用户</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="recipients" value="">
	                    	</div>
                    </div>
		     	</div>
                <div class="mws-button-row">
                    <input type="submit" value="添加" class="btn btn-success">
                    <input type="reset" value="重置" class="btn btn-info">
                </div>
            </form>
        </div>    	
    </div>
@endsection