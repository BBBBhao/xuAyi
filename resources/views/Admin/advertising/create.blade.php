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
        	<span>广告添加</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/advertising" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mws-form-inline">
	                <div class="mws-form-row">
		                <label class="mws-form-label">广告名称</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="name" value="">
	                    	</div>
	                    <label class="mws-form-label">广告描述</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="describe" value="">
	                    	</div>
	                    <label class="mws-form-label">链接地址</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="url" value="">
	                    	</div>
	                    <label class="mws-form-label">位置</label>
	                    	<div class="mws-form-item">
	                    		<select name="position">
	                    			<option value="1">1</option>
	                    			<option value="2">2</option>
	                    			<option value="3">3</option>
	                    			<option value="4">4</option>
	                    		</select>
	                    	</div>
	                    <label class="mws-form-label">广告图片</label>
	                    	<div class="mws-form-item">
	                    		<input type="file" class="small" name="img" value="">
	                    	</div>
	                    <label class="mws-form-label">状态</label>
	                    	<div class="mws-form-item">
	                    		<select name="type">
	                    			<option value="1">开启</option>
	                    			<option value="2">关闭</option>
	                    		</select>
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