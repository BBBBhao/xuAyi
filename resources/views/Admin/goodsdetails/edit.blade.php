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
	                    		<input type="text" class="small" name="gname" value="{{ $good_details -> goods_details -> gname }}" style="overflow:hidden;">
	                    	</div>
                    </div>

					 <div class="mws-form-row">
	                    <label class="mws-form-label">所属分类</label>
	                    <div class="mws-form-item">
	                    	<select class="small" name="cid">
		                    	@foreach($cates as $k => $v)
								<option value="{{ $v -> id }}" @if($v -> id == $goods -> cid)selected @endif>
								{{ $v -> cname}}
								</option>
		                    	@endforeach	
	                    	</select>
                   		</div>
                    </div>

                    <div class="mws-form-row" style="width:300px">
                          <label class="">商品列表展示图</label>
                         <input type="file" style="" name="pic" value="">

                        <div id="mws-crop-parent" class="thumbnail">
                            <img src="/image/uploads/{{ $good_details -> goods_details -> pic }}" class="mws-crop-target" alt="Crop">
                        </div>
                    </div>

                    <div class="mws-form-row">
		                <label class="mws-form-label">商品描述</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="describe" value="{{ $good_details -> goods_details -> describe }}">
	                    	</div>
                    </div>

                    <div class="mws-form-row">
		                <label class="mws-form-label">价格</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="price" value="{{ $good_details -> goods_details -> price }}">
	                    	</div>
                    </div>

                    <div class="mws-form-row">
		                <label class="mws-form-label">商品折扣现价</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="discount" value="{{ $good_details -> goods_details -> discount }}">
	                    	</div>
                    </div>

                    <!-- 商品列表  开始 -->			
                    
					<!-- 商品详情表  开始 -->
					<!-- 配置文件 -->
    				<script type="text/javascript" src="/u/utf8-php/ueditor.config.js"></script>
    				<!-- 编辑器源码文件 -->
    				<script type="text/javascript" src="/u/utf8-php/ueditor.all.js"></script>

                    <div class="mws-form-row">
		                <label class="mws-form-label">商品详情描述</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="description" value="{!! $good_details -> description !!}">
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
					<div class="mws-form-row">
		                <label class="mws-form-label">状态</label>
	                    	<div class="mws-form-item">
	                    		上架<input type="radio"  name="state" value="1" @if($good_details -> goods_details -> state == 1) checked @endif>
	                    		下架<input type="radio"  name="state" value="0" @if($good_details -> goods_details -> state == 0) checked @endif>
	                    	</div>
                    </div>

		     	</div>
                <div class="mws-button-row">
                    <input type="submit" value="提交" class="btn btn-inverse btn-small">
                  	<a href="/admin/goodsdetails/{{ $good_details -> goods_details-> id }}" class="btn btn-inverse btn-small">返回</a>
                </div>
            </form>
        </div>    	
    </div>
@endsection