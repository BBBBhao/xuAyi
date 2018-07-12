@extends('Admin.layout.index')

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
        	<span>添加商品</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/goods/{{ $goods -> id }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <!-- 商品列表开始 -->
                <div class="mws-form-inline">
	                <div class="mws-form-row">
		                <label class="mws-form-label">商品名称</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="gname" value="{{ $goods -> gname }}">
	                    	</div>
                    </div>
                    			
                    <div class="mws-form-row">
	                    <label class="mws-form-label">所属分类</label>
	                    <div class="mws-form-item">
	                    	<select class="small" name="cid">
	                    	<option value="">--- 请选择 ---</option>
	                    	@foreach($cates as $k => $v)
							<option value="{{ $v -> id }}" {{ $v -> id == $goods -> cid ? 'selected' : '' }}>{{ $v -> cname}}</option>
	                    	@endforeach
	                    	</select>
                   		</div>
                    </div>

                    <div class="mws-form-row">
		                <label class="mws-form-label">商品图片</label>
	                    	<div class="mws-form-item">
	                    		<input type="file" style="width: 50%; padding-right: 85px;" name="pic" value="" placeholder="">
	                    		 <img src="/image/uploads/{{ $goods -> pic }}" alt="" style="width:70px" >
	                    	</div>
                    </div>

                    <div class="mws-form-row">
		                <label class="mws-form-label">商品描述</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="describe" value="{{ $goods -> describe }}">
	                    	</div>
                    </div>

                    <div class="mws-form-row">
		                <label class="mws-form-label">商品价格</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="price" value="{{ $goods -> price }}">
	                    	</div>
                    </div>

                    <div class="mws-form-row">
		                <label class="mws-form-label">商品折扣现价</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="discount" value="{{ $goods -> discount }}">
	                    	</div>
                    </div>
                    <!-- 商品列表结束 -->


		     	</div>
                <div class="mws-button-row">
                    <input type="submit" value="添加" class="btn btn-success">
                    <input type="reset" value="重置" class="btn btn-info">
                </div>
            </form>
        </div>    	
    </div>
@endsection