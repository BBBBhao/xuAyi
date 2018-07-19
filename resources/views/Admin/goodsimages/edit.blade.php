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
            <form class="mws-form" action="/admin/goodsimages/{{ $images -> id }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="mws-form-row">
		            <label class="mws-form-label">商品图片</label>
	                    <div class="mws-form-item">
	                    		<input type="file" style="width: 50%;" name="images" value="" placeholder="">
	                    		 <img src="/image/uploads/{{ $images -> images }}" alt="" style="width:300px" >
	                    	</div>
                    </div>

		     	</div>
                <div class="mws-button-row">
                    <input type="submit" value="修改" class="btn btn-inverse btn-small">
                    <a href="/admin/goodsdetails/{{ $images -> goods_images-> id }}" class="btn btn-inverse btn-small">返回</a>
                </div>
            </form>
        </div>    	
    </div>
@endsection