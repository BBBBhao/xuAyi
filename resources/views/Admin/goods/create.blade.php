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
            <form class="mws-form" action="/admin/goods" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mws-form-inline">

                	<!-- 商品列表  开始 -->
	                <div class="mws-form-row">
		                <label class="mws-form-label">商品名称</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="gname" value="">
	                    	</div>
                    </div>
                    			
                    <div class="mws-form-row">
	                    <label class="mws-form-label">所属分类</label>
	                    <div class="mws-form-item">
	                    	<select class="small" name="cid">
	                    	<option value="">--- 请选择 ---</option>
	                    	@foreach($cates as $k => $v)
							<option value="{{ $v -> id }}">{{ $v -> cname}}</option>
	                    	@endforeach
	                    	
	                    	</select>
                   		</div>
                    </div>

                    <div class="mws-form-row">
		                <label class="mws-form-label">商品图片</label>
	                    	<div class="mws-form-item">
	                    		<input type="file" style="width: 50%; padding-right: 85px;" name="pic" value="">
	                    	</div>
                    </div>

                    <div class="mws-form-row">
		                <label class="mws-form-label">商品描述</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="describe" value="">
	                    	</div>
                    </div>

                     <div class="mws-form-row">
		                <label class="mws-form-label">商品价格</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="price" value="">
	                    	</div>
                    </div>

                    <div class="mws-form-row">
		                <label class="mws-form-label">商品折扣现价</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="discount" value="">
	                    	</div>
                    </div>

					<!-- 商品列表  结束-->

					<!-- 商品详情表  开始 -->
                    <div class="mws-form-row">
		                <label class="mws-form-label">商品详情描述</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="description" value="">
	                    	</div>
                    </div>

                    <div class="mws-form-row">
		                <label class="mws-form-label">商品参数</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="type" value="">
	                    	</div>
                    </div>

                    <div class="mws-form-row">
		                <label class="mws-form-label">商品颜色</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="color" value="">
	                    	</div>
                    </div>
					<!-- 商品详情表  结束 -->

					<!-- 图片管理表  开始 -->
					<div class="mws-form-row">
		                <label class="mws-form-label">商品详请图 -- 多图</label>
	                    	<div class="mws-form-item">
	                    		<input type="file" style="width: 50%; padding-right: 85px;" name="images[]" value="" multiple>
	                    	</div>
                    </div>
                    <!-- 图片管理表  结束 -->

                    <div class="mws-form-row">
		                <input type="hidden" style="" name="state" value="1">
                    </div>

		     	</div>
                <div class="mws-button-row">
                    <input type="submit" value="添加" class="btn btn-inverse btn-small">
                    <input type="reset" value="重置" class="btn btn-inverse btn-small">
                </div>
            </form>
        </div>    	
    </div>
@endsection