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
            <form class="mws-form" action="/admin/goodsdetails/{{ $good_details -> id }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="mws-form-inline">

                	<!-- 商品列表  开始 -->
	                <div class="mws-form-row">
		                <label class="mws-form-label">商品名称</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="gname" value="{{ $good_details -> goods_details -> gname }}" readonly>
	                    	</div>
                    </div>
                    <!-- 商品列表  开始 -->			
                    
					<!-- 商品详情表  开始 -->
                    <div class="mws-form-row">
		                <label class="mws-form-label">商品详情描述</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="description" value="{{ $good_details -> description }}">
	                    	</div>
                    </div>

                    <div class="mws-form-row">
		                <label class="mws-form-label">商品参数</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="type" value="{{ $good_details -> type }}">
	                    	</div>
                    </div>

                    <div class="mws-form-row">
		                <label class="mws-form-label">商品颜色</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="color" value="{{ $good_details -> color }}">
	                    	</div>
                    </div>
					<!-- 商品详情表  结束 -->

		     	</div>
                <div class="mws-button-row">
                    <input type="submit" value="修改" class="btn btn-success">

                </div>
            </form>
        </div>    	
    </div>
@endsection